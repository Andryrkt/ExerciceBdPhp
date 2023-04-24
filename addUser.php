<?php
require_once 'header.php';
require_once 'conexion_Bd.php';

if(isset($_POST['enregistrer']) ){
  try {
    $nom = $_POST['nom'];
    $prenoms = $_POST['prenoms'];
    $civilite = $_POST['civilite'];
    $sexe = $_POST['sexe'];
    $age = $_POST['age'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $lienVersAffichage = "http://localhost/exercicebdphp/listUser.php";

    var_dump($nom, $prenoms,$civilite, $sexe, $age, $adresse,$email, $telephone);

    $insert = $connexion->prepare (
        "INSERT INTO $table(nom,prenoms,civilite,sexe,age,adresse,email,telephone)
        VALUE (:nom,:prenoms,:civilite,:sexe,:age,:adresse,:email, :telephone)"
    );

    $insert->bindParam(':nom', $nom);
    $insert->bindParam(':prenoms', $prenoms);
    $insert->bindParam(':civilite', $civilite);
    $insert->bindParam(':sexe', $sexe);
    $insert->bindParam(':age', $age);
    $insert->bindParam(':adresse', $adresse);
    $insert->bindParam(':email', $email);
    $insert->bindParam(':telephone', $telephone);

    $insert->execute();
    header('Location:'.$lienVersAffichage);
    exit;

} catch (PDOException $e) {
    echo "Une erreur s'est produite: " . $e->getMessage();
}

}

?>


    
<div class="container d-flex justify-content-center">
  <main>
    <div class="text-center">
      <h2>Enregistrez-vous</h2>
      <p class="lead"> seul le prénoms est facultatif</p>
    </div>

    <div class="row g-5>
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Renseignement principal</h4>

        <form class="needs-validation" id="addUserForm" method="POST">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="nom" name="nom" minlingth="3" required>
              <small></small>
            </div>

            <div class="col-sm-6">
              <label for="prenoms" class="form-label">Prénoms <span class="text-muted">(Optionnel)</span></label>
              <input type="text" class="form-control" id="prenoms" name="prenoms" >
              <small></small>
            </div>

          
            <div class="col-12 mt-4">
              <label for="" class="form-label">Je suis ...</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input civilite" type="radio" name="civilite" id="marie" value="M" required>
                <label class="form-check-label" for="marie">Marié(e)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input civilite" type="radio" name="civilite" id="celibataire" value="C" required>
                <label class="form-check-label" for="celibataire">Célibataire</label>
            </div>
              <small id="smallCivilite"></small>
              </div>
            </div>

          
            <div class="col-12 my-4">
              <label for="" class="form-label">Je suis un(e) ...</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexe" id="homme" value="H" required>
                <label class="form-check-label" for="homme">Homme</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexe" id="femme" value="F" required>
                <label class="form-check-label" for="femme">Femme</label>
            </div>
              <div class="invalid-feedback">
              Veillez renseigner votre nom
                </div>
              </div>
            </div>


            <div class="col-12 mb-4">
              <label for="age" class="form-label">Age</label>
              <input type="number" class="form-control" id="age" name="age" placeholder="48" min="0" >
            </div>


            <div class="col-12 mb-4">
              <label for="adresse" class="form-label">Adresse </label>
              <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Lot IVX 45 bis Tsaramasay" >
            </div>

            <div class="col-12 mb-4">
              <label for="email" class="form-label">email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Tsarahomba@code.com" >
              <small></small>
            </div>


            <div class="col-12">
              <label for="telephone" class="form-label">Telephone</span></label>
              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="+261387485296" >
            </div>

          <hr class="my-4">

          
          <button class="w-100 btn btn-primary btn-lg mb-2" name = "enregistrer" type="submit" id="liveToastBtn">Enregistrer</button>
          <button class="w-100 btn btn-secondary btn-lg" type="reset">Annuler</button>

        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; Merci de votre confiance</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


<?php
require_once 'footer.php';