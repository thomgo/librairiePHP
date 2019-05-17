<?php
//load the autoloader to avoid extra requires
require_once("../services/Autoloader.php");
Autoloader::autoload();

$livreManager = new livreManager();

//If a form to add a book has been submitted
if(!empty($_POST["ajoutLivre"])) {
  //We create a new book object from the form
  $book = new Livre($_POST);
  //We store the book in the database
  $livreManager->addBook($book);
}

//If a sorting form with a category has been submitted
if(!empty($_POST["trie"]) && $_POST["categorie"] != "false") {
  //We get from the database the books with that category
  $books = $livreManager->getBooksByCategorie($_POST["categorie"]);
}
//Otherwise we just get all the books
else{
  $books = $livreManager->getBooks();
}

include "../views/indexVue.php";
 ?>
