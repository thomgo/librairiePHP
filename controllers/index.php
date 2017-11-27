<?php
require_once("../services/hydrator.php");
require("../entities/livre.php");
require("../model/livreManager.php");

$db = new PDO('mysql:host=localhost;dbname=librairie', 'root', 'ThomAdmin12');
$livreManager = new livreManager($db);

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
