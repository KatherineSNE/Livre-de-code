<?php
include './config/connexion.php';
include './models/productClass.php';
include './views/adminDel.php';

$admin = new Product();
$all=$admin->showAllProducts($bdd);

if(isset($_POST['image_product'])&&isset($_POST['price_product'])&&isset($_POST['description_product'])
&&isset($_POST['length_product'])&&isset($_POST['width_product'])
&&isset($_POST['materials_product'])&&isset($_POST['type_product'])&&isset($_POST['visibility_product'])){
      $none= new Product();
      $none->setId(htmlspecialchars(strip_tags($_POST['id_product'])));
      $none->setImage(htmlspecialchars(strip_tags($_POST['image_product'])));
      $none->setPrice(htmlspecialchars(strip_tags($_POST['price_product'])));
      $none->setDescription(htmlspecialchars(strip_tags($_POST['description_product'])));
      $none->setLength(htmlspecialchars(strip_tags($_POST['length_product'])));
      $none->setWidth(htmlspecialchars(strip_tags($_POST['width_product'])));
      $none->setMaterials(htmlspecialchars(strip_tags($_POST['materials_product'])));
      $none->setType(htmlspecialchars(strip_tags($_POST['type_product'])));
      $none->setVisibility(htmlspecialchars(strip_tags($_POST['visibility_product'])));
}
if(isset($_POST['choose'])){
    $none->deleteProduct($bdd);   
}
?> 



      






      

?> 