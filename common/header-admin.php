<?php
include_once "session-start.php";
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome training - Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body class="vh-100">

    <header class="container-fluid py-1 position-fixed top-0 w-100">
        <div class="d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-3">
                <img src="../assets/img/logo_dark.png" class="img-fluid logo-dark rounded-circle" alt="Logo Welcome Training">

                <!-- Displays user's name -->
                <h5 class="mb-0 text-white">
                    <?php 
                    // Check if session variables for the user's name are set
                    if (isset($_SESSION['user_first_name']) && isset($_SESSION['user_surname'])) {
                        // Display the user's first name and surname
                        echo htmlspecialchars($_SESSION['user_first_name']) . ' ' . htmlspecialchars($_SESSION['user_surname']) . ' - Administrateur';
                    } else {
                        // Fallback in case user info is not available (e.g. not logged in)
                        echo 'Administrateur';
                    }
                    ?>
                </h5>

            </div>

            <nav class="d-flex align-items-center gap-3">
                <a href="../dashboard/admin.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Tableau de bord</a>
                <a href="../list/list-student.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Étudiants</a>
                <a href="../list/list-teacher.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Enseignants</a>
                <a href="../list/list-class-admin.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Classes</a>
                <a href="../list/list-subject.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Matières</a>
                <a href="../list/list-schedule.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Plannings</a>
                <a href="../common/logout.php" class="text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Déconnexion">
                    <i class="fa-solid fa-power-off"></i>
                </a>
            </nav>
        </div>
    </header>