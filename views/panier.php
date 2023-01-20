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

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_panier = $db->prepare("SELECT * FROM `panier` WHERE user_id = ?");
      $select_panier->execute([$user_id]);
      if($select_panier->rowCount() > 0){
         while($fetch_panier = $select_panier->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="panier_id" value="<?= $fetch_panier['id']; ?>">
      <a href="fiche_produit.php?pid=<?= $fetch_panier['pid']; ?>" class="fas fa-eye"></a>
      <img src="../uploaded_img/<?= $fetch_panier['image']; ?>" alt="">
      <div class="name"><?= $fetch_panier['name']; ?></div>
      <div class="flex">
         <div class="prix">$<?= $fetch_panier['prix']; ?>/-</div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $fetch_panier['quantity']; ?>">
         <button type="submit" class="fas fa-edit" name="modification_qty"></button>
      </div>
      <div class="sub-total"> sub total : <span>$<?= $sub_total = ($fetch_panier['prix'] * $fetch_panier['quantity']); ?>/-</span> </div>
      <input type="submit" value="delete item" onclick="return confirm('supprimer cela du panier ?');" class="delete-btn" name="delete">
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
      <p>grand total : <span>$<?= $grand_total; ?>/-</span></p>
      <a href="boutique.php" class="option-btn">continuer les achats</a>
      <a href="panier.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('supprimer tout du panier ?');">supprimer tous les articles</a>
      <a href="caisse.php" class="btn <?= ($grand_total > 0)?'':'disabled'; ?>">passer à la caisse</a>
   </div>

</section>

<script src="../js/script.js"></script>

</body>
</html>