<?php

include_once "db-connexion.php";
session_start();

function pwdHash($pwd) {
    $options = [
        'cost' => 12,
    ];
    return password_hash($pwd, PASSWORD_BCRYPT, $options);
}


function login($email, $pwd) {
    global $pdo;

    // Query to select user by his email in user table from db 
    // $pwd = pwdHash($pwd);
    $sql = "SELECT * FROM `user` WHERE `email` = :email"; //add join
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // var_dump($result);
    // die();

    // Checks if user exists and password is correct
    if ($result && password_verify($pwd, $result['password'])) {
        // Password matches, set session variables
        $_SESSION = array();
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_role'] = $result['role'];
        $_SESSION['user_email'] = $result['email'];
        $_SESSION['user_first_name'] = $result['first_name'];
        $_SESSION['user_surname'] = $result['surname'];


        // Redirects to the correct url based on user role
        $redirect_url = "login.php"; // Default to login page if no role matches
        if ($result['role'] == 'etudiant') {
            $redirect_url ="../student.php";
        } elseif ($result['role'] == 'enseignant') {
            $redirect_url ="../teacher.php";
        } elseif ($result['role'] == 'administrateur') {
            $redirect_url ="../admin.php";
        }

        // Redirects to the appropriate dashboard
        header("Location: $redirect_url");
        exit(); // Ensure no further code is run after redirect
    } else {
        // Invalid credentials, redirect back with error message
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: ../login.php");
        exit();
    }

}

// Process login if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // die();
    login($email, $password);
}

?>