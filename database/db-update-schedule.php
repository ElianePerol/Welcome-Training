<?php

if(count($_POST) > 0) { 
    // Prepares retrieved data variables
    $first_name = $_POST['first_name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $id = $_POST['update-teacher'];
    
    // Handles empty fields
    if (empty($first_name)) {
        $first_name = null;
    }
    if (empty($surname)) {
        $surname = null;
    }
    if (empty($email)) {
        $email = null;
    }

    // Prepares the SQL statement
    $sql = "UPDATE user SET
        first_name = :first_name,
        surname = :surname,
        email = :email
        WHERE id = :id";

    // Executes the prepared statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();
}

?>
