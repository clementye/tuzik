<?php

include 'models/connexion.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shop</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>
   
<?php include 'header.php'; ?>

<section class="articles">

   <h1 class="heading">Nouveauté</h1>

   <div class="box-container">

   <?php
     $select_articles = $db->prepare("SELECT * FROM `articles`"); 
     $select_articles->execute();
     if($select_articles->rowCount() > 0){
      while($fetch_article = $select_articles->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="aid" value="<?= $fetch_article['id']; ?>">
      <input type="hidden" name="nom" value="<?= $fetch_articles['nom']; ?>">
      <input type="hidden" name="prix" value="<?= $fetch_articles['prix']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_articles['image_01']; ?>">
      <img src="dossier_img/<?= $fetch_articles['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_articles['nom']; ?></div>
      <div class="flex">
         <div class="prix"><span>€</span><?= $fetch_aricles['prix']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="ajouter au panier" class="btn" name="ajouter_au_panier">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">aucun produit trouvé !</p>';
   }
   ?>

   </div>

</section>

