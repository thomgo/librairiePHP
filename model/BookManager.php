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
    $query = $this->getDb()->query('SELECT b_id, title, author, summary, releaseDate, status, category FROM livre');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $value) {
      $data[$key] = new Book($value);
    }
    return $data;
  }

  //Function to get all the books at once sorted by categorie
  public function getBooksByCategorie($categorie) {
    $query = $this->getDb()->prepare("SELECT b_id, title, author, summary, releaseDate, status, category FROM livre WHERE categorie = ?");
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
        l.b_id, l.title, l.author, l.summary, l.releaseDate, l.status, l.category,
        u.firstName, u.lastName, u.age, u.city, u.phone, u.mail, u.personnalCode
        FROM livre AS l
        LEFT JOIN utilisateur AS u
        ON l.user = u.personnalCode
        WHERE l.b_id = ?");
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
    $query = $this->getDb()->prepare("INSERT INTO livre (title, author, summary, releaseDate, status, category) VALUES (:title, :author, :summary, :releaseDate, :status, :category)");
    $query->execute([
      ":title" => $book->getTitle(),
      ":author"=> $book->getAuthor(),
      ":summary"=> $book->getSummary(),
      ":releaseDate"=> $book->getReleaseDate(),
      ":status"=> $book->getStatus(),
      ":category"=> $book->getCategory()
    ]);
  }

  //Update a book
  public function borrowBook(Book $book) {
    $query = $this->getDb()->prepare("UPDATE livre SET status = :status, user = :user WHERE b_id = :b_id");
    $query->execute([
      ":status"=> $book->getStatus(),
      ":user"=> $book->getUser()->getPersonnalCode(),
      ":b_id" => $book->getB_id()
    ]);
  }

  public function turnBookBack(Book $book) {
    $query = $this->getDb()->prepare("UPDATE livre SET status = :status, user = :user WHERE b_id = :b_id");
    $query->execute([
      ":status"=> $book->getStatus(),
      ":user"=> $book->getUser(),
      ":b_id" => $book->getB_id()
    ]);
  }

}

 ?>
