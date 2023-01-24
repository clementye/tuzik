<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Panier</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../models/header.php'; ?>

<section class="produits shopping-panier">

   <h3 class="heading">Panier</h3>

   <?php
        if (isset($confirmation)) {
          echo $confirmation;
          echo "<br>";
        }
    ?>

   <?php
      foreach ($panier as $PAN){
        require_once "../models/photo.php";
         $photo = $photo_article($PAN->id);
         echo '<div class="box-container">
         <form action="../controllers/supprimerArticlePanier.php" method="post" class="box">
          <div class="box">
            <input type="hidden" name="articleid" value="'.$PAN->id.'">
            <img src="../imageArticle/'.$photo->image.'" alt="">
            <div class="name">'.$PAN->Titre.'</div>
            <div class="flex">
            <div class="prixTot">$/'.$PAN->prixTotal.'</div>
            <input type="number" name="Quantité" class="Quantité" min="1" max="'.$PAN->Quantité.'" onkeypress="if(this.value.length == 2) return false;" value="">
            </div>
            <div class="sub-total"> Prix Unitaire : <span>$/'.$PAN->PrixUnitaire.'</span> </div>
            <input type="submit" value="supprimer" class="delete-btn" name="delete">
         </form>
         </div>
         </div>';

      };
   ?>

   </div>

   <div class="panier-total">
      <p>Total : <span>$/<?php echo $total->prixTotal; ?></span></p> <!--Faudra faire que le prix soit plus gros, on le voit pas assez.-->
      <a href="../controllers/boutique.php" class="option-btn">continuer les achats</a>
      <a href="../controllers/supprimerpanier.php" class="delete-btn " onclick="return confirm('supprimer tout du panier ?');">supprimer tous les articles</a>
      <a href="../controllers/payer.php" class="btn ">passer à la caisse</a>
   </div>

</section>

<script src="../js/script.js"></script>

</body>
</html>
