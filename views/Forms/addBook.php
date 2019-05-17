<form action="" method="post">
  <div class="form-group">
    <label> Titre :</label>
    <input class="form-control" type="text" name="titre" value="">
  </div>
  <div class="form-group">
    <label> Auteur :</label>
    <input class="form-control" type="text" name="auteur" value="">
  </div>
  <div class="form-group">
    <label> Résumé :</label>
    <textarea class="form-control" name="resume"rows="5" cols="50"></textarea>
  </div>
  <div class="form-group">
    <label> Année de parution :</label>
    <input class="form-control" type="number" name="parution" min="-5000" max="2020">
  </div>
  <div class="form-group">
    <label> Catégorie :</label>
      <select class="form-control" name="categorie">
       <option value="fantastique">Fantastique</option>
       <option value="poesie">Poesie</option>
       <option value="roman">Roman</option>
      </select>
  </div>
  <div class="text-center">
    <input  class="btn bgViolet" type="submit" name="ajoutLivre" value="Ajouter">
  </div>
</form>
