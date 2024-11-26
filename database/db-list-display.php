<?php

// Used in list-student.php
// Retrieves students with their class name from the user and class tables
$sql_students = "
    SELECT u.id, u.first_name, u.surname, u.email, u.class_id, c.name AS class_name 
    FROM user u
    LEFT JOIN class c ON u.class_id = c.id 
    WHERE u.role = 'etudiant'";
$stmt_students = $pdo->prepare($sql_students);
$stmt_students->execute();
$students = $stmt_students->fetchAll(PDO::FETCH_ASSOC);

// Used in list-teacher.php
// Retrieves teachers from the user table
$sql_teachers = "SELECT id, first_name, surname, email FROM user WHERE role = 'enseignant'";
$stmt_teachers = $pdo->prepare($sql_teachers);
$stmt_teachers->execute();
$teachers = $stmt_teachers->fetchAll(PDO::FETCH_ASSOC);

// Used in list-class-admin.php
// Retrieve classes from the database
$sql_classes = "SELECT id, name FROM class";
$stmt_classes = $pdo->prepare($sql_classes);
$stmt_classes->execute();
$classes = $stmt_classes->fetchAll(PDO::FETCH_ASSOC);

// Used in list-class-admin.php
// Function to retrieve students for a specific class
function getStudentsForClass($class_id) {
    global $pdo;  // Ensure access to the $pdo variable from db-connexion.php

    $sql_students = "SELECT id, first_name, surname FROM user WHERE class_id = :class_id AND role = 'etudiant'";
    $stmt_students = $pdo->prepare($sql_students);
    $stmt_students->bindParam(':class_id', $class_id, PDO::PARAM_INT);
    $stmt_students->execute();
    return $stmt_students->fetchAll(PDO::FETCH_ASSOC);
}

// Used in list-subject.php
// Retrieves subjects from the database
$sql_subjects = "SELECT id, name FROM subject";
$stmt_subjects = $pdo->prepare($sql_subjects);
$stmt_subjects->execute();
$subjects = $stmt_subjects->fetchAll(PDO::FETCH_ASSOC);


// Used in list-schedule.php
// Retrieves from the database all elements necessary to display the schedules
$sql_schedule = "SELECT s.id, c.name AS class_name, sub.name AS subject_name, 
                u.first_name AS teacher_first_name, u.surname AS teacher_surname,
                s.start_datetime, s.end_datetime
        FROM schedule s
        LEFT JOIN class c ON s.class_id = c.id
        LEFT JOIN subject sub ON s.subject_id = sub.id
        LEFT JOIN user u ON s.teacher_id = u.id
        ORDER BY s.start_datetime"; // Optionally order by start time
$stmt_schedule = $pdo->prepare($sql_schedule);
$stmt_schedule->execute();
$schedules = $stmt_schedule->fetchAll(PDO::FETCH_ASSOC);
?>