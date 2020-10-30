<?php

class Book {

  use Hydrator;

  protected $b_id;
  protected $title;
  protected $author;
  protected $summary;
  protected $releaseDate;
  protected $category;
  protected $status;
  protected $statusIcon;
  protected $user;

  //Constructor
  public function __construct($array) {
    $this->setStatus(1);
    $this->hydrate($array);
  }

  //ID functions
  public function setB_id($id) {
    $this->b_id = $id;
  }

  public function getB_id() {
    return $this->b_id;
  }

  //Title functions
  public function setTitle(string $title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }

  //Auteur functions
  public function setAuthor($author) {
    $this->author = $author;
  }

  public function getAuthor() {
    return $this->author;
  }

  //Resume functions
  public function setSummary($summary) {
    $this->summary = $summary;
  }

  public function getSummary() {
    return $this->summary;
  }

  //Parution functions
  public function setReleaseDate($releaseDate) {
    $this->releaseDate = $releaseDate;
  }

  public function getReleaseDate() {
    return $this->releaseDate;
  }

  //Categorie functions
  public function setCategory($category) {
    $this->category = $category;
  }

  public function getCategory() {
    return $this->category;
  }

  //Dispo functions
  public function setStatus($status) {
    $this->status = $status;
    //Call the statut function to store it in the same time
    $this->setStatusIcon($status);
  }

  public function getStatus() {
    return $this->status;
  }

  //Statut functions
  //Based on dispo attribut store a string in $statusIcon attribut
  public function setStatusIcon($status) {
    if($status) {
      $this->statusIcon = "<i class='far fa-check-circle' style='color:green'></i>";
    }
    else {
      $this->statusIcon = "<i class='far fa-times-circle' style='color:red'></i>";
    }
  }

  public function getStatusIcon() {
    return $this->statusIcon;
  }

  //Utilisateur functions
  public function setUser(User $user) {
    //avoid empty user to be add
    if($user->getfirstName()) {
      $this->user = $user;
      $this->setStatus(0);
    }
  }

  public function unsetUser() {
    $this->user = null;
    $this->setStatus(1);
  }

  public function getUser() {
    return $this->user;
  }
}

 ?>
