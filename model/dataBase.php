<?php

/**
 * Class to connect to the data base
 */
class dataBase
{
//Constants with the main info to connect with PDO. Change those with you information
const host  = "localhost";
const dbName = "librairie";
const login = "root";
const mdp = "ThomAdmin12";

//Static function that is called when a manager is instanciated and return a PDO connection
static public function BD() {
  $db = new PDO("mysql:host=" . self::host .";dbname=" . self::dbName , self::login, self::mdp);
  return $db;
}

}


 ?>
