<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>fiche-produit</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php include '../models/header.php'; ?>

<section class="fiche-produit">

   <h1 class="heading">fiche produit</h1>

   <?php
     $pid = $_GET['pid'];
     $select_produits = $db->prepare("SELECT * FROM `produits` WHERE id = ?"); 
     $select_produits->execute([$pid]);
     if($select_produits->rowCount() > 0){
      while($fetch_produits = $select_produits->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_produits['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_produits['name']; ?>">
      <input type="hidden" name="prix" value="<?= $fetch_produits['prix']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_produits['image_01']; ?>">
      <div class="row">
         <div class="image-container">
            <div class="main-image">
               <img src="../uploaded_img/<?= $fetch_produits['image_01']; ?>" alt="">
            </div>
            <div class="sub-image">
               <img src="../uploaded_img/<?= $fetch_produits['image_01']; ?>" alt="">
               <img src="../uploaded_img/<?= $fetch_produits['image_02']; ?>" alt="">
               <img src="../uploaded_img/<?= $fetch_produits['image_03']; ?>" alt="">
            </div>
         </div>
         <div class="content">
            <div class="name"><?= $fetch_produits['name']; ?></div>
            <div class="flex">
               <div class="prix"><span>$</span><?= $fetch_produits['prix']; ?><span>/-</span></div>
               <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <div class="details"><?= $fetch_produits['details']; ?></div>
            <div class="flex-btn">
               <input type="submit" value="ajouter au panier" class="btn" name="ajouter_au_panier">
               <input class="option-btn" type="submit" name="ajouter_au_liste_de_souhaits" value="ajouter au liste_de_souhaits">
            </div>
         </div>
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">aucun produit a encore été ajouté !</p>';
   }
   ?>

</section>

<script src="../js/script.js"></script>

</body>
</html>