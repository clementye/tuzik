<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>produits</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../models/header.php'; ?>

<section class="ajouter-produits">

   <h1 class="heading">ajouter un produit</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>nom du produit (obligatoire)</span>
            <input type="text" class="box" required maxlength="100" placeholder="nom du produit" name="name">
         </div>
         <div class="inputBox">
            <span>prix du produit (obligatoire)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="prix du produit" onkeypress="if(this.value.length == 10) return false;" name="prix">
         </div>
        <div class="inputBox">
            <span>image 01 (obligatoire)</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 02 (obligatoire)</span>
            <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 03 (obligatoire)</span>
            <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
         <div class="inputBox">
            <span>détails du produit (obligatoire)</span>
            <textarea name="details" placeholder="détails du produit" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>
      
      <input type="submit" value="ajouter produits" class="btn" name="ajouter_produits">
   </form>

</section>

<section class="show-produits">

   <h1 class="heading">produits ajoutés</h1>

   <div class="box-container">

   <?php
      $select_produits = $db->prepare("SELECT * FROM `produits`");
      $select_produits->execute();
      if($select_produits->rowCount() > 0){
         while($fetch_produits = $select_produits->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <img src="../uploaded_img/<?= $fetch_produits['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_produits['name']; ?></div>
      <div class="prix">$<span><?= $fetch_produits['prix']; ?></span>/-</div>
      <div class="details"><span><?= $fetch_produits['details']; ?></span></div>
      <div class="flex-btn">
         <a href="modification_produits.php?modification=<?= $fetch_produits['id']; ?>" class="option-btn">modification</a>
         <a href="produits.php?delete=<?= $fetch_produits['id']; ?>" class="delete-btn" onclick="return confirm('delete this produits?');">delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">aucun produit a encore été ajouté !</p>';
      }
   ?>
   
   </div>

</section>

<script src="../js/script.js"></script>
   
</body>
</html>