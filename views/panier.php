<?php

include 'models/connexion.php';

if(isset($_POST['delete'])){
   $panier_id = $_POST['panier_id'];
   $delete_panier_item = $db->prepare("DELETE FROM `panier` WHERE id = ?");
   $delete_panier_item->execute([$panier_id]);
}

if(isset($_GET['delete_all'])){
   $delete_panier_item = $db->prepare("DELETE FROM `panier` WHERE user_id = ?");
   $delete_panier_item->execute([$user_id]);
   header('location:panier.php');
}

if(isset($_POST['update_qty'])){
   $panier_id = $_POST['panier_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $db->prepare("UPDATE `panier` SET quantite = ? WHERE id = ?");
   $update_qty->execute([$qty, $panier_id]);
   $message[] = 'quantité de panier mise à jour';
}

?>

<!DOCTYPE html>
<html lang>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>panier</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>
   
<?php include 'header.php'; ?>

<section class="articles shopping-panier">

   <h3 class="heading">panier</h3>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_panier = $db->prepare("SELECT * FROM `panier` WHERE user_id = ?");
      $select_panier->execute([$user_id]);
      if($select_panier->rowCount() > 0){
         while($fetch_panier = $select_panier->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="panier_id" value="<?panier['id']; ?>">
      <img src="dossier_img/<?panier['image']; ?>" alt="">
      <div class="name"><?panier['name']; ?></div>
      <div class="flex">
         <div class="prix">€<?panier['prix']; ?>/-</div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?panier['quantite']; ?>">
         <button type="submit" class="fas fa-edit" name="update_qty"></button>
      </div>
      <div class="sub-total"> sub total : <span>$<?= $sub_total =panier['prix'] panier['quantite']; ?>/-</span> </div>
      <input type="submit" value="delete item" onclick="return confirm('supprimer article du panier?');" class="delete-btn" name="delete">
   </form>
   <?php
   $grand_total += $sub_total;
      }
   }else{
      echo '<p class="empty">votre panier est vide</p>';
   }
   ?>
   </div>

   <div class="panier-total">
      <p>grand total : <span>€<?= $grand_total; ?>/-</span></p>
      <a href="boutique.php" class="option-btn">continuer les achats</a>
      <a href="panier.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('supprimer tous les articles du panier?');">supprimer tous les articles</a>
      <a href="caisse.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">passer à la caisse</a>
   </div>

</section>

<script src="js/script.js"></script>

</body>
</html>