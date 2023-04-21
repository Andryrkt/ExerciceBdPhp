<?php
$serveur='localhost';
$login = 'root';
$pass = '';
$dbname="listepers";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$dbname",$login, $pass);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connexion à la base de donnée réussite';
} catch (PDOException $e){
    echo 'Echec de la conexion: '.$e->getMessage();
}