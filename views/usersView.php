<?php
  include("template/header.php")
 ?>

<h2 class="text-center mb-4">Utilisateurs enregistrés</h2>

<div class="flex">
  <!-- Sorting form -->
  <form action="" method="post" class="flex">
    <select class="form-control mr-3" name="categorie">
      <option value="false">Toutes catégories</option>
     <option value="fantastique">Fantastique</option>
     <option value="poesie">Poesie</option>
     <option value="roman">Roman</option>
    </select>
    <input class="btn bgViolet"type="submit" name="trie" value="Trier">
  </form>

  <!-- Button trigger modal -->
  <button type="button" class="btn bgViolet ml-3" data-toggle="modal" data-target="#exampleModal">
    Ajouter un utilisateur <i class="fas fa-feather-alt"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content p-3">
        <h3 class="text-center mb-2">Nouvel utilisateur</h3>
        <?php include("Forms/addUtilisateur.php"); ?>
      </div>
    </div>
  </div>
</div>

<table class="table mt-4">
  <thead class="thead-light bgBlue">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Age</th>
      <th scope="col">Ville</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Email</th>
      <th scope="col">Code</th>
      <th scope="col">Gestion</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($users as $user) {
          echo "<tr>" .
          "<td>" . $user->getU_id() . "</td>" .
          "<td>" . $user->getLastName() . "</td>" .
          "<td>" . $user->getFirstName() . "</td>" .
          "<td>" . $user->getAge() . "</td>" .
          "<td>" . $user->getCity() . "</td>" .
          "<td>" . $user->getPhone() . "</td>" .
          "<td>" . $user->getMail() . "</td>" .
          "<td>" . $user->getPersonnalCode() . "</td>" .
          "<td><a href=user.php?user=". $user->getU_id() ."> Gérer </a></td>" .
          "</tr>";
        }
     ?>
  </tbody>
</table>

 <?php
   include("template/footer.php")
  ?>
