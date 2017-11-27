<?php
  include("template/header.php")
 ?>

<h2>Gestion du livre</h2>

<?php

if($book) {
  if ($book->getDispo()) {
    $statut = "Disponible";
  }
  else {
    $statut = "Emprunté";
  }
  echo
  "<p> Identifiant : " . $book->getL_id() . "</p>" .
  "<p> Titre : " . $book->getTitre() . "</p>" .
  "<p> Auteur : " . $book->getAuteur() . "</p>" .
  "<p> Date : " . $book->getParution() . "</p>" .
  "<p> Statut : " . $statut . "</p>" .
  "<p> Categorie : " . $book->getCategorie() . "</p>" .
  "<p> résumé : " . $book->getResume() . "</p>";
}
else{
  echo $message;
}

?>

<form action="" method="post">
  <input type="number" name="personnalCode" value="">
  <input type="submit" name="prete" value="Prêter le livre">
</form>

<form action="" method="post">
  <input type="submit" name="rendu" value="Livre rendu">
</form>

<?php
  include("template/footer.php")
 ?>
