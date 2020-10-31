<?php
//load the autoloader to avoid extra requires
require_once("../services/Autoloader.php");
Autoloader::autoload();

$bookManager = new BookManager();
$userManager = new UserManager();

//No default book selected
$book = false;

//If there is a book id in the url
if(isset($_GET["book"]) && !empty($_GET["book"])) {
  // On récupère les informations relatives à ce livre pour affichage
  $book = $bookManager->getBookAndUser($_GET["book"]);
}
//Otherwise we make an error message
else {
  $message = "Hum bizare, il semble que vous n'avez pas sélectionné de livre";
}

//If a borrowing form has been submitted
if(!empty($_POST["borrowBook"])) {
  //We get from the database the user we the given code
  $user = $userManager->getUser($_POST["personnalCode"]);
  //If a user has been found we update the book
  if($user) {
    $book->setUser($user);
    $bookManager->borrowBook($book);
  }
}

//If a form to give back a book has been submitted
if(!empty($_POST["returnBook"])) {
  $book->unsetUser();
  $bookManager->turnBookBack($book);
}


include "../views/bookView.php";
 ?>
