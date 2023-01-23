<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>categorie</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   
<?php include '../models/header.php'; ?>

<section class="produits">

   <h1 class="heading">categorie</h1>

   <div class="box-container">

   <?php
     $categorie = $_GET['categorie'];
     $select_produits = $db->prepare("SELECT * FROM `produits` WHERE name LIKE '%{$categorie}%'"); 
     $select_produits->execute();
     if($select_produits->rowCount() > 0){
      while($fetch_product = $select_produits->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="prix" value="<?= $fetch_product['prix']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="ajouter_au_liste_de_souhaits"></button>
      <a href="fiche_produit.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="../uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="prix"><span>$</span><?= $fetch_product['prix']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="ajouter au panier" class="btn" name="ajouter_au_panier">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">aucun produit trouvé !</p>';
   }
   ?>

   </div>

</section>

<script src="../js/script.js"></script>

</body>
</html>