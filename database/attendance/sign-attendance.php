<?php
include_once "../database/db-connexion.php";

// Get student's id from session
$student_id = $_SESSION['user_id'];
$current_time = date('Y-m-d H:i:s'); // Used to display the ongoing class
$current_date = date('Y-m-d'); // Used to display all the classes of the day

// Query to fetch the student's schedule for today
$sql_schedule = "SELECT s.id AS schedule_id, c.name AS class_name, sub.name AS subject_name, 
        CONCAT(t.first_name, ' ', t.surname) AS teacher_name, s.start_datetime, s.end_datetime
    FROM schedule s
    JOIN class c ON s.class_id = c.id
    JOIN subject sub ON s.subject_id = sub.id
    JOIN user t ON s.teacher_id = t.id AND t.role = 'enseignant'
    WHERE c.id = (SELECT class_id FROM user WHERE id = :student_id)
    AND DATE(s.start_datetime) = :current_date
    ORDER BY s.start_datetime ASC";
                    
$stmt_schedule = $pdo->prepare($sql_schedule);
$stmt_schedule->bindParam(':student_id', $student_id, PDO::PARAM_INT);  // Ensure it's an integer
$stmt_schedule->bindParam(':current_date', $current_date, PDO::PARAM_STR); // Ensure it's a string (date)

$stmt_schedule->execute();

$schedules = $stmt_schedule->fetchAll(PDO::FETCH_ASSOC);

if ($schedules) {
    // Sets a flag to indicate that class is scheduled
    $no_class_today = false;
} else {
    // No schedules for the student today
    $no_class_today = true;
    $schedules = [];
}

// Check if the student has already signed for the class today
$is_signed = false;
if (isset($schedules[0])) {
    $schedule_id = $schedules[0]['schedule_id'];

    // Query to check if the student has signed for the class
    $sql_check_signed = "SELECT * FROM signature WHERE user_id = :student_id AND schedule_id = :schedule_id";
    $stmt_check_signed = $pdo->prepare($sql_check_signed);
    $stmt_check_signed->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $stmt_check_signed->bindParam(':schedule_id', $schedule_id, PDO::PARAM_INT);
    $stmt_check_signed->execute();
    
    // If a signature record exists, set the $is_signed flag to true
    if ($stmt_check_signed->rowCount() > 0) {
        $is_signed = true;
    }
}

// Handle Signature Button Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sign'])) {
    $schedule_id = $_POST['schedule_id'];
    
    // Create a timestamp for the file_name (signature time)
    $file_name = time();  // This will act as the timestamp for the signature
    
    // Insert into the signature table
    $sql_signature = "INSERT INTO signature (user_id, schedule_id, file_name) 
                      VALUES (:user_id, :schedule_id, :file_name)";
    
    $stmt_signature = $pdo->prepare($sql_signature);
    $stmt_signature->bindParam(':user_id', $student_id, PDO::PARAM_INT);
    $stmt_signature->bindParam(':schedule_id', $schedule_id, PDO::PARAM_INT);
    $stmt_signature->bindParam(':file_name', $file_name, PDO::PARAM_INT);
    $stmt_signature->execute();
    
    // Redirect to refresh the page (or add a success message if needed)
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

?>
