<?php

/**
 * Class to connect to the data base
 */
class dataBase
{

const host  = "localhost";
const dbName = "librairie";
const login = "root";
const mdp = "ThomAdmin12";

static public function BD() {
  $db = new PDO("mysql:host=" . self::host .";dbname=" . self::dbName , self::login, self::mdp);
  return $db;
}

}


 ?>
