<?php

trait Hydrator {
  public function hydrate($data) {
    foreach ($data as $key => $value) {
      $method = "set" . ucfirst($key);
      if(method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
}

 ?>
