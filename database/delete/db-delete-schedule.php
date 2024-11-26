<?php

if(count($_POST) > 0) { 

    $id = $_POST['delete-schedule'];

    // Prepares the SQL statement
    $sql = "DELETE FROM schedule WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

?>
