<?php

function pwdHash($pwd) {
    $options = [
        'cost' => 12,
    ];
    return password_hash($pwd, PASSWORD_BCRYPT, $options);
}

// Saves the create-user form inputs in the db
if(count($_POST) > 0) {
    // Checks is the form is submitted
    // echo "Submitted";

    // Prepares retrieved data variables
    $first_name = $_POST['first_name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = pwdHash($_POST['password']); // hash password
    $role = $_POST['role'];
    $class = $_POST['class_id'];

    // Prepares the SQL statement
    $sql = "INSERT INTO user (surname, first_name, email, password, role, class_id) 
                VALUES (:surname, :first_name, :email, :password, :role, :class)";

    // Executes the prepared statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':class', $class, PDO::PARAM_INT);
    $stmt->execute();

}

$sql = "SELECT * FROM `class`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>