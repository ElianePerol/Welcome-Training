<?php

class MarkAttendance {

    private $pdo;
    public $attendance_marked = false;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    
    }

    // For each student in the current schedule, adds 0 in attence table if absent, 1 otherwise
    // Sets a flag $attendance_marked
    public function isPresent() {

        $scheduleFetcher = new GetUsersClassSubjectPerCurrentSchedule($this->pdo);
        $current_schedule_id = $scheduleFetcher->current_schedule_id;
        
        if ($current_schedule_id === null) {
            return "Pas de cours aujourd'hui";
        }
        
        // Starts transaction to ensure data integrity
        $this->pdo->beginTransaction();

        try {
            // Loop through the attendance data and update the attendance table
            foreach ($_POST['attendance'] as $student_id => $attended) {
                // If student is present (checkbox checked), attended = 'on'
                // Converts 'on' to 1 and absence (no value) to 0
                $attended = ($attended === 'on') ? 1 : 0;
                $current_schedule_id = (int) $current_schedule_id;

                // Insert attendance record into the database
                $sql = "INSERT INTO attendance (user_id, schedule_id, attended) 
                        VALUES (:user_id, :schedule_id, :attended)
                        ON DUPLICATE KEY UPDATE attended = :attended";

                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':user_id', $student_id, PDO::PARAM_INT);
                $stmt->bindParam(':schedule_id', $current_schedule_id, PDO::PARAM_INT);
                $stmt->bindParam(':attended', $attended, PDO::PARAM_INT);
                $stmt->execute();
            }
            // Commit transaction
            $this->pdo->commit();
            $this->attendance_marked = true;

        } catch (Exception $e) {
            // Rollback transaction in case of error
            $this->pdo->rollBack();
            echo "Erreur dans l'appel : " . $e->getMessage();
        }
    }
}

?>