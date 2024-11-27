<?php

if(count($_POST) > 0) { 
    // Prepares retrieved data variables
    $name = $_POST['name'];
    $id = $_POST['update-class'];

    // Prepares the SQL statement
    $sql = "UPDATE class SET
        name = :name
        WHERE id = :id";

    // Executes the prepared statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

?>