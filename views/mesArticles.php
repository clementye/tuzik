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
         <th>Catégorie</th>
         <th>Shipping</th>
      </tr>

      <a href="../views/ajouterArticle.php" class="btn">Ajouter un article</a>

   <?php
   if ($mesArticles!==false){
    foreach ($mesArticles as $art) {
      echo '<tr><form action="../controllers/supprimerArticle.php" method="post" class="box">
        <th><img src="../uploaded_img/" alt="">
        <th><input type="hidden" name="articleid" value="'.$art->Titre.'"><div class="prixUnit">'.$art->Titre.'</div>
        <th><input type="hidden" name="articleid" value="'.$art->Quantité.'"><div class="prixTot">'.$art->Quantité.'</div>
        <th><input type="hidden" name="articleid" value="'.$art->Prix.'"><div class="prixTot">$/'.$art->Prix.'</div>
        <th><input type="hidden" name="articleid" value="'.$art->Catégorie.'"><div class="prixTot">$/'.$art->Catégorie.'</div>
        <th><input type="hidden" name="articleid" value="'.$art->Shipping.'"><div class="prixTot">'.$art->Shipping.'</div>
        <th><input type="submit" value="supprimer" class="delete-btn" name="delete">
      </form>';
  };};
   ?>
    </table>
   </parent>


</section>

<script src="../js/script.js"></script>

</body>
</html>
