<?php
  include("template/header.php")
 ?>

<h2>Gestion du livre</h2>

<?php
//Si on a bien un livre trouvé en base de données on affiche ses infos
if($book) {
  echo
  "<p> Identifiant : " . $book->getL_id() . "</p>" .
  "<p> Titre : " . $book->getTitre() . "</p>" .
  "<p> Auteur : " . $book->getAuteur() . "</p>" .
  "<p> Date : " . $book->getParution() . "</p>" .
  "<p> Statut : " . $book->getStatut() . "</p>" .
  "<p> Categorie : " . $book->getCategorie() . "</p>" .
  "<p> résumé : " . $book->getResume() . "</p>";

  //Selon la disponibilité du livre on affiche le formulaire correspondant
  //Si le livre est dispo on affiche le formulaire d'Emprunt
  if($book->getDispo()) {
    include("../views/Forms/Emprunt.php");
  }
  //Sinon on affiche le formulaire de rendu
  else {
    include("../views/Forms/Rendu.php");
  }

}
//Sinon on affiche le message d'erreur
else{
  echo $message;
}

?>


<?php
  include("template/footer.php")
 ?>
