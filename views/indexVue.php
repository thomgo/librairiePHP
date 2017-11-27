<?php
  include("template/header.php")
 ?>

<h2>Liste des livres en stock</h2>

<form action="" method="post">
  <select name="categorie">
    <option value="false">Toutes catégories</option>
   <option value="fantastique">Fantastique</option>
   <option value="poesie">Poesie</option>
   <option value="roman">Roman</option>
  </select>
  <input type="submit" name="trie" value="Trier">
</form>

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
      "<span><a href=livre.php?livre=". $book->getL_id() ."> Gérer </a></span>" .
      "</p>";
    }

 ?>

 <?php
   include("template/footer.php")
  ?>
