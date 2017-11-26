<?php
require("../entities/livre.php");
require("../model/livreManager.php");

$db = new PDO('mysql:host=localhost;dbname=librairie', 'root', 'ThomAdmin12');

$livreManager = new livreManager($db);
$books = $livreManager->getBooks();

include "../views/indexVue.php";
 ?>
