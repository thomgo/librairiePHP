<form action="" method="post">
  <label> Titre :
    <input type="text" name="titre" value="">
  </label>
  <label> Auteur :
    <input type="text" name="auteur" value="">
  </label>
  <label> Résumé :
    <textarea name="resume"rows="10" cols="50">
      Résumé de l'oeuvre
    </textarea>
  </label>
  <label> Date de parution :
    <input type="number" name="parution" min="-5000" max="2020">
  </label>
  <label> Catégorie :
    <select name="categorie">
     <option value="fantastique">Fantastique</option>
     <option value="poesie">Poesie</option>
     <option value="roman">Roman</option>
    </select>
  </label>
  <!-- <input type="hidden" name="dispo" value="true"> -->
  <input type="submit" name="ajoutLivre" value="Ajouter">
</form>
