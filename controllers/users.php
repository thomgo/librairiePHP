<?php
//load the autoloader to avoid extra requires
require_once("../services/Autoloader.php");
Autoloader::autoload();

$userManager = new UserManager();

// If a form to add a user has been submitted
if(!empty($_POST["addUser"])) {
  // We create a new book object from the form
  $user = new User($_POST);
  // We generate a random personnal code
  $user->generatePersonnalCode();
  // Check if the code is unique (note this is ugly to do this)
  // Usually codes should follow a pattern and not be generated all randomly like here
  while (!$userManager->checkCode($user)) {
    $user->generatePersonnalCode();
  }
  // We store the user in the database
  $userManager->addUser($user);
}

// If a sorting form has been submitted
if(isset($_POST['trie']) && !empty($_POST["userSearch"])) {
  //We get from the database the users that match the request
  $users = $userManager->getUserSorted($_POST["userSearch"]);
}
//Otherwise we just get all the users
else{
  $users = $userManager->getUsers();
}

include "../views/usersView.php";
 ?>
