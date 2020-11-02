<?php

final class BookManager {
  private PDO $_db;

  public function __construct() {
    //We store a PDO connexion when the manager in instanciated
    $this->_db = Database::BD();
  }

  //Function to get all the books at once
  public function getBooks():array {
    $query = $this->_db->query('SELECT b_id, title, author, summary, releaseDate, status, category FROM book');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $value) {
      $data[$key] = new Book($value);
    }
    return $data;
  }

  //Function to get all the books at once sorted by categorie
  public function getBooksByCategorie(string $category):array {
    $query = $this->_db->prepare("SELECT b_id, title, author, summary, releaseDate, status, category FROM book WHERE category = ?");
    $query->execute([$category]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $value) {
      $data[$key] = new Book($value);
    }
    return $data;
  }

  //Get a single book with user based on id
    public function getBookAndUser(int $id):Book {
      $query = $this->_db->prepare("SELECT
        b.b_id, b.title, b.author, b.summary, b.releaseDate, b.status, b.category,
        u.firstName, u.lastName, u.age, u.city, u.phone, u.mail, u.personnalCode
        FROM book AS b
        LEFT JOIN user AS u
        ON b.user = u.personnalCode
        WHERE b.b_id = ?");
      $query->execute([$id]);
      $data = $query->fetch(PDO::FETCH_ASSOC);
      // Make new book object with data array
      $book = new Book($data);
      if(isset($data["firstName"])) {
        // Make new user object with data array
        $user = new User($data);
        $book->setUser($user);
      }
      return $book;
    }

  //Add book in BDD
  public function addBook(Book $book):bool {
    try {
      $this->_db->beginTransaction();
      $query = $this->_db->prepare("INSERT INTO book (title, author, summary, releaseDate, status, category) VALUES (:title, :author, :summary, :releaseDate, :status, :category)");
      $result = $query->execute([
        ":title" => $book->getTitle(),
        ":author"=> $book->getAuthor(),
        ":summary"=> $book->getSummary(),
        ":releaseDate"=> $book->getReleaseDate(),
        ":status"=> $book->getStatus(),
        ":category"=> $book->getCategory()
      ]);
      $this->_db->commit();
      return $result;
    }
    catch (Exception $e) {
      $this->_db->rollBack();
      return false;
    }
  }

  //Update a book
  public function updateBookStatus(Book $book, ?string $user_info):bool {
    try {
      $this->_db->beginTransaction();
      $query = $this->_db->prepare("UPDATE book SET status = :status, user = :user WHERE b_id = :b_id");
      $result = $query->execute([
        ":status"=> intval($book->getStatus()),
        ":user"=> $user_info,
        ":b_id" => $book->getB_id()
      ]);
      $this->_db->commit();
      return $result;
    }
    catch (Exception $e) {
      $this->_db->rollBack();
      return false;
    }
  }

  public function deleteBook(int $id):bool {
    try {
      $this->_db->beginTransaction();
      $query = $this->_db->prepare("DELETE FROM book WHERE b_id = :b_id");
      $result = $query->execute([
        "b_id" => $id
      ]);
      $this->_db->commit();
      return $result;
    }
    catch (Exception $e) {
      $this->_db->rollBack();
      return false;
    }
  }

}

 ?>
