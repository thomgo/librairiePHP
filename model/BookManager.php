<?php

class BookManager {
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

  //Function to get all the books at once
  public function getBooks() {
    $query = $this->getDb()->query('SELECT l_id, titre, auteur, resume, parution, dispo, categorie FROM livre');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $value) {
      $data[$key] = new Book($value);
    }
    return $data;
  }

  //Function to get all the books at once sorted by categorie
  public function getBooksByCategorie($categorie) {
    $query = $this->getDb()->prepare("SELECT l_id, titre, auteur, resume, parution, dispo, categorie FROM livre WHERE categorie = ?");
    $query->execute([$categorie]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $value) {
      $data[$key] = new Book($value);
    }
    return $data;
  }

  //Get a single book with user based on id
    public function getBookAndUser($id) {
      $query = $this->getDb()->prepare("SELECT
        l.l_id, l.titre, l.auteur, l.resume, l.parution, l.dispo, l.categorie,
        u.firstName, u.lastName, u.age, u.city, u.phone, u.mail, u.personnalCode
        FROM livre AS l
        LEFT JOIN utilisateur AS u
        ON l.utilisateur = u.personnalCode
        WHERE l.l_id = ?");
      $query->execute([$id]);
      $data = $query->fetch(PDO::FETCH_ASSOC);
      //Crée un noulivre avec les données
      $book = new Book($data);
      $user = new User($data);
      //Hydrate un nouvel utilisateur sur la base du tableau
      $book->setUser($user);
      return $book;
    }

  //Add book in BDD
  public function addBook(Book $book) {
    $query = $this->getDb()->prepare("INSERT INTO livre (titre, auteur, resume, parution, dispo, categorie) VALUES (:titre, :auteur, :resume, :parution, :dispo, :categorie)");
    $query->execute([
      ":titre" => $book->getTitre(),
      ":auteur"=> $book->getAuteur(),
      ":resume"=> $book->getResume(),
      ":parution"=> $book->getParution(),
      ":dispo"=> $book->getDispo(),
      ":categorie"=> $book->getCategorie()
    ]);
  }

  //Update a book
  public function borrowBook(Book $book) {
    $query = $this->getDb()->prepare("UPDATE livre SET dispo = :dispo, utilisateur = :utilisateur WHERE l_id = :id");
    $query->execute([
      ":dispo"=> $book->getDispo(),
      ":utilisateur"=> $book->getUser()->getPersonnalCode(),
      ":id" => $book->getL_id()
    ]);
  }

  public function turnBookBack(Book $book) {
    $query = $this->getDb()->prepare("UPDATE livre SET dispo = :dispo, utilisateur = :utilisateur WHERE l_id = :id");
    $query->execute([
      ":dispo"=> $book->getDispo(),
      ":utilisateur"=> $book->getUser(),
      ":id" => $book->getL_id()
    ]);
  }

}

 ?>
