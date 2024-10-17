<?php 
include_once "common/header-admin.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card bg-white border-0 shadow p-4 rounded">

            <h3 class="text-center text-secondary mb-4">Créer un nouvel utilisateur</h3>

            <form action="/create-user" method="post">
              <!-- Nom -->
              <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom" required>
              </div>

              <!-- Prénom -->
              <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez le prénom" required>
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="exemple@campus-espl.org" required>
              </div>

              <!-- Mot de passe -->
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez un mot de passe" required>
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
                <input type="text" class="form-control" id="classe" name="classe" placeholder="Ex: Classe A, B, C" required>
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