<?php

function pwdHash($pwd) {
    $options = [
        'cost' => 12,
    ];
    return password_hash($pwd, PASSWORD_BCRYPT, $options);
}

function login($email, $pwd) {
    global $pdo;

    // Query to select user in db by his email 
    // $pwd = pwdHash($pwd);
    $sql = "SELECT * FROM `user` WHERE `email` = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Checks if user exists and password is correct
    if ($result && password_verify($pwd, $result['pwd'])) {
        // Password matches, set session variables
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_role'] = $result['role'];
        $_SESSION['user_email'] = $result['email'];

        // Redirects to the correct url based on user role
        $redirect_url = "login.php"; // Default to login page if no role matches
        if ($result['role'] == 'etudiant') {
            $redirect_url ="/student.php";
        } elseif ($result['role'] == 'enseignant') {
            $redirect_url ="/teacher.php";
        } elseif ($result['role'] == '/administrateur') {
            $redirect_url ="admin.php";
        }

        // Debugging: Log the role and redirection URL
        echo "Role: " . $user['role'] . "<br>";
        echo "Redirecting to: " . $redirect_url;

        // Redirects to the appropriate dashboard
        header("Location: $redirect_url");
        exit(); // Ensure no further code is run after redirect
    } else {
        // Invalid credentials, redirect back with error message
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: login.php");
        exit();
    }

}

// Process login if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = pwdHash($_POST['password']);
    login($email, $password);
}

?>