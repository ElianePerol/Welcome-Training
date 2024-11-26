<?php
include_once "common/header-admin.php";
include_once "database/db-connexion.php";
include_once "database/db-update-schedule.php";
include_once "database/db-delete-schedule.php";
include_once "database/db-list-display.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 col-lg-8">
                <div class="card bg-white border-0 shadow">

                    <div class="schedule-header rounded-top py-2">
                        <h1 class="fs-2 mb-2 text-center p-2 text-white">Liste des plannings</h1>
                    </div>

                    <div class="table-responsive rounded-bottom">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="text-center">Classe</th>
                                    <th scope="col" class="text-center">Matière</th>
                                    <th scope="col" class="text-center">Enseignant</th>
                                    <th scope="col" class="text-center">Date</th>
                                    <th scope="col" class="text-center">Heure de début</th>
                                    <th scope="col" class="text-center">Heure de fin</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($schedules as $schedule): ?>
                                    <tr>
                                        <td class="text-center"><?php echo htmlspecialchars($schedule['class_name']); ?></td>
                                        <td class="text-center"><?php echo htmlspecialchars($schedule['subject_name']); ?></td>
                                        <td class="text-center"><?php echo htmlspecialchars($schedule['teacher_first_name'] . " " . $schedule['teacher_surname']); ?></td>
                                        <td class="text-center"><?php echo date('d/m/Y', strtotime($schedule['start_datetime'])); ?></td>
                                        <td class="text-center"><?php echo date('H:i', strtotime($schedule['start_datetime'])); ?></td>
                                        <td class="text-center"><?php echo date('H:i', strtotime($schedule['end_datetime'])); ?></td>
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