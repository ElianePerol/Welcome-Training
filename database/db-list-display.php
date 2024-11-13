<?php

// Retrieves students with their class name from the user and class tables
$sql_students = "
    SELECT u.id, u.first_name, u.surname, u.email, c.name AS class_name 
    FROM user u
    LEFT JOIN class c ON u.class_id = c.id 
    WHERE u.role = 'etudiant'";
$stmt_students = $pdo->prepare($sql_students);
$stmt_students->execute();
$students = $stmt_students->fetchAll(PDO::FETCH_ASSOC);

// Retrieves teachers from the user table
$sql_teachers = "SELECT id, first_name, surname, email FROM user WHERE role = 'enseignant'";
$stmt_teachers = $pdo->prepare($sql_teachers);
$stmt_teachers->execute();
$teachers = $stmt_teachers->fetchAll(PDO::FETCH_ASSOC);

/// Retrieve classes from the database
$sql_classes = "SELECT id, name FROM class";
$stmt_classes = $pdo->prepare($sql_classes);
$stmt_classes->execute();
$classes = $stmt_classes->fetchAll(PDO::FETCH_ASSOC);

// Function to retrieve students for a specific class
function getStudentsForClass($class_id) {
    global $pdo;  // Ensure access to the $pdo variable from db-connexion.php

    $sql_students = "SELECT id, first_name, surname FROM user WHERE class_id = :class_id AND role = 'etudiant'";
    $stmt_students = $pdo->prepare($sql_students);
    $stmt_students->bindParam(':class_id', $class_id, PDO::PARAM_INT);
    $stmt_students->execute();
    return $stmt_students->fetchAll(PDO::FETCH_ASSOC);
}
?>