<?php 
  include_once "common/header-admin.php";
  include_once "database/db-connexion.php";
  include_once "database/db-create-subject.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <!-- Subject creation form -->
                <div class="card bg-white border-0 shadow p-4 rounded">

                    <h3 class="text-center text-secondary mb-4">Créer une matière</h3>

                    <form action="create-subject.php" method="POST">
                    <!-- Subject name -->
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nom-class" name="subject_name" placeholder="Entrez le nom de la matière" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn rounded-pill w-50">Créer la matière</button>
                    </div>
                    </form>
                </div>

                <!-- Subject list table -->
                <div class="row justify-content-center mt-4">
                    <div class="col-md-10 col-lg-8">
                        <div class="card bg-white border-0 shadow">

                            <div class="schedule-header rounded-top py-2">
                                <h1 class="fs-2 mb-2 text-center p-2 text-white">Matières</h1>
                            </div>

                            <div class="table-responsive rounded-bottom">
                                <table class="table table-bordered mb-0">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">Matières</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($subjects as $s): ?>    
                                            <tr>
                                                <td class="text-center"><?php echo $s['id']; ?></td>
                                                <td class="text-center"><?php echo $s['name']; ?></td>
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