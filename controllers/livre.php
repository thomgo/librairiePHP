<?php
//load the autoloader to avoid extra requires
require_once("../services/Autoloader.php");
Autoloader::autoload();

$livreManager = new livreManager();
$utilisateurManager = new utilisateurManager();

//No default book selected
$book = false;

//If there is a book id in the url
if(isset($_GET["livre"]) && !empty($_GET["livre"])) {
  // On récupère les informations relatives à ce livre pour affichage
  $book = $livreManager->getBookAndUser($_GET["livre"]);
}
//Otherwise we make an error message
else {
  $message = "Hum bizare, il semble que vous n'avez pas sélectionné de livre";
}

//If a borrowing form has been submitted
if(!empty($_POST["prete"])) {
  //We get from the database the user we the given code
  $utilisateur = $utilisateurManager->getUser($_POST["personnalCode"]);
  //If a user has been found we update the book
  if($utilisateur) {
    $book->setUtilisateur($utilisateur);
    $livreManager->borrowBook($book);
  }
}

//If a form to give back a book has been submitted
if(!empty($_POST["rendu"])) {
  $book->unsetUtilisateur();
  $livreManager->turnBookBack($book);
}


include "../views/livreVue.php";
 ?>
