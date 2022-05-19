<?php
include './headers/boutiqueHeader.php';
include './views/menu.php';
?>
    <span>
        <a href="controllerRTWN.php">Colliers</a>
        <a href="controllerRTWB.php">Bracelets</a>
        <a href="controllerRTWE.php">Boucles d'oreilles</a>
        <a href="controllerRTWD.php">Autres</a>
        <a href="controllerTest.php">Ventes</a>
</span>
<h2>Notre sélection bracelets</h2>
<section class="normal" class="bra">
  <?php
  foreach($brs as $br){
    ?>
    <article>
        <img src="./images/<?=$br['image_product']?>" alt="">
        <p><?=$br['description_product']?></p>
        <p>Longueur: <?=$br['length_product']?></p>
        <p>Largeur: <?=$br['width_product']?></p>
        <p>Mètal: <?=$br['materials_product']?></p>

        <form action="" method="post">
        <?php
if(isset($_SESSION['connected'])){
?>
            <input type="hidden" name="id_user_basket" value="<?=$_SESSION['id']?>">
            <input type="hidden" name="image_basket" value="<?=$br['image_product']?>">
<?php
}
?>   
            <div>
                <label for="prodid_basket">Ref du produit:BR</label>
                <input type="tel" name="prodid_basket" value="<?=$br['id_product']?>" readonly>
            </div>
            <div>
                <input type="tel" name="price_basket" value="<?=$br['price_product']?>" readonly>
                <input type="text" name="euro" value="€" readonly>
            </div>
            <input id ="basketbut" type="submit" name="basket" value="Ajouter au panier">
        </form>
            <a id="signin" href="./controllerLogin.php">Veuillez vous connecter pour passer une commande</a>
    </article>
    <?php
}
?>
</section>


<?php
if(isset($_SESSION['connected'])){
?>
<style>
#signin{
    visibility:hidden;
}
#basketbut{
    visibility:visible;
}
</style>
<?php
}else{
?>
<style>
    #basketbut{
        visibility:hidden;
    }
    #signin{
        visibility:visible;
        font:var(--desPfont); 
        color:var(--green);
        text-align:center;   
        margin-top:-5vh;
    }
    #signin:hover{
        color:var(--textcolor);
    }

</style>    
<?php
}


include './headers/footer.php';
?>
  