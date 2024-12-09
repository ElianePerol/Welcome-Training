<?php
include_once "../database/db-connexion.php";

// // Get teacher's id from session
// $teacher_id = $_SESSION['user_id'];
// $current_time = date('Y-m-d H:i:s'); // Used to display the ongoing class
// $current_date = date('Y-m-d'); // Used to display all the classes of the day

// // Query to fetch the ongoing schedule for the teacher
// $sql_schedule = "SELECT s.id AS schedule_id, c.name AS class_name, sub.name AS subject_name, 
//                         s.start_datetime, s.end_datetime, s.class_id
//                  FROM schedule s
//                  JOIN class c ON s.class_id = c.id
//                  JOIN subject sub ON s.subject_id = sub.id
//                  WHERE s.teacher_id = :teacher_id
//                  AND DATE(s.start_datetime) = :current_date
//                  ORDER BY s.start_datetime ASC";

// $stmt_schedule = $pdo->prepare($sql_schedule);
// $stmt_schedule->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
// $stmt_schedule->bindParam(':current_date', $current_date, PDO::PARAM_STR);
// $stmt_schedule->execute();

// $schedules = $stmt_schedule->fetchAll(PDO::FETCH_ASSOC);

// Sets a flag to indicate that class is scheduled
// $no_class_today = false;
// $current_schedule_id = null;
// $current_class_name = '';
// $current_subject_name = '';

// if ($schedules) {

    // Finds the schedule that is ongoing at the current time
    // foreach ($schedules as $schedule) {
    //     $start_datetime = new DateTime($schedule['start_datetime']);
    //     $end_datetime = new DateTime($schedule['end_datetime']);

    //     // If current time is within the schedule's range, this is the ongoing class
    //     if ($current_time >= $start_datetime->format('Y-m-d H:i:s') && $current_time <= $end_datetime->format('Y-m-d H:i:s')) {
    //         $current_schedule_id = $schedule['schedule_id'];
    //         $current_class_name = $schedule['class_name'];
    //         $current_subject_name = $schedule['subject_name'];
    //         break;
    //     }
    // }

    // Query to fetch students for the current class if there's an ongoing schedule
    // if ($current_schedule_id) {
    //     $sql_students = "SELECT id AS student_id, first_name, surname 
    //                      FROM user 
    //                      WHERE role = 'etudiant' 
    //                      AND class_id = (SELECT class_id FROM schedule WHERE id = :schedule_id)";
        
    //     $stmt_students = $pdo->prepare($sql_students);
    //     $stmt_students->bindParam(':schedule_id', $current_schedule_id);
    //     $stmt_students->execute();

    //     $students = $stmt_students->fetchAll(PDO::FETCH_ASSOC);
    // }

// } else {
//     // No schedules for the teacher today
//     $no_class_today = true;
//     $schedules = [];
//     $students = [];
//     $current_class_name = 'No class assigned';
//     $current_subject_name = 'No subject assigned';
// }

// // Handle form submission for marking attendance
// $attendance_marked = false;

// if (count($_POST) > 0) {
//     // Start transaction to ensure data integrity
//     $pdo->beginTransaction();
    
//     try {
//         // Loop through the attendance data and update the attendance table
//         foreach ($_POST['attendance'] as $student_id => $attended) {
//             // If student is present (checkbox checked), attended = 1
//             // Convert 'on' to 1 and absence (no value) to 0
//             $attended = ($attended === 'on') ? 1 : 0;
//             $current_schedule_id = (int) $current_schedule_id;

//             // Insert attendance record into the database
//             $sql_attendance = "INSERT INTO attendance (user_id, schedule_id, attended) 
//                                       VALUES (:user_id, :schedule_id, :attended)
//                                       ON DUPLICATE KEY UPDATE attended = :attended"; // Update if already exists

//             $stmt_attendance = $pdo->prepare($sql_attendance);
//             $stmt_attendance->bindParam(':user_id', $student_id, PDO::PARAM_INT);
//             $stmt_attendance->bindParam(':schedule_id', $current_schedule_id, PDO::PARAM_INT);
//             $stmt_attendance->bindParam(':attended', $attended, PDO::PARAM_INT);
//             $stmt_attendance->execute();
//         }
//         // Commit transaction
//         $pdo->commit();
//         $attendance_marked = true;

//     } catch (Exception $e) {
//         // Rollback transaction in case of error
//         $pdo->rollBack();
//         echo "Error marking attendance: " . $e->getMessage();
//     }
// }

?>