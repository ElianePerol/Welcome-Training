<?php 
include_once "../common/header-teacher.php";
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
                        <td class="text-center">Classe 1</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">09:00 - 10:00</th>
                        <td class="text-center">Classe 2</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">10:00 - 11:00</th>
                        <td class="text-center">Classe 3</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">11:00 - 12:00</th>
                        <td class="text-center">Classe 4</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">12:00 - 13:00</th>
                        <td class="text-center">Pause</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">13:00 - 14:00</th>
                        <td class="text-center">Classe 5</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">14:00 - 15:00</th>
                        <td class="text-center">Classe 6</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">15:00 - 16:00</th>
                        <td class="text-center">Classe 7</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">16:00 - 17:00</th>
                        <td class="text-center">Classe 8</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center fw-bold">17:00 - 18:00</th>
                        <td class="text-center">Classe 9</td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>

      <!-- Classe en cours  -->
      <div class="card align-self-start bg-white border-0 shadow col-md-3 p-0 register">
        <div class="schedule-header rounded-top p-1 mb-2">
          <h5 class="mb-2 text-center text-white">Appel</h5>
        </div>
        <div class="d-flex justify-content-center">
          <p>Classe - Horaire</p>
        </div>
        <div class="m-2 mb-4 mw-75 overflow-auto">
          <form>
            <ul class="list-group mb-3">
              <li class="list-group-item custom-checkbox custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student1">Étudiant 1</label>
                <input class="form-check-input" type="checkbox" id="student1" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student2">Étudiant 2</label>
                <input class="form-check-input" type="checkbox" id="student2" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student3">Étudiant 3</label>
                <input class="form-check-input" type="checkbox" id="student3" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student4">Étudiant 4</label>
                <input class="form-check-input" type="checkbox" id="student4" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student5">Étudiant 5</label>
                <input class="form-check-input" type="checkbox" id="student5" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student1">Étudiant 6</label>
                <input class="form-check-input" type="checkbox" id="student1" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student2">Étudiant 7</label>
                <input class="form-check-input" type="checkbox" id="student2" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student3">Étudiant 8</label>
                <input class="form-check-input" type="checkbox" id="student3" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student4">Étudiant 9</label>
                <input class="form-check-input" type="checkbox" id="student4" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student5">Étudiant 10</label>
                <input class="form-check-input" type="checkbox" id="student5" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student1">Étudiant 11</label>
                <input class="form-check-input" type="checkbox" id="student1" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student2">Étudiant 12</label>
                <input class="form-check-input" type="checkbox" id="student2" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student3">Étudiant 13</label>
                <input class="form-check-input" type="checkbox" id="student3" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student4">Étudiant 14</label>
                <input class="form-check-input" type="checkbox" id="student4" />
              </li>
              <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                <label class="form-check-label" for="student5">Étudiant 15</label>
                <input class="form-check-input" type="checkbox" id="student5" />
              </li>
            </ul>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn rounded-pill w-25">Valider</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</main>
    
<?php 
include_once "../common/footer.php";
?>