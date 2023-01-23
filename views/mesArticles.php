<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mes Articles</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php include '../models/header.php'; ?>

<section class="">
<parent>

   <table  border="1" cellpading="7" width=50% style="position:absolute; font-size:large">

      <tr>
         <th>Nom de l'article</th>
         <th>Quantité</th>
         <th>Prix</th>
         <th>Tarif</th>
      </tr>

   <?php
    foreach ($articles as $art) {
      echo '<tr><form action="../controllers/supprimerArticle.php" method="post" class="box">
        <th><img src="../uploaded_img/" alt="">
        <th><input type="hidden" name="articleid" value="'.$titre->Titre.'"><div class="prixUnit">'.$titre->Titre.'</div>
        <th><input type="hidden" name="articleid" value="'.$titre->Quantité.'"><div class="prixTot">'.$titre->Titre.'</div>
        <th><input type="hidden" name="articleid" value="'.$titre->Prix.'"><div class="prixTot">$/'.$titre->Prix.'</div>
        <th><input type="hidden" name="articleid" value="'.$titre->Shipping.'"><div class="prixTot">'.$titre->Shipping.'</div>
        <th><input type="submit" value="supprimer" class="delete-btn" name="delete">
      </form>';

  };
   ?>
    </table>
   </parent>


</section>

<script src="../js/script.js"></script>

</body>
</html>
