<?php
  include("template/header.php")
 ?>

<h2 class="text-center mb-4">Liste des livres en stock</h2>

<div class="flex">
  <!-- Sorting form -->
  <form action="" method="post" class="flex">
    <select class="form-control mr-3" name="category">
      <option value="false">Toutes catégories</option>
     <option value="fantastique">Fantastique</option>
     <option value="poesie">Poesie</option>
     <option value="roman">Roman</option>
    </select>
    <input class="btn bgViolet"type="submit" name="sortBook" value="Trier">
  </form>

  <!-- Button trigger modal -->
  <button type="button" class="btn bgViolet ml-3" data-toggle="modal" data-target="#exampleModal">
    Ajouter un livre <i class="fas fa-feather-alt"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content p-3">
        <h3 class="text-center mb-2">Nouveau livre</h3>
        <?php include("Forms/addBookForm.php"); ?>
      </div>
    </div>
  </div>
</div>

<table class="table mt-4">
  <thead class="thead-light bgBlue">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Titre</th>
      <th scope="col">Auteur</th>
      <th scope="col">Parution</th>
      <th scope="col">Statut</th>
      <th scope="col">Categorie</th>
      <th scope="col">Gestion</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($books as $book) {
          echo "<tr>" .
          "<td>" . $book->getB_id() . "</td>" .
          "<td>" . $book->getTitle() . "</td>" .
          "<td>" . $book->getAuthor() . "</td>" .
          "<td>" . $book->getReleaseDate() . "</td>" .
          "<td>" . $book->getStatusIcon() . "</td>" .
          "<td>" . $book->getCategory() . "</td>" .
          "<td><a href=book.php?book=". $book->getB_id() ."> Gérer </a></td>" .
          "</tr>";
        }
     ?>
  </tbody>
</table>

 <?php
   include("template/footer.php")
  ?>
