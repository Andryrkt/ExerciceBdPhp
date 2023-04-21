<?php
require_once 'header.php';
require_once 'conexion_Bd.php';


$requet = $connexion->prepare(
    "SELECT id, nom, prenoms FROM personnes"
);

$requet->execute();
$resultat = $requet->fetchall();

$lienVersUpdate = 'update.php?detail_id=';

?>
<div class="container">
    <h2 class=" my-4 text-center">LISTE DES PERSONNES ENREGISTRER</h2>
    <table class="table table-dark table-striped ">
        <thead class="text-center">
            <tr><th>id</th><th>Nom</th><th>Prénoms</th><th colspan="2">ACTIONS</th></tr>
        </thead>
        <tbody>
            <?php foreach ($resultat as $value) : ?>
             <tr>
                <td class="text-center"><?=$value['id']?></td>
                <td><?=$value['nom']?></td>
                <td><?=$value['prenoms']?></td>
                <td class="text-center"><a href="<?=$lienVersUpdate.$value['id']?>" class="btn btn-outline-info">détails</a></td>
                <td class="text-center"><a href="#" class= " btn btn-outline-danger">delete</a></td></tr>
         <?php endforeach?>
        </tbody>
    </table>
</div>


<?php
require_once 'footer.php';
?>


