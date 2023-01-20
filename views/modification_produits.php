<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>modification produits</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../models/header.php'; ?>

<section class="modification-produits">

   <h1 class="heading">modification produits</h1>

   <?php
      $modification_id = $_GET['modification'];
      $select_produits = $db->prepare("SELECT * FROM `produits` WHERE id = ?");
      $select_produits->execute([$modification_id]);
      if($select_produits->rowCount() > 0){
         while($fetch_produits = $select_produits->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="pid" value="<?= $fetch_produits['id']; ?>">
      <input type="hidden" name="old_image_01" value="<?= $fetch_produits['image_01']; ?>">
      <input type="hidden" name="old_image_02" value="<?= $fetch_produits['image_02']; ?>">
      <input type="hidden" name="old_image_03" value="<?= $fetch_produits['image_03']; ?>">
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
      <span>modification nom</span>
      <input type="text" name="name" required class="box" maxlength="100" placeholder="entrer le nom du produit" value="<?= $fetch_produits['name']; ?>">
      <span>modification prix</span>
      <input type="number" name="prix" required class="box" min="0" max="9999999999" placeholder="entrer le prix du produit" onkeypress="if(this.value.length == 10) return false;" value="<?= $fetch_produits['prix']; ?>">
      <span>modification details</span>
      <textarea name="details" class="box" required cols="30" rows="10"><?= $fetch_produits['details']; ?></textarea>
      <span>modification image 01</span>
      <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <span>modification image 02</span>
      <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <span>modification image 03</span>
      <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <div class="flex-btn">
         <input type="submit" name="modification" class="btn" value="modification">
         <a href="produits.php" class="option-btn">Retour en arriere</a>
      </div>
   </form>
   
   <?php
         }
      }else{
         echo '<p class="empty">aucun produit trouvé !</p>';
      }
   ?>

</section>

<script src="../js/script.js"></script>
   
</body>
</html>