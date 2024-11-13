<?php

    // Create a subject
    // Saves the create-subject form input in the db
    if(count($_POST) > 0) {
        // Checks is the form is submitted
        echo "Submitted";

        // Prepares retrieved data variable
        $subject_name = $_POST['subject_name'];

        // Prepares the SQL statement
        $sql = "INSERT INTO subject (name) 
            VALUES (:subject_name)";

        // Executes the prepared statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':subject_name', $subject_name, PDO::PARAM_STR);
        $stmt->execute();
    }


    // Split : get all subjectes
    // récupérer les informations de la BDD pour les afficher dans le tableau
    $sql = "SELECT * FROM `subject`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>