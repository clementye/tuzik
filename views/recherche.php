<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>page de recherche</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php include '../models/header.php'; ?>

<section class="recherche-form">
   <form action="" method="post">
      <input type="text" name="recherche_box" placeholder="cherchez ici..." maxlength="100" class="box" required>
      <button type="submit" class="fas fa-search" name="recherche_btn"></button>
   </form>
</section>

<section class="produits" style="padding-top: 0; min-height:100vh;">

   <div class="box-container">

   <?php
     if(isset($_POST['recherche_box']) OR isset($_POST['recherche_btn'])){
     $recherche_box = $_POST['recherche_box'];
     $select_produits = $db->prepare("SELECT * FROM `produits` WHERE name LIKE '%{$recherche_box}%'"); 
     $select_produits->execute();
     if($select_produits->rowCount() > 0){
      while($fetch_produits = $select_produits->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_produits['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_produits['name']; ?>">
      <input type="hidden" name="prix" value="<?= $fetch_produits['prix']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_produits['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="ajouter_au_liste_de_souhaits"></button>
      <a href="fiche_produit.php?pid=<?= $fetch_produits['id']; ?>" class="fas fa-eye"></a>
      <img src="../uploaded_img/<?= $fetch_produits['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_produits['name']; ?></div>
      <div class="flex">
         <div class="prix"><span>$</span><?= $fetch_produits['prix']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="ajouter au panier" class="btn" name="ajouter_au_panier">
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">aucun produit trouvé !</p>';
      }
   }
   ?>

   </div>

</section>

<script src="../js/script.js"></script>

</body>
</html>