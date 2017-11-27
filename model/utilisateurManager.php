<?php

class utilisateurManager {
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

  //Function to get all the users at once

  public function getUsers() {
    $query = $this->getDb()->query('SELECT * FROM utilisateur');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $value) {
      $data[$key] = new Utilisateur($value);
    }
    return $data;
  }

//Get a single user based on personnalCode
  public function getUser($personnalCode) {
    $query = $this->getDb()->prepare("SELECT * FROM utilisateur WHERE personnalCode = ?");
    $query->execute([$personnalCode]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    $user = new Utilisateur($data);
    return $user;
  }

}

 ?>
