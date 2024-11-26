<?php 
include_once "common/header-admin.php";
include_once "database/db-connexion.php";
include_once "database/db-update-subject.php";
include_once "database/db-delete-subject.php";
include_once "database/db-list-display.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12 col-lg-10">
                <!-- Card for subjects list -->
                <div class="card bg-white border-0 shadow">
                    <!-- Header Section -->
                    <div class="schedule-header rounded-top py-2">
                        <h1 class="fs-2 mb-2 text-center p-2 text-white">Liste des matières</h1>
                    </div>

                    <!-- Table Section -->
                    <div class="table-responsive rounded-bottom">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="text-center col-md-5">Matière</th>
                                    <th scope="col" class="text-center col-md-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($subjects as $subject): ?>
                                    <tr>
                                        <form action="" method="POST">
                                            <td class="text-center">
                                                <input type="text" name="name" value="<?php echo htmlspecialchars($subject['name']); ?>" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" name="update-subject" value="<?php echo $subject['id']; ?>" class="btn btn-sm me-2"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir modifier cette matière ?')">
                                                            <i class="fa-regular fa-floppy-disk"></i> Modifier
                                                    </button>
                                                    <button type="submit" name="delete-subject" value="<?php echo $subject['id']; ?>" class="btn btn-sm"
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
