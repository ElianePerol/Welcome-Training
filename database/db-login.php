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
    $sql = "SELECT u.*, c.name AS class_name 
            FROM `user` u
            LEFT JOIN class c ON u.class_id = c.id
            WHERE u.email = :email";
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
        $_SESSION['class_name'] = isset($result['class_name']) ? $result['class_name'] : 'No class assigned';

        // If the user is a teacher, retrieves their ongoing class schedule
        if ($result['role'] == 'enseignant') {
            $teacher_id = $result['id'];
            $current_time = date('Y-m-d H:i:s'); // Get the current datetime in proper format

            // Query to fetch the ongoing schedule for the teacher based on current time
            $sql_schedule = "SELECT s.id AS schedule_id, c.name AS class_name, sub.name AS subject_name
                            FROM schedule s
                            JOIN class c ON s.class_id = c.id
                            JOIN subject sub ON s.subject_id = sub.id
                            WHERE s.teacher_id = :teacher_id
                            AND :current_time BETWEEN s.start_datetime AND s.end_datetime";

            // Prepare and execute the query to fetch the schedule ID
            $stmt_schedule = $pdo->prepare($sql_schedule);
            $stmt_schedule->bindParam(':teacher_id', $teacher_id);
            $stmt_schedule->bindParam(':current_time', $current_time);
            $stmt_schedule->execute();

            // Fetch the schedule ID (if found)
            if ($schedule = $stmt_schedule->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['schedule_id'] = $schedule['schedule_id']; // Store the schedule ID in session
                $_SESSION['class_name'] = $schedule['class_name']; // Store class name
                $_SESSION['subject_name'] = $schedule['subject_name']; // Store subject name
            } else {
                $_SESSION['schedule_id'] = null; // No ongoing class
            }
        }

        // Defines the correct url based on user role
        $redirect_url = "login.php";
        if ($result['role'] == 'etudiant') {
            $redirect_url ="../dashboard/student.php";
        } elseif ($result['role'] == 'enseignant') {
            $redirect_url ="../dashboard/teacher.php";
        } elseif ($result['role'] == 'administrateur') {
            $redirect_url ="../dashboard/admin.php";
        }
        // Redirects to the appropriate url
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