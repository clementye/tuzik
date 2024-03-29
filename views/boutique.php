<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>boutique</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php include '../models/header.php'; ?>

<section class="produits">

   <h1 class="heading">Nouveauté</h1>

   </form>
   <?php
    require_once "../models/articles.php";
    $catégorie = $afficher_catégorie();
    echo '<form action="../controllers/boutique.php" method="post">';
    foreach($catégorie as $cat) {
      echo '<input type="radio" id="categorie" name="categorie" value="'.$cat->id.'">
      <label for="categorie">'.$cat->Titre.'</label>';
    }
    echo '  <button type="submit" name="search" value="search">Rechercher</button></form></br>';
  ?>
   <?php
   foreach ($articles as $AR) {
     require_once "../models/photo.php";
     $photo = $photo_article($AR->id);

   echo '<div class="box-container">
   <form action="../controllers/ajoutpanier.php" method="post" class="box">
   <div class="box">
   <input type="hidden" id="titre" name="titre" value="'.$AR->id.'"/>'.$AR->Titre.'
   <br><select class="quantite" name="quantite">
   </select>
    <button class="fas fa-heart" type="submit" name="ajouter_au_liste_de_souhaits"></button>
    <img src="../imageArticle/'.$photo->image.'" alt=""
    <div class="name"></div>
    <div class="flex">
       <div class="prix"><span>€</span><span>/'.$AR->prix.'</span></div>
       <input type="number" name="quantite" class="quantite" min="1" max="'.$AR->quantite.'" onkeypress="if(this.value.length == 2) return false;" value="1">
    </div>
   <input type="submit" value="ajouter au panier" class="btn" name="ajouter_au_panier">
   </form>
   </div>
   </div>';
      }
   ?>

</section>

<script src="../js/script.js"></script>

</body>
</html>
