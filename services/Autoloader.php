<?php
//Class for autoloading of classes in the app
class Autoloader {
  //Entities, services and managers list are stored in class constants
  const entities = ["Livre", "Utilisateur"];
  const services= ["Autoloader", "Hydrator"];
  const managers = ["livreManager", "utilisateurManager", "dataBase"];

  //Function to call autoload register with the static loader function
  static public function autoload() {
    spl_autoload_register(array(__CLASS__, 'loader'));
  }

  //The loader function requieres files according to the class that has been asked
  //For exempel if the class name is an entity the we load it from entities
  static public function loader($class){
    if(in_array($class, self::entities)) {
      require("../entities/" . $class . ".php");
    }
    elseif (in_array($class, self::managers)) {
      require("../model/" . $class . ".php");
    }
    else{
      if(in_array($class, self::services)) {
        require("../services/" . $class . ".php");
      }
    }
  }
}

 ?>
