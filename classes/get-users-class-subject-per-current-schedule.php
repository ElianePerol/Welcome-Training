<?php

class GetUsersClassSubjectPerCurrentSchedule {

    private $pdo; 
    
    public $teacher_id;
    public $student_id;
    public $students = [];
    public $schedules = [];

    public $current_time;
    public $current_date;

    public $current_schedule_id = null;
    public $current_class_name = '';
    public $current_subject_name = '';

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->current_time = date('Y-m-d H:i:s');
        $this->current_date = date('Y-m-d');

        // array containing teacher_id, student_id and current_date
        $schedules = $this->bindTeacherStudentDate();
        
        //returns a boolean
        $this->isScheduleToday($schedules);

        // returns $current_schedule_id, $current_class_name and $current_subject_name
        $this->bindScheduleClassSubject($schedules);

        // returns array $students
        $this->fetchAllStudentsInCurrentSchedule($this->current_schedule_id, $schedules);
    }

    private function bindTeacherStudentDate() {
        $sqlQuerySchedulePerUserAndClassGet = 
            "SELECT s.id AS schedule_id, c.name AS class_name, sub.name AS subject_name, 
                s.start_datetime, s.end_datetime, s.class_id,
            NULL AS teacher_name -- For the student query part, teacher's name not needed
            FROM schedule s
            JOIN class c ON s.class_id = c.id
            JOIN subject sub ON s.subject_id = sub.id
            WHERE s.teacher_id = :teacher_id
            AND DATE(s.start_datetime) = :current_date

            UNION ALL

            SELECT s.id AS schedule_id, c.name AS class_name, sub.name AS subject_name, 
                CONCAT(t.first_name, ' ', t.surname) AS teacher_name, 
                s.start_datetime, s.end_datetime, s.class_id
            FROM schedule s
            JOIN class c ON s.class_id = c.id
            JOIN subject sub ON s.subject_id = sub.id
            JOIN user t ON s.teacher_id = t.id AND t.role = 'enseignant'
            WHERE c.id = (SELECT class_id FROM user WHERE id = :student_id)
            AND DATE(s.start_datetime) = :current_date
            ORDER BY start_datetime ASC;";

        $stmt = $this->pdo->prepare($sqlQuerySchedulePerUserAndClassGet);
        $stmt->bindParam(':teacher_id', $this->teacher_id, PDO::PARAM_INT);
        $stmt->bindParam(':student_id', $this->student_id, PDO::PARAM_INT);
        $stmt->bindParam(':current_date', $this->current_date, PDO::PARAM_STR);
        $stmt->execute();
        $this->schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function isScheduleToday($schedules) {
        if ($schedules) {
            // Sets a flag to indicate that class is scheduled
            return true;
        } else {
            // No schedules for the student today
            return false;
        }
    }

    private function bindScheduleClassSubject($schedules) {
        if ($this->isScheduleToday($schedules)) {
            // Finds the schedule that is ongoing at the current time
            foreach ($schedules as $schedule) {
                $start_datetime = new DateTime($schedule['start_datetime']);
                $end_datetime = new DateTime($schedule['end_datetime']);

                // If current time is within the schedule's range, this is the ongoing class
                if ($this->current_time >= $start_datetime->format('Y-m-d H:i:s') 
                    && $this->current_time <= $end_datetime->format('Y-m-d H:i:s')) {
                        $this->current_schedule_id = $schedule['schedule_id'];
                        $this->current_class_name = $schedule['class_name'];
                        $this->current_subject_name = $schedule['subject_name'];
                        break;
                }
            }
        } else {
            $this->current_class_name = 'Pas de classe actuellement';
            $this->current_subject_name = 'Pas de matière assignée';
        }
    }

    private function fetchAllStudentsInCurrentSchedule($current_schedule_id, $schedules) {
        if ($this->isScheduleToday($schedules)) {
            if ($current_schedule_id) {
                $sql = "SELECT id AS student_id, first_name, surname FROM user 
                        WHERE role = 'etudiant' AND class_id = 
                            (SELECT class_id FROM schedule WHERE id = :schedule_id)";
                
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':schedule_id', $current_schedule_id);
                $stmt->execute();
                $this->students = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } else {
            $this->students = [];
        }
    }
}

?>