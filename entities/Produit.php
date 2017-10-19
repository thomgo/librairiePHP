<?php

class Produit {
  protected $name;

  //Setters
  public function setName($name) {
    $this->name = $name;
  }

  //Getters
  public function getName() {
    return $this->name;
  }

  public function __construct($name) {
    $this->setName($name);
  }
}

 ?>
