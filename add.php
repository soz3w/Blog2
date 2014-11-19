<?php

$nom ="";
$population ="";
$surface ="";




$db=new PDO('mysql:host=localhost;dbname=classroom','root','troiswa');
$db->exec("SET NAMES UTF8");

$query=$db->prepare
("INSERT INTO city (name,population,surface) VALUES (:nom, :population, :surface)");

$query->bindParam(':nom', $nom);
$query->bindParam(':population', $population);
$query->bindParam(':surface', $surface);

if (array_key_exists("nom", $_GET))
	$nom = $_GET["nom"];

if (array_key_exists("population", $_GET))
	$population= intval($_GET["population"]);

if (array_key_exists("surface", $_GET))
	$surface = intval($_GET["surface"]);

$query->execute();

header('Content-type: application/json'); 





