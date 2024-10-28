<?php 
  include_once "common/header-admin.php";
  include_once "database/db-connexion.php";
  include_once "database/db-create-class.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <!-- Class creation form -->
                <div class="card bg-white border-0 shadow p-4 rounded">

                    <h3 class="text-center text-secondary mb-4">Créer une classe</h3>

                    <form action="create-class.php" method="POST">
                    <!-- Class name -->
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nom-class" name="class_name" placeholder="Entrez le nom de la classe" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn rounded-pill w-50">Créer la classe</button>
                    </div>
                    </form>
                </div>

                <!-- Class list table -->
                <div class="row justify-content-center mt-4">
                    <div class="col-md-10 col-lg-8">
                        <div class="card bg-white border-0 shadow">

                            <div class="schedule-header rounded-top py-2">
                                <h1 class="fs-2 mb-2 text-center p-2 text-white">Classes</h1>
                            </div>

                            <div class="table-responsive rounded-bottom">
                                <table class="table table-bordered mb-0">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">Classe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($classes as $c): ?>    
                                            <tr>
                                                <td class="text-center"><?php echo $c['id']; ?></td>
                                                <td class="text-center"><?php echo $c['name']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            </div>
        </div>
    </div>
</main>

<?php 
include_once "common/footer.php";
?>