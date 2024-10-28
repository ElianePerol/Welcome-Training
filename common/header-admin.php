<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome training - Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body class="vh-100">

    <header class="container-fluid py-1 position-fixed top-0 w-100">
        <div class="d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-3">
                <img src="assets/img/logo_dark.png" class="img-fluid logo-dark rounded-circle" alt="Logo Welcome Training">
                <h5 class="mb-0 text-white">Nom - Administrateur</h5>
            </div>

            <nav class="d-flex align-items-center gap-3">
                <a href="admin.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Accueil</a>
                <a href="create-user.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Nouvel utilisateur</a>
                <a href="create-class.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Classes</a>
                <a href="list-student.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Étudiants</a>
                <a href="list-teacher.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Enseignants</a>
                <a href="planning.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Plannings</a>
                <a href="#" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Profil</a>
                <a href="#" class="text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Déconnexion">
                    <i class="fa-solid fa-power-off"></i>
                </a>
            </nav>
        </div>
    </header>