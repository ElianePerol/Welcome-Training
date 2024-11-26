<?php

if(count($_POST) > 0) { 

    $id = $_POST['delete-class'];

    // Prepares the SQL statement
    $sql = "DELETE FROM class WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

?>
