<?php

class Product{
    private $id_product;
    private $image_product;
    private $price_product;
    private $description_product;
    private $length_product;
    private $width_product;
    private $materials_product;
    private $type_product;
    private $visibility_product;


public function getId(){
    return $this->id_product;
}

public function setId($newId){
    $this->id_product = $newId;
}

public function getImage(){
    return $this->image_product;
}

public function setImage($newImage){
    $this->image_product = $newImage;
}

public function getPrice(){
    return $this->price_product;
}

public function setPrice($newPrice){
    $this->price_product = $newPrice;
}


public function getDescription(){
    return $this->description_product;
}
public function setDescription($newDescription){
    $this->description_product = $newDescription;
}

public function getLength(){
    return $this->length_product;
}

public function setLength($newLength){
    $this->length_product = $newLength;
}

public function getWidth(){
    return $this->width_product;
}

public function setWidth($newWidth){
    $this->width_product = $newWidth;
}
public function getMaterials(){
    return $this->materials_product;
}

public function setMaterials($newMaterial){
    $this->materials_product = $newMaterial;
}

public function getType(){
    return $this->type_product;
}

public function setType($newType){
    $this->type_product = $newType;
}

public function getVisibility(){
    return $this->visibility_product;
}

public function setVisibility($newVisibility){
    $this->visibility_product=$newVisibility;
}


public function createProduct($bdd){
    try{
        $req=$bdd->prepare('INSERT INTO product( image_product, price_product, description_product, length_product, width_product, materials_product, type_product, visibility_product)
                                         VALUES(:image_product,:price_product, :description_product, :length_product, :width_product, :materials_product, :type_product, :visibility_product)');
                          $req->execute(array(
                                              ':image_product'=>$this->image_product,
                                              ':price_product'=>$this->price_product,
                                              ':description_product'=>$this->description_product,
                                              ':length_product'=>$this->length_product,
                                              ':width_product'=>$this->width_product,
                                              ':materials_product' =>$this->materials_product,
                                              ':type_product'=>$this->type_product,
                                              ':visibility_product'=>$this->visibility_product,
                                              ));
                                    
    }
    catch(exception $e){
        die('error'.$e->getMessage());

    }
}

public function showAllProducts($bdd){
    try{
        $show = $bdd->prepare('SELECT * FROM product ORDER BY type_product ASC');
        $show->execute();
        $output = $show->fetchAll();
    }

    catch(Exception $e){
        die('error'.$e->getMessage());
    }
    return $output;
}

public function showItemsByType($bdd,$type){
    try{
        $bracelets = $bdd->prepare("SELECT * FROM product WHERE type_product LIKE $type AND visibility_product = 1");
        $bracelets->execute();
        $bijouxByType = $bracelets->fetchAll(PDO::FETCH_ASSOC);
        return $bijouxByType;
    }
    catch(exception $e){
        die('error'.$e->getMessage());
    }
    
}

public function updateProduct($bdd){
try{
$mod = $bdd->prepare('UPDATE product SET  
                                         image_product = :image_product,
                                         Price_product = :price_product,
                                         description_product = :description_product,
                                         length_product = :length_product,
                                         width_product = :width_product,
                                         materials_product = :materials_product,
                                         type_product = :type_product,
                                         visibility_product = :visibility_product
                                         WHERE id_product = :id_product');

                    $mod->execute(array(
                                        'id_product' => $this->id_product,                                     
                                        ':image_product' => $this->image_product,
                                        ':price_product' => $this->price_product,
                                        ':description_product' => $this->description_product,
                                        ':length_product'=>$this->length_product,
                                        ':width_product'=>$this->width_product,
                                        ':materials_product' => $this->materials_product,
                                        ':type_product' => $this->type_product,
                                        ':visibility_product' => $this->visibility_product
                            ));
                            
        }

    catch(exception $e){
    die('error'.$e->getMessage());
    }

}

public function deleteProduct($bdd){
    
    try{
        $del = $bdd->prepare('DELETE FROM product WHERE id_product = :id_product');
        $del->execute(array(
                            'id_product' => $this->id_product
                            ));
        if($del){
            return true;
        }
        }

    catch(exception $e){
        die('error'.$e->getMessage());
        }
    }
}







