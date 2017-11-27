<?php

class Livre {

  use Hydrator;

  protected $l_id;
  protected $titre;
  protected $auteur;
  protected $resume;
  protected $parution;
  protected $categorie;
  protected $dispo;
  protected $statut;
  protected $utilisateur;

  //Constructor
  public function __construct($array) {
    $this->setDispo(1);
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
    //Call the statut function to store it in the same time
    $this->setStatut($this->getDispo());
  }

  public function getDispo() {
    return $this->dispo;
  }

  //Statut functions
  //Based on dispo attribut store a string in $statut attribut
  public function setStatut($dispo) {
    if($dispo) {
      $this->statut = "Disponible";
    }
    else {
      $this->statut = "Emprunté";
    }
  }

  public function getStatut() {
    return $this->statut;
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
