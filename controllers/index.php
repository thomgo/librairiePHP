<?php
require ("../entities/Client.php");
require ("../entities/Produit.php");

//Instance of new Client
$my_client = new Client("Toto", 56);
$my_product  = new Produit("Voiture");

$my_client->addProductToBasket($my_product);


include "../views/indexVue.php";
 ?>
