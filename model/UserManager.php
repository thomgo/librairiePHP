<?php

class UserManager {
  private $_db;

  public function __construct() {
    //We store a PDO connexion when the manager in instanciated
    $this->setDb(Database::BD());
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
      $data[$key] = new User($value);
    }
    return $data;
  }

  //function to get one user based on it's ID with the books he borrowed
  public function getUserById($id) {
    $query = $this->getDb()->prepare('SELECT
      l.titre, l.auteur, l.parution, l.categorie,
      u.u_id, u.firstName, u.lastName, u.age, u.city, u.phone, u.mail, u.personnalCode
      FROM utilisateur AS u LEFT JOIN livre AS l ON l.utilisateur = u.personnalCode
      WHERE u.u_id = ?');
    $query->execute([$id]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    //Create the user with the first row and then instanciate each book
    $user = new User($data[0]);
    foreach ($data as $key => $book) {
      $book = new Book($book);
      $book->setUser($user);
      $user->addBook($book);
    }
    return $user;
  }


  //Get user sorted according to a form
  public function getUserSorted($research) {
    $query = $this->getDb()->prepare('SELECT * FROM utilisateur WHERE firstName = :research OR lastName = :research OR personnalCode = :research');
    $query->execute([":research" => $research]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $value) {
      $data[$key] = new User($value);
    }
    return $data;
  }

//Get a single user based on personnalCode
  public function getUser($personnalCode) {
    $query = $this->getDb()->prepare("SELECT * FROM utilisateur WHERE personnalCode = ?");
    $query->execute([$personnalCode]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    //If a user ha been found creat an object an returns it
    if($data) {
      $user = new User($data);
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
