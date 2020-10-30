<?php
//load the autoloader to avoid extra requires
require_once("../services/Autoloader.php");
Autoloader::autoload();

$bookManager = new BookManager();
$utilisateurManager = new UserManager();

//No default book selected
$user = false;

//If there is a book id in the url
if(isset($_GET["user"]) && !empty($_GET["user"])) {
  // On récupère les informations relatives à ce livre pour affichage
  $user = $utilisateurManager->getUserById($_GET["user"]);
}
//Otherwise we make an error message
else {
  $message = "Hum bizare, il semble que vous n'avez pas sélectionné d'utilisateur";
}

include "../views/userView.php";
 ?>
