<?php
$serveur='localhost';
$login = 'root';
$pass = '';

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=mabase",$login, $pass);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connexion à la base de donnée reussit';
} catch (PDOException $e){
    echo 'Echec de la conexion: '.$e->getMessage();
}