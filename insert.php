<?php
require_once 'header.php';
require_once 'conexion_Bd.php';

if(isset($_POST['enregistrer']) ){

    $nom = $_POST['nom'];
    $prenoms = $_POST['prenoms'];
    $sexe = $_POST['sexe'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];

    var_dump($nom, $prenoms, $sexe, $adresse, $telephone);

    // $requete = $connexion->prepare (
    //     "INSERT INTO personnes(nom,prenoms,sexe,adresse,telephone)
    //     VALUE (:nom,:prenoms,:sexe,:adresse,:telephone)"
    // );

    // $requete->bindParam(':nom', $nom);
    // $requete->bindParam(':prenoms', $prenoms);
    // $requete->bindParam(':sexe', $sexe);
    // $requete->bindParam(':adresse', $adresse);
    // $requete->bindParam(':telephone', $telephone);

    // $requete->execute();
}

?>

<div class="container form-signin">
  <main>
    <div class="text-center">
      <h2>Enregistrez-vous</h2>
      <p class="lead"> Votre nom, prénoms et sexe sont obligatoires</p>
    </div>

    <div class="row g-5>
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Renseignement principal</h4>

        <form class="needs-validation" id="formulaire" method="POST">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="nom" name="nom" placeholder="" value="" required>
              <div class="invalid-feedback" id="erreur">
                Veillez renseigner votre nom
              </div>
            </div>

            <div class="col-sm-6">
              <label for="prenoms" class="form-label">Prénoms</label>
              <input type="text" class="form-control" id="prenoms" name="prenoms" placeholder="" value="" >
              <div class="invalid-feedback">
                Veillez renseigner votre nom
              </div>
            </div>

            <div class="col-12 my-4">
              <label for="" class="form-label">Sexe</label>
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
              <label for="adresse" class="form-label">Adresse <span class="text-muted">(Optionnel)</span></label>
              <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Lot IVX 45 bis Tsaramasay" >
            </div>

            <div class="col-12">
              <label for="telephone" class="form-label">Telephone <span class="text-muted">(Optionnel)</span></label>
              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="+261387485296" >
            </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg mb-2" name = "enregistrer" type="submit">Enregistrer</button>
          <button class="w-100 btn btn-secondary btn-lg" name = "enregistrer" type="reset">Annuler</button>

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