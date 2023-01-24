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
       <div class="content">
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
   <?php
      require_once "../models/articles.php";
      $catégorie = $afficher_catégorie();
      foreach($catégorie as $cat) {
        echo '<a href="../controllers/boutique.php?categorie='.$cat->id.'" class="swiper-slide slide">
           <img src="../images/'.$cat->Titre.'.png" alt="">
           <h3>'.$cat->Titre.'</h3>
        </a>';
      }
   ?>
   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="accueil-produits">

   <h1 class="heading">Nouveauté</h1>

   <div class="swiper produits-slider">

   <div class="swiper-wrapper">

   <?php
   require_once "../models/articles.php";
   $articles = $afficher_articles_last();

     foreach ($articles as $AR) {
       require_once "../models/photo.php";
       $photo = $photo_article($AR->id);
     echo '<div class="box-container">
     <div class="box">
     <form action="../controllers/ajoutpanier.php" method="post" class="box">
     <input type="hidden" id="titre" name="titre" value="'.$AR->id.'"/>'.$AR->Titre.'
     <br><select class="quantite" name="quantite">
     </select>
      <button class="fas fa-heart" type="submit" name="ajouter_au_liste_de_souhaits"></button>
      <img src="../uploaded_img/'.$photo->image.'" alt="">
      <div class="name"></div>
      <div class="flex">
         <div class="prix"><span>€</span><span>/'.$AR->prix.'</span></div>
         <input type="number" name="quantite" class="quantite" min="1" max="'.$AR->quantite.'" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
     <input type="submit" value="ajouter au panier" class="btn" name="ajouter_au_panier">
     </form>
     </div>
     </div>';
   };
    ?>
   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="../js/script.js"></script>

<script>

 var swiper = new Swiper(".categorie-slider", {
   loop:false,
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
