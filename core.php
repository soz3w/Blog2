<?php
// Connection au serveur
$dns = 'mysql:host=localhost;dbname=minichat';
$utilisateur = 'root';
$motDePasse = 'troiswa';
$db= new PDO( $dns, $utilisateur, $motDePasse );

$db->exec("SET NAMES UTF8");

//var_dump($db);

require("models/model.php");