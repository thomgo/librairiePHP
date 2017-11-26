<?php
require("../entities/livre.php");
require("../model/livreManager.php");

$db = new PDO('mysql:host=localhost;dbname=librairie', 'root', 'ThomAdmin12');
$livreManager = new livreManager($db);

//If there is a sorting form submitted and and there is a specific category
//Get the books sorted by this category
if(!empty($_POST["trie"] && $_POST["categorie"] != "false")) {
  $books = $livreManager->getBooksByCategorie($_POST["categorie"]);
}
//Otherwise just get all the books
else{
  $books = $livreManager->getBooks();
}

include "../views/indexVue.php";
 ?>
