<?php 
  include_once "common/header-admin.php";
  include_once "database/db-connexion.php";
  include_once "database/db-create-user.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card bg-white border-0 shadow p-4 rounded">

            <h3 class="text-center text-secondary mb-4">Créer un utilisateur</h3>

            <form action="create-user.php" method="POST">

              <!-- Nom -->
              <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="first_name" placeholder="Entrez le nom" required>
              </div>

              <!-- Prénom -->
              <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="surname" placeholder="Entrez le prénom" required>
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="exemple@campus-espl.org" required>
              </div>

              <!-- Mot de passe -->
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe provisoire :</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez un mot de passe provisoire" required>
              </div>

              <!-- Rôle -->
              <div class="mb-3">
                <label for="role" class="form-label">Rôle :</label>
                <select class="form-select" id="role" name="role" required>
                  <option value="" selected disabled>Choisir un rôle</option>
                  <option value="etudiant">Étudiant</option>
                  <option value="enseignant">Enseignant</option>
                  <option value="administrateur">Administrateur</option>
                </select>
              </div>

              <!-- Classe -->
              <div class="mb-4">
                <label for="classe" class="form-label">Classe :</label>
                <select class="form-select mb-4" id="class_id" name="class_id">
                    <option value=""></option>
                    <?php foreach($classes as $c): ?>
                      <option value=<?php echo($c["id"]); ?>> 
                        <?php  echo($c["name"]); ?> 
                      </option>
                    <?php endforeach; ?>
                </select>
              </div>

              <!-- Submit Button -->
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn rounded-pill w-50">Créer l'utilisateur</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
</main>

<?php 
include_once "common/footer.php";
?>