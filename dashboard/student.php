<?php 
include_once "../common/header-student.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
  <div class="container">
    <div class="row justify-content-center gap-5">

      <!-- Emploi du temps de la journée -->
      <div class="card align-self-start bg-white border-0 shadow col-md-4 p-0">
        <div class="schedule-header rounded-top p-1">
          <h5 class="mb-2 text-center text-white">Emploi du temps</h5>
        </div>
        <div class="table-responsive rounded-bottom">
            <table class="table table-bordered mb-0">
                <tbody>
                    <tr>
                        <th scope="row" class="text-center fw-bold">08:00 - 09:00</th>
                        <td class="text-center">Matière 1</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">09:00 - 10:00</th>
                        <td class="text-center">Matière 2</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">10:00 - 11:00</th>
                        <td class="text-center">Matière 3</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">11:00 - 12:00</th>
                        <td class="text-center">Matière 4</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">12:00 - 13:00</th>
                        <td class="text-center">Pause</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">13:00 - 14:00</th>
                        <td class="text-center">Matière 5</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">14:00 - 15:00</th>
                        <td class="text-center">Matière 6</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">15:00 - 16:00</th>
                        <td class="text-center">Matière 7</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">16:00 - 17:00</th>
                        <td class="text-center">Matière 8</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">17:00 - 18:00</th>
                        <td class="text-center">Matière 9</td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>

      <!-- Signature -->
      <div class="card align-self-start bg-white border-0 shadow col-md-3 p-0">
        <div class="schedule-header rounded-top p-1 mb-2">
          <h5 class="mb-2 text-center text-white">Signature</h5>
        </div>
        <div class="d-flex justify-content-center">
          <p>Cours - Horaire</p>
        </div>
        <div class="m-2 mb-4 mw-75">
          <textarea class="form-control" rows="3"></textarea>
        </div>
        <div class="d-flex justify-content-center mb-3">
          <button type="submit" class="btn rounded-pill w-25">Valider</button>
        </div>
      </div>

    </div>
  </div>
</main>
    
<?php 
include_once "../common/footer.php";
?>