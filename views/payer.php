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

  <h3 class="heading">Panier</h3>

  <?php
      if (isset($confirmation)) {
        echo $confirmation;
        echo "<br>";
      }
  ?>

  <form class="" action="../controllers/validation.php" method="post">
    <?php
        foreach ($panier as $PAN){
          echo '<input type="hidden" name="articleid" value="'.$PAN->id.'">
                <input type="hidden" name="quantité" value="'.$PAN->Quantité.'">
                <img src="../uploaded_img/" alt="">
                <div class="titre">'.$PAN->Titre.'</div>
                <div class="quantité">'.$PAN->Quantité.'
                <div class="prixTot">'.$PAN->prixTotal.'</div>
                <div class="texte"><label for="nom">Adresse de livraison :</label>
          			<input type="adresse" id="adresse" name="adresse" /></div>
                </div>';
        };
     ?>
     <input type="hidden" name="grandtotal" value="<?php $total->prixTotal ?>">
     <div class="grandtotal"><?php echo $total->prixTotal ?></div>
     <input type="submit" value="payer" name="payer">
  </form>
