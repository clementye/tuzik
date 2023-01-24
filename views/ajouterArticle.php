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

   <?php
      if (isset($confirmation)){
        echo $confirmation;
      }
    ?>

   <form action="../controllers/ajouterArticle.php" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>Nom du produit</span>
            <input type="text" class="box" required maxlength="100" id="Titre" name="Titre" required>
         </div>
         <div class="inputBox">
            <span>Quantité</span>
            <input type="text" class="box" required maxlength="100" id="Quantité" name="Quantité" required>
         </div>
         <div class="inputBox">
            <span>Prix du produit (unitaire)</span>
            <input type="text" class="box" required maxlength="100" id="Prix" name="Prix" required>
         </div>
        <div class="inputBox">
            <span>Image (Une seule possible)</span>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
      </div>
      <span>Sélectionner la catégorie :</span> <select name="Catégorie" id="Catégorie">
        <?php
          require_once "../models/articles.php";
          $catégorie = $afficher_catégorie();
          foreach ($catégorie as $CAT){
            echo '<option value="'.$CAT->id.'">'.$CAT->Titre.'</option>';
          };
         ?>
      </select>
      <input type="submit" value="ajouter_produits" class="btn" name="ajouter_produits">
   </form>
</section>

<script src="../js/script.js"></script>

</body>
</html>
