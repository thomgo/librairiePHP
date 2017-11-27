<?php
//On charge les classes, les outils et les managers
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
if(isset($_GET["livre"])) {
  // On récupère les informations relatives à ce livre pour affichage
  $book = $livreManager->getBook($_GET["livre"]);
}
//Sinon on crée un message d'erreur
else {
  $message = "Hum bizare, il semble que vous n'avez pas sélectionné de livre";
}

//Si un formulaire de prêt a été soumis
if(!empty($_POST["prete"])) {
  //Va cherche l'utilisateur en BDD qui porte le code utilisateur
  $utilisateur = $utilisateurManager->getUser($_POST["personnalCode"]);
  //Si on a trouvé un utilisateur on met à jour le livre
  if($utilisateur) {
    $book->setDispo(0);
    $book->setUtilisateur($utilisateur->getPersonnalCode());
    $livreManager->updateBookStatut($book);
  }
}

//Si un formulaire de rendu a été soumis on update le livre
if(!empty($_POST["rendu"])) {
  $book->setDispo(1);
  $book->setUtilisateur(null);
  $livreManager->updateBookStatut($book);
}


include "../views/livreVue.php";
 ?>
