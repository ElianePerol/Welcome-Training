<?php

// Retrieves subjects from the table for use in the "matiere" select dropdown
$sql_subject = "SELECT * FROM subject";
$stmt_subject = $pdo->prepare($sql_subject);
$stmt_subject->execute();
$subjects = $stmt_subject->fetchAll(PDO::FETCH_ASSOC);

// Retrieves enseignant from the user table for use in the "enseignant" select dropdown
$sql_teacher = "SELECT id, first_name, surname FROM user WHERE role = 'enseignant'";
$stmt_teacher = $pdo->prepare($sql_teacher);
$stmt_teacher->execute();
$enseignants = $stmt_teacher->fetchAll(PDO::FETCH_ASSOC);

// Saves the create-schedule form inputs in the db
if(count($_POST) > 0) {
    // Checks is the form is submitted
    // echo "Submitted";

    // Prepares retrieved data variables
    $subject_id = $_POST['subject_id'];
    $class_id = $_POST['class_id'];
    $teacher_id = $_POST['enseignant'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    // Ensures duree is set and is a valid integer
    $length = isset($_POST['duree']) ? (int)$_POST['duree'] : 0;

    // Combines date and time to form start_datetime using DateTime
    $start_datetime = new DateTime("$date $time");

    // Clones start_datetime to calculate end_datetime and add duration in hours
    $end_datetime = clone $start_datetime;
    $end_datetime->modify("+$length hours");

    // Converts DateTime objects to string format for database insertion
    $start_datetime_str = $start_datetime->format('Y-m-d H:i:s');
    $end_datetime_str = $end_datetime->format('Y-m-d H:i:s');
    
    if (empty($teacher_id)) {
        $teacher_id = NULL;
    }
    
    // Prepares the SQL statement
    $sql_schedule = "INSERT INTO schedule (subject_id, class_id, teacher_id, start_datetime, end_datetime) 
                    VALUES (:subject_id, :class_id, :teacher_id, :start_datetime, :end_datetime)";

    // Executes the prepared statement
    $stmt_schedule = $pdo->prepare($sql_schedule);
    $stmt_schedule->bindParam(':subject_id', $subject_id, PDO::PARAM_INT);
    $stmt_schedule->bindParam(':class_id', $class_id, PDO::PARAM_INT);
    $stmt_schedule->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
    $stmt_schedule->bindParam(':start_datetime', $start_datetime_str, PDO::PARAM_STR);
    $stmt_schedule->bindParam(':end_datetime', $end_datetime_str, PDO::PARAM_STR);
    $stmt_schedule->execute();

}

?>