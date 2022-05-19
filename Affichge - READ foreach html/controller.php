<?php
session_start();
include './config/connexion.php';
include './models/productClass.php';
include './models/basketClass.php';



$type='"1b"';
$bracelet = new Product();
$allbra=$bracelet->showItemsByType($bdd,$type);

    $content = $bracelet->showItemsByType($bdd,$type);

    if($content!=NULL){
        $brs = $content;
        require './views/boutiqueRTWB.php';
    }
  

if(isset($_POST['id_user_basket'])&&isset($_POST['image_basket'])&&isset($_POST['prodid_basket'])&&isset($_POST['price_basket'])&&isset($_POST['basket'])){
    
    
    $bas = new Basket();
    $bas->setIduser(htmlspecialchars(strip_tags($_POST['id_user_basket'])));
    $bas->setImage(htmlspecialchars(strip_tags($_POST['image_basket'])));
    $bas->setProdid(htmlspecialchars(strip_tags($_POST['prodid_basket'])));
    $bas->setPrice(htmlspecialchars(strip_tags($_POST['price_basket'])));
    $bas->createBasket($bdd);  
    }
    
?>