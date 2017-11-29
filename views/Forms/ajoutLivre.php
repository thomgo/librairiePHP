<form action="" method="post">
  <div class="form-group">
    <label> Titre :
      <input class="form-control" type="text" name="titre" value="">
    </label>
  </div>
  <div class="form-group">
    <label> Auteur :
      <input class="form-control" type="text" name="auteur" value="">
    </label>
  </div>
  <div class="form-group">
    <label> Résumé :
      <textarea class="form-control" name="resume"rows="10" cols="50">
      </textarea>
    </label>
  </div>
  <div class="form-group">
    <label> Date de parution :
      <input class="form-control" type="number" name="parution" min="-5000" max="2020">
    </label>
  </div>
  <div class="form-group">
    <label> Catégorie :
      <select class="form-control" name="categorie">
       <option value="fantastique">Fantastique</option>
       <option value="poesie">Poesie</option>
       <option value="roman">Roman</option>
      </select>
    </label>
  </div>
  <input  class="btn bgViolet" type="submit" name="ajoutLivre" value="Ajouter">
</form>
