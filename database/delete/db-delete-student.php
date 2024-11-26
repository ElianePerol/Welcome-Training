<?php

if(count($_POST) > 0) { 

    $id = $_POST['delete-student'];

    // Prepares the SQL statement
    $sql = "DELETE FROM user WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

?>
