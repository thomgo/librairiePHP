<?php
//On charge l'autoloader (voir les services)
require_once("../services/Autoloader.php");
Autoloader::autoload();

$db = new PDO('mysql:host=localhost;dbname=librairie', 'root', 'ThomAdmin12');
$livreManager = new livreManager($db);

//Si un formulaire d'ajout de livre a été soumis
if(!empty($_POST["ajoutLivre"])) {
  //On crée un objet livre sur la base du formulaire
  $book = new Livre($_POST);
  //On enregistre le livre en base de données
  $livreManager->addBook($book);
}

//Si un formulaire de trie a été soumis avec une catégorie spécifique
if(!empty($_POST["trie"]) && $_POST["categorie"] != "false") {
  //On récupère les livres de cette catégorie
  $books = $livreManager->getBooksByCategorie($_POST["categorie"]);
}
//Sinon on récupère simplement tous les livres
else{
  $books = $livreManager->getBooks();
}

include "../views/indexVue.php";
 ?>
