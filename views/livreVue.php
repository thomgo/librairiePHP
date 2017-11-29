<?php
  include("template/header.php")
 ?>

<h2 class="mb-3">Gestion du livre</h2>
<?php
//Si on a bien un livre trouvé en base de données on affiche ses infos
if($book) {
  ?>
  <div class="row">
      <div class="col-6">
        <div class="card mb-3">
          <div class="card-header bgBlue">Informations</div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <?php
              echo
              "<li class='list-group-item'> Identifiant : " . $book->getL_id() . "</li>" .
              "<li class='list-group-item'> Titre : " . $book->getTitre() . "</li>" .
              "<li class='list-group-item'> Auteur : " . $book->getAuteur() . "</li>" .
              "<li class='list-group-item'> Date : " . $book->getParution() . "</li>" .
              "<li class='list-group-item'> Statut : " . $book->getStatut() . "</li>" .
              "<li class='list-group-item'> Categorie : " . $book->getCategorie() . "</li>" .
              "<li class='list-group-item'> résumé : " . $book->getResume() . "</li>";
               ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-6">
        <?php if($book->getUtilisateur()) { ?>
        <div class="card mb-3">
          <div class="card-header bgBlue">Utilisateur</div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <?php
                  echo "<li class='list-group-item'> Prénom : " . $book->getUtilisateur()->getfirstName() . "</li>".
                  "<li class='list-group-item'> Nom : " . $book->getUtilisateur()->getlastName() . "</li>".
                  "<li class='list-group-item'> Age : " . $book->getUtilisateur()->getAge() . "</li>".
                  "<li class='list-group-item'> Ville : " . $book->getUtilisateur()->getCity() . "</li>".
                  "<li class='list-group-item'> Téléphone : " . $book->getUtilisateur()->getPhone() . "</li>".
                  "<li class='list-group-item'> Mail : " . $book->getUtilisateur()->getMail() . "</li>".
                  "<li class='list-group-item'> Code personnel : " . $book->getUtilisateur()->getPersonnalCode() . "</li>";
               ?>
            </ul>
          </div>
        </div>
      <?php } ?>
      </div>
  </div>
<?php

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
