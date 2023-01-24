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
     $select_produits = $db->prepare("SELECT * FROM `article` WHERE `Titre` LIKE '%{$recherche_box}%'"); 
     $select_produits->execute();
     if($select_produits->rowCount() > 0){
      while($fetch_produits = $select_produits->fetch(PDO::FETCH_ASSOC)){
   ?>
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

      }
   }
}
   ?>

   </div>

</section>

<script src="../js/script.js"></script>

</body>
</html>