<?php
//load the autoloader to avoid extra requires
require_once("../services/Autoloader.php");
Autoloader::autoload();

$userManager = new utilisateurManager();

//If a form to add a user has been submitted
if(!empty($_POST["addUser"])) {
  //We create a new book object from the form
  $user = new Utilisateur($_POST);
  //We generate a random personnal code
  $user->generatePersonnalCode();
  //Check if the code is unique
  while (!$userManager->checkCode($user)) {
    $user->generatePersonnalCode();
  }
  //We store the user in the database
  $userManager->addUser($user);
}

// //If a sorting form with a category has been submitted
// if(!empty($_POST["trie"]) && $_POST["categorie"] != "false") {
//   //We get from the database the books with that category
//   $books = $livreManager->getBooksByCategorie($_POST["categorie"]);
// }
// //Otherwise we just get all the books
// else{
//   $books = $livreManager->getBooks();
// }
$users = $userManager->getUsers();
include "../views/usersView.php";
 ?>
