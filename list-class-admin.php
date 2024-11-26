<?php 
include_once "common/header-admin.php";
include_once "database/db-connexion.php";
include_once "database/db-update-class.php";
include_once "database/db-delete-class.php";
include_once "database/db-list-display.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 col-lg-8">
                <div class="card bg-white border-0 shadow">

                    <div class="schedule-header rounded-top py-2">
                        <h1 class="fs-2 mb-2 text-center p-2 text-white">Liste des classes</h1>
                    </div>


                    <div class="table-responsive rounded-bottom">
                        <table class="table table-bordered mb-0">

                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="text-center">Nom de la classe</th>
                                    <th scope="col" class="text-center">Étudiants</th>
                                    <th scope="col" class="text-center col-md-4">Actions</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach ($classes as $class): ?>
                                    <tr>
                                        <form action="" method="POST">
                                            <td class="text-center">
                                                <input type="text" name="name" value="<?php echo htmlspecialchars($class['name']); ?>" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <details>
                                                    <summary class="p-0">Liste</summary>
                                                    <div class="card">
                                                        <ul class="mt-2">
                                                            <?php 
                                                                $students = getStudentsForClass($class['id']);  
                                                                foreach ($students as $student):
                                                            ?>
                                                                <li class="list-group-item">
                                                                    <?php echo htmlspecialchars($student['first_name'] . ' ' . $student['surname']); ?>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                    </details>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" name="update-class" value="<?php echo $class['id']; ?>" class="btn btn-sm me-2"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir modifier cette matière ?')">
                                                            <i class="fa-regular fa-floppy-disk"></i> Modifier
                                                    </button>
                                                    <button type="submit" name="delete-class" value="<?php echo $class['id']; ?>" class="btn btn-sm"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette matière ?')">
                                                            <i class="fa-solid fa-trash"></i> Supprimer
                                                    </button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
include_once "common/footer.php";
?>
