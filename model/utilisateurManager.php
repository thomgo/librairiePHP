<?php

class utilisateurManager {
  private $_db;

  public function __construct() {
    //We store a PDO connexion when the manager in instanciated
    $this->setDb(dataBase::BD());
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

  //function to get one user based on it's ID
  public function getUserById($id) {
    $query = $this->getDb()->prepare('SELECT * FROM utilisateur WHERE u_id = ?');
    $query->execute([$id]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return new Utilisateur($data);
  }

//Get a single user based on personnalCode
  public function getUser($personnalCode) {
    $query = $this->getDb()->prepare("SELECT * FROM utilisateur WHERE personnalCode = ?");
    $query->execute([$personnalCode]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    //If a user ha been found creat an object an returns it
    if($data) {
      $user = new Utilisateur($data);
      return $user;
    }
    //Otherwise returns false
    else {
      return false;
    }
  }

  //Function to check if the personnal code is already in use
  public function checkCode(Utilisateur $user) {
    $query = $this->getDb()->prepare('SELECT * FROM utilisateur WHERE personnalCode = ?');
    $query->execute([$user->getPersonnalCode()]);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($result)) {
      return false;
    }
    return true;
  }

  //Function to add a user in data base
  public function addUser(Utilisateur $user) {
    $query = $this->getDb()->prepare("INSERT INTO utilisateur (firstName, lastName, age, city, phone, mail, personnalCode) VALUES (:firstName, :lastName, :age, :city, :phone, :mail, :personnalCode)");
    $query->execute([
      ":firstName" => $user->getFirstName(),
      ":lastName"=> $user->getLastName(),
      ":age"=> $user->getAge(),
      ":city"=> $user->getCity(),
      ":phone"=> $user->getPhone(),
      ":mail"=> $user->getMail(),
      ":personnalCode"=> $user->getPersonnalCode()
    ]);
  }
}

 ?>
