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

}

 ?>
