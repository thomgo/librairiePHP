<?php
require_once("../services/hydrator.php");
require_once("../entities/livre.php");
require_once("../entities/utilisateur.php");
require_once("../model/livreManager.php");
require_once("../model/utilisateurManager.php");

$db = new PDO('mysql:host=localhost;dbname=librairie', 'root', 'ThomAdmin12');
$livreManager = new livreManager($db);
$utilisateurManager = new utilisateurManager($db);

//Pas de livre sélectionné par défaut
$book = false;

//Si on trouve dans l'url l'id d'un livre
// On récupère les informations relatives à ce livre pour affichage
if(isset($_GET["livre"])) {
  $book = $livreManager->getBook($_GET["livre"]);
  if ($book->getDispo()) {
    $statut = "Disponible";
  }
  else {
    $statut = "Emprunté";
  }
}
//Sinon on crée un message d'erreur
else {
  $message = "Hum bizare, il semble que vous n'avez pas sélectionné de livre";
}

if(!empty($_POST["prete"])) {
  $utilisateur = $utilisateurManager->getUser($_POST["personnalCode"]);
  if($utilisateur) {
    $book->setDispo(0);
    $book->setUtilisateur($utilisateur->getPersonnalCode());
    $livreManager->updateBookStatut($book);
    $statut = "Emprunté";
  }
}

if(!empty($_POST["rendu"])) {
  $book->setDispo(1);
  $book->setUtilisateur(null);
  $livreManager->updateBookStatut($book);
  $statut = "Disponible";
}


include "../views/livreVue.php";
 ?>
