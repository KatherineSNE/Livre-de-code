<?php

header ("Access-Control-Allow-Origin: *");
include './config/connexion.php';
include './models/productClass.php';


    
$everything = new Product();
$all=$everything->showAllProducts($bdd);
echo json_encode($all);


