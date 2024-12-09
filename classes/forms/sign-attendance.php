<?php

class SignAttendance {

    private $pdo;
    public $attendance_signed = false;
    public $current_schedule_id;

    public function __construct($pdo) {
        $this->pdo = $pdo;

        $scheduleFetcher = new GetUsersClassSubjectPerCurrentSchedule($this->pdo);
        $this->current_schedule_id = $scheduleFetcher->current_schedule_id;
    }

    // Sets a flag $attendance_signed
    public function hasSigned($student_id) {
        if ($this->current_schedule_id == null) {
            return false;
        }
        
        // Query to check if the student has signed for the class
        $sql = "SELECT * FROM attendance 
                WHERE user_id = :student_id AND schedule_id = :schedule_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $stmt->bindParam(':schedule_id', $this->current_schedule_id, PDO::PARAM_INT);
        $stmt->execute();
        
        // If the attendance record exists
        if ($stmt->rowCount() > 0) {
            $attendance = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($attendance['signature'] !== null) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function sign($student_id) {

        // Check if the student can sign (attended = 1, signature is null)
        if (!$this->hasSigned($student_id)) {
            return "Pas de signature requise";
        }

        // Create a timestamp for the file_name (signature time)
        $file_name = time();  // This will act as the timestamp for the signature
        
        // Insert into the signature table
        $sql = "UPDATE attendance 
                SET signature = :file_name 
                WHERE user_id = :student_id AND schedule_id = :schedule_id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':file_name', $file_name, PDO::PARAM_INT);
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $stmt->bindParam(':schedule_id', $this->current_schedule_id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect to refresh the page (or add a success message if needed)
        header("Location: " . $_SERVER['REQUEST_URI']);
        return true;

    }
}

?>