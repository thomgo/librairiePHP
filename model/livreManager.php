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

}

 ?>
