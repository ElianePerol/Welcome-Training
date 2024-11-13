<?php 
include_once "common/header-admin.php";
include_once "database/db-connexion.php";
include_once "database/db-list-display.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <h1>Liste des classes</h1>
        </div>

        <div class="row">
            <?php foreach ($classes as $class): ?>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shadow border-0 p-3">
                        <div class="card-header">
                            <h5 class="mb-0"><?php echo htmlspecialchars($class['name']); ?></h5>
                        </div>
                        <div class="card-body">
                            <!-- Dropdown for students in the current class -->
                            <label for="student_<?php echo $class['id']; ?>" class="form-label">Liste des étudiants :</label>
                            <select class="form-select" id="student_<?php echo $class['id']; ?>" name="student_<?php echo $class['id']; ?>">
                                <option value="">Sélectionnez un étudiant</option>
                                <?php 
                                    // Retrieve students for the current class
                                    $students = getStudentsForClass($class['id']);  // Using the function from db-list-display.php
                                    
                                    foreach ($students as $student):
                                ?>
                                    <option value="<?php echo htmlspecialchars($student['id']); ?>">
                                        <?php echo htmlspecialchars($student['first_name'] . ' ' . $student['surname']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php 
include_once "common/footer.php";
?>
