<?php
  include("template/header.php")
 ?>

<h2 class="mb-3">Gestion du livre</h2>
<?php
//If a book was found in database we show the information
if($book) {
  ?>
  <div class="row">
      <div class="col-6">
        <div class="card mb-3">
          <div class="card-header bgBlue text-center">
            <h5 class="card-title">Informations <i class="fas fa-info-circle"></i></h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class='list-group-item'><span class="font-weight-bold">Identifiant : </span><?php echo $book->getL_id(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Titre : </span><?php echo $book->getTitre() ?>:</li>
              <li class='list-group-item'><span class="font-weight-bold">Auteur : </span><?php echo $book->getAuteur() ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Date : </span><?php echo $book->getParution() ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Statut : </span><?php echo $book->getStatut() ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Catégorie : </span><?php echo $book->getCategorie() ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Résumé : </span><?php echo $book->getResume() ?></li>
              <li class='list-group-item'>
                <?php
                  //Show the the right form according to the disponibility of the book
                  if($book->getDispo()) {
                    include("../views/Forms/Emprunt.php");
                  }
                  else {
                    include("../views/Forms/Rendu.php");
                  }
                 ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-6">
        <?php if($book->getUtilisateur()) { ?>
        <div class="card mb-3">
          <div class="card-header bgBlue text-center">
            <h5 class="card-title">Emprunteur <i class="fas fa-user-circle"></i></h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class='list-group-item'><span class="font-weight-bold">Prénom : </span><?php echo $book->getUtilisateur()->getfirstName(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Nom : </span><?php echo $book->getUtilisateur()->getlastName(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Age : </span><?php echo $book->getUtilisateur()->getAge(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Ville : </span><?php echo $book->getUtilisateur()->getCity(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Téléphone : </span><?php echo $book->getUtilisateur()->getPhone(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Mail : </span><?php echo $book->getUtilisateur()->getMail(); ?></li>
              <li class='list-group-item'><span class="font-weight-bold">Code personnel : </span><?php echo $book->getUtilisateur()->getPersonnalCode(); ?></li>
            </ul>
          </div>
        </div>
      <?php } ?>
      </div>
  </div>
<?php
}
//If no book was found we display the error message
else{
  echo $message;
}

?>


<?php
  include("template/footer.php")
 ?>