<?php 
include_once "common/header-admin.php";
include_once "database/db-connexion.php";
include_once "database/db-list-display.php"

?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center text-secondary mb-5">Liste des enseignants</h2>

            <div class="col-md-10">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($teachers as $teacher): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($teacher['id']); ?></td>
                                <td><?php echo htmlspecialchars($teacher['first_name']); ?></td>
                                <td><?php echo htmlspecialchars($teacher['surname']); ?></td>
                                <td><?php echo htmlspecialchars($teacher['email']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>

<?php 
include_once "common/footer.php";
?>