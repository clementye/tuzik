<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>accueil</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php include '../models/header.php'; ?>

<div class="accueil-bg">

<section class="accueil">

   <div class="swiper accueil-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="../images/accueil-img-1.png" alt="">
         </div>
         <div class="content">
            <span>Sur les derniers guitares</span>
            <h3>jusqu'à 50% de réduction</h3>
            <a href="../controllers/boutique.php" class="btn">Acheter maintenant</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="../images/accueil-img-2.png" alt="">
         </div>
         <div class="content">
            <span>Sur les derniers violons</span>
            <h3>jusqu'à 40% de réduction</h3>
            <a href="../controllers/boutique.php" class="btn">Acheter maintenant</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="../images/accueil-img-3.png" alt="">
         </div>
         <div class="content">
            <span>Sur les derniers flutes</span>
            <h3>jusqu'à 30% de réduction</h3>
            <a href="../controllers/boutique.php" class="btn">Acheter maintenant</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="categorie">

   <h1 class="heading">acheter par catégorie</h1>

   <div class="swiper categorie-slider">

   <div class="swiper-wrapper">

   <a href="categorie.php?categorie=guitare" class="swiper-slide slide">
      <img src="../images/icon-1.png" alt="">
      <h3>guitare</h3>
   </a>

   <a href="categorie.php?categorie=violon" class="swiper-slide slide">
      <img src="../images/icon-2.png" alt="">
      <h3>violon</h3>
   </a>

   <a href="categorie.php?categorie=flute" class="swiper-slide slide">
      <img src="../images/icon-3.png" alt="">
      <h3>flute</h3>
   </a>

   <a href="categorie.php?categorie=piano" class="swiper-slide slide">
      <img src="../images/icon-4.png" alt="">
      <h3>piano</h3>
   </a>

   <a href="categorie.php?categorie=bass" class="swiper-slide slide">
      <img src="../images/icon-5.png" alt="">
      <h3>bass</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="accueil-produits">

   <h1 class="heading">Nouveauté</h1>

   <div class="swiper produits-slider">

   <div class="swiper-wrapper">

   <!--?php
     $select_produits = $db->prepare("SELECT * FROM `produits` LIMIT 3"); 
     $select_produits->execute();
     if($select_produits->rowCount() > 0){
      while($fetch_produits = $select_produits->fetch(PDO::FETCH_ASSOC)){
   ?--> // $produit
   <form action="" method="post" class="swiper-slide slide">
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
      echo '<p class="empty">aucun produit a encore été ajouté !</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="../js/script.js"></script>

<script>

var swiper = new Swiper(".accueil-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".categorie-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".produits-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>