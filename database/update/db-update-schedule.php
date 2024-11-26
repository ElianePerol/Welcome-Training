<?php

if(count($_POST) > 0) { 
    // Prepares retrieved data variables
    $class_id = $_POST['class_id'];
    $subject_id = $_POST['subject_id'];
    $teacher_id = $_POST['teacher_id'];
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $id = $_POST['update-schedule'];

    // Check if teacher_id is empty and set it to NULL
    if (empty($teacher_id)) {
        $teacher_id = null;
    }

    // Handles empty fields (if needed, adjust based on your needs)
    if (empty($start_date)) {
        $start_date = null;
    }
    if (empty($start_time)) {
        $start_time = null;
    }
    if (empty($end_time)) {
        $end_time = null;
    }

    // Combine date and time to create datetime for start and end times
    $start_datetime = $start_date . ' ' . $start_time;
    $end_datetime = $start_date . ' ' . $end_time;

    // Prepares the SQL statement for updating the schedule
    $sql = "UPDATE schedule SET
        class_id = :class_id,
        subject_id = :subject_id,
        teacher_id = :teacher_id,
        start_datetime = :start_datetime,
        end_datetime = :end_datetime
        WHERE id = :id";

    // Executes the prepared statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':class_id', $class_id, PDO::PARAM_INT);
    $stmt->bindParam(':subject_id', $subject_id, PDO::PARAM_INT);
    $stmt->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
    $stmt->bindParam(':start_datetime', $start_datetime, PDO::PARAM_STR);
    $stmt->bindParam(':end_datetime', $end_datetime, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

}

?>
