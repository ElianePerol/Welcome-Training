<?php 

class CreateScheduleFormHandler {

    private $pdo;
    private $sqlQuerySubjectGet = "SELECT * FROM subject";
    private $sqlQueryTeacherGet = "SELECT id, first_name, surname FROM user WHERE role = 'enseignant'";

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchSubject() {
        $stmt = $this->pdo->prepare($this->sqlQuerySubjectGet);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchTeacher() {
        $stmt = $this->pdo->prepare($this->sqlQueryTeacherGet);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function formHandler() {
        $form = new ScheduleForm();
        
        $sql_schedule = "INSERT INTO schedule (subject_id, class_id, teacher_id, start_datetime, end_datetime) 
                        VALUES (:subject_id, :class_id, :teacher_id, :start_datetime, :end_datetime)";

        $stmt_schedule = $this->pdo->prepare($sql_schedule);
        $stmt_schedule->bindParam(':subject_id', $form->subject_id, PDO::PARAM_INT);
        $stmt_schedule->bindParam(':class_id', $form->class_id, PDO::PARAM_INT);
        $stmt_schedule->bindParam(':teacher_id', $form->teacher_id, PDO::PARAM_INT);
        $stmt_schedule->bindParam(':start_datetime', $form->start_datetime_str, PDO::PARAM_STR);
        $stmt_schedule->bindParam(':end_datetime', $form->end_datetime_str, PDO::PARAM_STR);
        $stmt_schedule->execute();
    }
}