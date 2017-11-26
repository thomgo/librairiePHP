<?php
require("../services/hydrator.php");

class Livre {

  use Hydrator;

  protected $l_id;
  protected $titre;
  protected $auteur;
  protected $resume;
  protected $parution;
  protected $categorie;
  protected $dispo;
  protected $utilisateur;


  //Constructor
  public function __construct($array) {
    $this->hydrate($array);
  }

  //ID functions
  public function setL_id($id) {
    $this->l_id = $id;
  }

  public function getL_id() {
    return $this->l_id;
  }

  //Titre functions
  public function setTitre($titre) {
    $this->titre = $titre;
  }

  public function getTitre() {
    return $this->titre;
  }

  //Auteur functions
  public function setAuteur($auteur) {
    $this->auteur = $auteur;
  }

  public function getAuteur() {
    return $this->auteur;
  }

  //Resume functions
  public function setResume($resume) {
    $this->resume = $resume;
  }

  public function getResume() {
    return $this->resume;
  }

  //Parution functions
  public function setParution($parution) {
    $this->parution = $parution;
  }

  public function getParution() {
    return $this->parution;
  }

  //Categorie functions
  public function setCategorie($categorie) {
    $this->categorie = $categorie;
  }

  public function getCategorie() {
    return $this->categorie;
  }

  //Dispo functions
  public function setDispo($dispo) {
    $this->dispo = $dispo;
  }

  public function getDispo() {
    return $this->dispo;
  }

  //Utilisateur functions
  public function setUtilisateur($utilisateur) {
    $this->utilisateur = $utilisateur;
  }

  public function getUtilisateur() {
    return $this->utilisateur;
  }
}

 ?>
