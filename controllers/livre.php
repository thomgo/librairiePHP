<?php
//On charge l'autoloader (voir services)
require_once("../services/Autoloader.php");
Autoloader::autoload();

$livreManager = new livreManager();
$utilisateurManager = new utilisateurManager();

//Pas de livre sélectionné par défaut
$book = false;

//Si on trouve dans l'url l'id d'un livre
if(isset($_GET["livre"])) {
  // On récupère les informations relatives à ce livre pour affichage
  $book = $livreManager->getBookAndUser($_GET["livre"]);
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
    $book->setUtilisateur($utilisateur);
    $livreManager->borrowBook($book);
  }
}

//Si un formulaire de rendu a été soumis on update le livre
if(!empty($_POST["rendu"])) {
  $book->unsetUtilisateur();
  $livreManager->turnBookBack($book);
}


include "../views/livreVue.php";
 ?>
