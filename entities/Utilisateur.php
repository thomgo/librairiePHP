<?php

class Utilisateur {
  use Hydrator;

  protected $u_id;
  protected $firstName;
  protected $lastName;
  protected $age;
  protected $city;
  protected $phone;
  protected $mail;
  protected $personnalCode;

  //Constructor
  public function __construct($array) {
    $this->hydrate($array);
  }

  //ID functions
  public function setU_id($id) {
    $this->l_id = $id;
  }

  public function getU_id() {
    return $this->l_id;
  }

  //FirstName functions
  public function setFirstName($firstName) {
    $this->firstName = $firstName;
  }

  public function getFirstName() {
    return $this->firstName;
  }

  //LastName functions
  public function setLastName($lastName) {
    $this->lastName = $lastName;
  }

  public function getLastName() {
    return $this->lastName;
  }

  //Age functions
  public function setAge($age) {
    $this->age = $age;
  }

  public function getAge() {
    return $this->age;
  }

  //City functions
  public function setCity($city) {
    $this->city = $city;
  }

  public function getCity() {
    return $this->city;
  }

  //Phone functions
  public function setPhone($phone) {
    $this->phone = $phone;
  }

  public function getPhone() {
    return $this->phone;
  }

  //Mail functions
  public function setMail($mail) {
    $this->mail = $mail;
  }

  public function getMail() {
    return $this->mail;
  }

  //PersonnalCode functions
  public function setPersonnalCode($personnalCode) {
    $this->personnalCode = $personnalCode;
  }

  public function getPersonnalCode() {
    return $this->personnalCode;
  }

  //Function to randomly generate a nine digits code
  public function generatePersonnalCode() {
    $code  = "";
    for ($i=0; $i < 9; $i++) {
      $code .= mt_rand(0,9);
    }
    $this->setPersonnalCode($code);
  }
}
?>
