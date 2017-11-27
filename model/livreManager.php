<?php

class livreManager {
  private $_db;

  public function __construct($pdo) {
    $this->setDb($pdo);
  }

  public function setDb($connection) {
    $this->_db = $connection;
  }

  public function getDb() {
    return $this->_db;
  }

  //Function to get all the books at once

  public function getBooks() {
    $query = $this->getDb()->query('SELECT * FROM livre');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $value) {
      $data[$key] = new Livre($value);
    }
    return $data;
  }

  //Function to get all the books at once sorted by categorie

  public function getBooksByCategorie($categorie) {
    $query = $this->getDb()->prepare("SELECT * FROM livre WHERE categorie = ?");
    $query->execute([$categorie]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $value) {
      $data[$key] = new Livre($value);
    }
    return $data;
  }

//Get a single book based on id
  public function getBook($id) {
    $query = $this->getDb()->prepare("SELECT * FROM livre WHERE l_id = ?");
    $query->execute([$id]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    $book = new Livre($data);
    return $book;
  }

  //Update a book
  public function updateBookStatut(Livre $book) {
    $query = $this->getDb()->prepare("UPDATE livre SET dispo = :dispo, utilisateur = :utilisateur WHERE l_id = :id");
    $query->execute([
      ":dispo"=> $book->getDispo(),
      ":utilisateur"=> $book->getUtilisateur(),
      ":id" => $book->getL_id()
    ]);
  }

}

 ?>
