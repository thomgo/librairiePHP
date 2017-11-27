<?php
require("../entities/livre.php");
require("../model/livreManager.php");

$db = new PDO('mysql:host=localhost;dbname=librairie', 'root', 'ThomAdmin12');
$livreManager = new livreManager($db);

//Pas de livre sélectionné par défaut
$book = false;

//Si on trouve dans l'url l'id d'un livre
// On récupère les informations relatives à ce livre pour affichage
if(isset($_GET["livre"])) {
  $book = $livreManager->getBook($_GET["livre"]);
}
//Sinon on crée un message d'erreur
else {
  $message = "Hum bizare, il semble que vous n'avez pas sélectionné de livre";
}


include "../views/livreVue.php";
 ?>
