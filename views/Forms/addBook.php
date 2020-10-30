<form action="" method="post">
  <div class="form-group">
    <label> Titre :</label>
    <input class="form-control" type="text" name="title" value="">
  </div>
  <div class="form-group">
    <label> Auteur :</label>
    <input class="form-control" type="text" name="author" value="">
  </div>
  <div class="form-group">
    <label> Résumé :</label>
    <textarea class="form-control" name="summary" rows="5" cols="50"></textarea>
  </div>
  <div class="form-group">
    <label> Année de parution :</label>
    <input class="form-control" type="number" name="releaseDate" min="-5000" max="2020">
  </div>
  <div class="form-group">
    <label> Catégorie :</label>
      <select class="form-control" name="category">
       <option value="fantastique">Fantastique</option>
       <option value="poesie">Poesie</option>
       <option value="roman">Roman</option>
      </select>
  </div>
  <div class="text-center">
    <input  class="btn bgViolet" type="submit" name="addBook" value="Ajouter">
  </div>
</form>
