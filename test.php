<!-- Classe en cours -->
<?php if (!$no_class_today && $current_schedule_id): ?>

<div class="card align-self-start bg-white border-0 shadow col-md-3 p-0 register">
  
  <div class="schedule-header rounded-top p-1 mb-2">
    <h5 class="mb-2 text-center text-white">Appel</h5>
  </div>

  <div class="d-flex justify-content-center align-items-center flex-column">
    <p class="text-center"><?= 'Classe : ' . $current_class_name ?></p>
    <p class="text-center"><?= 'Matière : ' . $current_subject_name ?></p>
  </div>

  <div class="m-2 mb-4 mw-75 overflow-auto">
    <form action="" method="POST">

      <ul class="list-group mb-3">
        <?php foreach ($students as $student): ?>
          <input type="hidden" name="attendance[<?= $student['student_id'] ?>]" value="0" />
          <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
            <label class="form-check-label" for="student<?= $student['student_id'] ?>">
              <?= $student['first_name'] . " " . $student['surname'] ?>
            </label>
            <input class="form-check-input" type="checkbox" name="attendance[<?= $student['student_id'] ?>]" id="student<?= $student['student_id'] ?>" />
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="d-flex justify-content-center">
        <button type="submit" class="btn rounded-pill w-25">Valider</button>
      </div>

    </form>
  </div>
</div>

<?php elseif (isset($_POST['attendance'])): ?>
<!-- When the form is submitted, display the "Appel terminé" message instead of the list of students -->
<div class="card align-self-start bg-white border-0 shadow col-md-3 p-0 register">

  <div class="schedule-header rounded-top p-1 mb-2">
    <h5 class="mb-2 text-center text-white">Appel</h5>
  </div>

  <div class="d-flex justify-content-center align-items-center flex-column">
    <p class="text-center"><?= 'Classe : ' . $current_class_name ?></p>
    <p class="text-center"><?= 'Matière : ' . $current_subject_name ?></p>
  </div>

  <!-- Replace the student list with a success message -->
  <div class="d-flex justify-content-center align-items-center flex-column mt-5">
    <p class="text-success h5">Appel terminé</p>
  </div>

</div>

<?php endif; ?>
