<?php
require_once 'header.php';
require_once 'conexion_Bd.php';

$table = "utilisateur";
$lienVersAffichage = "http://localhost/exercicebdphp/index.php";

if(isset($_GET['detail_id']) ){
   $id =  $_GET['detail_id'];

    $requet = $connexion->prepare(
        "SELECT * FROM $table WHERE id=$id"
    );
    
    $requet->execute();
    $resultat = $requet->fetchall();

    // echo '<pre>';
    // print_r($resultat);
    // echo '</pre>';
}

if(isset($_POST['modifier']) ){
    $nom = $_POST['nom'];
    $prenoms = $_POST['prenoms'];
    $civilite = $_POST['civilite'];
    $sexe = $_POST['sexe'];
    $age = $_POST['age'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    var_dump($nom, $prenoms, $sexe, $adresse, $telephone);

    try {
      $modification = "UPDATE $table SET nom=?, prenoms=?, civilite=?, sexe=?, age=?, adresse=?, email=?, telephone=? WHERE id=?";
      $requete = $connexion->prepare($modification);
      $requete->execute([$nom, $prenoms, $civilite, $sexe, $age, $adresse, $email, $telephone, $id]);
      header('Location:'.$lienVersAffichage);
    exit;

  } catch (PDOException $e) {
      echo "Une erreur s'est produite: " . $e->getMessage();
  }
  
}


?>
<div class="container form-signin">
  <main>
    <div class="text-center">
      <h2>vous pouvez modfier</h2>
      <p class="lead"> Votre nom, prénoms et sexe sont obligatoires</p>
    </div>
   
    <div class="row g-5>
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Renseignement principal</h4>

        <form class="needs-validation" id="formulaire" method="POST">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="nom" name="nom" value="<?=htmlentities($resultat[0]['nom'])?>" required>

            </div>

            <div class="col-sm-6">
              <label for="prenoms" class="form-label">Prénoms</label>
              <input type="text" class="form-control" id="prenoms" name="prenoms" value="<?=htmlentities($resultat[0]['prenoms'])?>" >
            </div>

            <?php if ($resultat[0]['civilite'] == "M"){?>
            <div class="col-12 mt-4">
              <label for="" class="form-label">Je suis ...</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="civilite" id="marie" value="M" checked required >
                <label class="form-check-label" for="marie">Marié(e)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="civilite" id="celibataire" value="C" required>
                <label class="form-check-label" for="celibataire">Célibataire</label>
            </div>
              </div>
            </div>
            <?php }else { ?>
              <div class="col-12 mt-4">
              <label for="" class="form-label">Je suis ...</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="civilite" id="marie" value="M" required>
                <label class="form-check-label" for="marie">Marié(e)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="civilite" id="celibataire" value="C" checked required>
                <label class="form-check-label" for="celibataire">Célibataire</label>
            </div>
              </div>
            </div>
            <?php } ?>

        <?php if ($resultat[0]['sexe'] == "H"){?>
            <div class="col-12 my-4">
                <label for="" class="form-label">je suis un(e) ...</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="homme" value="H" checked required>
                    <label class="form-check-label" for="homme">Homme</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="femme" value="F" required>
                    <label class="form-check-label" for="femme">Femme</label>
                </div>
            </div>
        <?php }else { ?>
                <div class="col-12 my-4">
                <label for="" class="form-label">je suis un(e) ...</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="homme" value="H" required>
                    <label class="form-check-label" for="homme">Homme</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="femme" value="F" checked required>
                    <label class="form-check-label" for="femme">Femme</label>
                </div>
            </div>
        </div>
        <?php } ?>


            <div class="col-12 mb-4">
              <label for="age" class="form-label">Age<span class="text-muted">(Optionnel)</span></label>
              <input type="number" class="form-control" id="age" name="age" value="<?=htmlentities($resultat[0]['age'])?>" min="0" required>
            </div>


            <div class="col-12 mb-4">
              <label for="adresse" class="form-label">Adresse <span class="text-muted">(Optionnel)</span></label>
              <input type="text" class="form-control" id="adresse" name="adresse" value="<?=htmlentities($resultat[0]['adresse'])?>" required>
            </div>

            <div class="col-12 mb-4">
              <label for="email" class="form-label">email <span class="text-muted">(Optionnel)</span></label>
              <input type="email" class="form-control" id="email" name="email" value="<?=htmlentities($resultat[0]['email'])?>" required >
            </div>

            <div class="col-12">
              <label for="telephone" class="form-label">Telephone <span class="text-muted">(Optionnel)</span></label>
              <input type="text" class="form-control" id="telephone" name="telephone" value="<?=htmlentities($resultat[0]['telephone'])?>" required >
            </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg mb-2" name = "modifier" type="submit">Modifier</button>
          <button class="w-100 btn btn-secondary btn-lg"  type="reset">Annuler</button>

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