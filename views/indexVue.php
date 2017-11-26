<?php
  include("template/header.php")
 ?>

<h2>Liste des livres en stock</h2>

<?php

    foreach ($books as $book) {
      if ($book->getDispo()) {
        $statut = "Disponible";
      }
      else {
        $statut = "Emprunté";
      }
      echo "<p>" .
      "<span> Identifiant : " . $book->getL_id() . "</span>" .
      "<span> Titre : " . $book->getTitre() . "</span>" .
      "<span> Auteur : " . $book->getAuteur() . "</span>" .
      "<span> Date : " . $book->getParution() . "</span>" .
      "<span> Statut : " . $statut . "</span>" .
      "<span> Categorie : " . $book->getCategorie() . "</span>" .
      "</p>";
    }

 ?>

 <?php
   include("template/footer.php")
  ?>
