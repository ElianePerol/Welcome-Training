<?php

    // Create a class
    // Saves the create-class form input in the db
    if(count($_POST) > 0) {
        // Checks is the form is submitted
        echo "Submitted";

        // Prepares retrieved data variable
        $class_name = $_POST['class_name'];

        // Prepares the SQL statement
        $sql = "INSERT INTO class (name) 
            VALUES (:class_name)";

        // Executes the prepared statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':class_name', $class_name, PDO::PARAM_STR);
        $stmt->execute();
    }


    // Split : get all classes
    // récupérer les informations de la BDD pour les afficher dans le tableau
    $sql = "SELECT * FROM `class`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>