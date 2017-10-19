<?php
declare(strict_types=1);

class Client {
  protected $name;
  protected $age;
  protected $products;

  //Setters
  public function setName($name) {
    $this->name = $name;
  }

  public function setAge(int $age) {
    $this->age = $age;
  }

  public function setProducts() {
    $this->products = [];
  }

  //Getters
  public function getName() {
    return $this->name;
  }

  public function getAge() {
    return $this->age;
  }

  public function getProducts() {
    return $this->products;
  }

  //Mehtods

  // Function to add an object of class Produit to products attribute of Client
  public function addProductToBasket($product) {
    array_push($this->products, $product);
  }

  public function __construct($name, $age) {
    $this->setName($name);
    $this->setAge($age);
    $this->setProducts();
  }


}

 ?>
