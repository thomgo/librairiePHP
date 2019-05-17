<?php
// A trait that can be used by every entities for hydratation
trait Hydrator {
  //the function may or may not expect an array of data
  public function hydrate($data = false) {
    //If data was given as an array
    if($data && is_array($data)) {
      foreach ($data as $key => $value) {
        $method = "set" . ucfirst($key);
        if(method_exists($this, $method)) {
          $this->$method($value);
        }
      }
    }
  }
}

 ?>
