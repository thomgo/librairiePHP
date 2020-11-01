<?php

class Book {

  use Hydrator;

  protected ?int $b_id;
  protected string $title;
  protected string $author;
  protected string $summary;
  protected string $releaseDate;
  protected string $category;
  protected bool $status;
  protected string $statusIcon;
  protected ?User $user = null;

  //Constructor
  public function __construct(array $array) {
    $this->setStatus(1);
    $this->hydrate($array);
  }

  //ID functions
  public function setB_id(int $id):Book {
    $this->b_id = $id;
    return $this;
  }

  public function getB_id():?int {
    return $this->b_id;
  }

  //Title functions
  public function setTitle(string $title):Book {
    $this->title = $title;
    return $this;
  }

  public function getTitle():string {
    return $this->title;
  }

  //Auteur functions
  public function setAuthor(string $author):Book {
    $this->author = $author;
    return $this;
  }

  public function getAuthor():string {
    return $this->author;
  }

  //Resume functions
  public function setSummary(string $summary):Book {
    $this->summary = $summary;
    return $this;
  }

  public function getSummary():string {
    return $this->summary;
  }

  //Parution functions
  public function setReleaseDate(string $releaseDate):Book {
    $this->releaseDate = $releaseDate;
    return $this;
  }

  public function getReleaseDate():string {
    return $this->releaseDate;
  }

  //Categorie functions
  public function setCategory(string $category):Book {
    $this->category = $category;
    return $this;
  }

  public function getCategory():string {
    return $this->category;
  }

  //Dispo functions
  public function setStatus(bool $status):Book {
    $this->status = $status;
    //Call the statut function to store it in the same time
    $this->setStatusIcon($status);
    return $this;
  }

  public function getStatus():bool {
    return $this->status;
  }

  //Statut functions
  //Based on dispo attribut store a string in $statusIcon attribut
  public function setStatusIcon(bool $status) {
    if($status) {
      $this->statusIcon = "<i class='far fa-check-circle' style='color:green'></i>";
    }
    else {
      $this->statusIcon = "<i class='far fa-times-circle' style='color:red'></i>";
    }
  }

  public function getStatusIcon():string {
    return $this->statusIcon;
  }

  //Utilisateur functions
  public function setUser(User $user):Book {
    //avoid empty user to be add
    if($user->getfirstName()) {
      $this->user = $user;
      $this->setStatus(0);
    }
    return $this;
  }

  public function unsetUser():Book {
    $this->user = null;
    $this->setStatus(1);
    return $this;
  }

  public function getUser():?User {
    return $this->user;
  }
}

 ?>
