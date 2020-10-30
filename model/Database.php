<?php

/**
 * Class to connect to the data base
 */
class Database
{
//Constants with the main info to connect with PDO. Change those with you information
const HOST  = "localhost";
const NAME = "librairie";
const LOGIN = "root";
const PASSWORD = "ThomAdmin12";

//Static function that is called when a manager is instanciated and return a PDO connection
static public function BD() {
  $db = new PDO("mysql:host=" . self::HOST .";dbname=" . self::NAME , self::LOGIN, self::PASSWORD);
  return $db;
}

}


 ?>
