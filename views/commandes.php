<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>commandes</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   
<?php include '../models/header.php'; ?>

<section class="commandes">

   <h1 class="heading">commandes placées</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">veuillez vous connecter pour voir vos commandes</p>';
      }else{
         $select_commandes = $db->prepare("SELECT * FROM `commandes` WHERE user_id = ?");
         $select_commandes->execute([$user_id]);
         if($select_commandes->rowCount() > 0){
            while($fetch_commandes = $select_commandes->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>nom : <span><?= $fetch_commandes['name']; ?></span></p>
      <p>email : <span><?= $fetch_commandes['email']; ?></span></p>
      <p>telephone : <span><?= $fetch_commandes['telephone']; ?></span></p>
      <p>adresse : <span><?= $fetch_commandes['adresse']; ?></span></p>
      <p>mode de paiement : <span><?= $fetch_commandes['method']; ?></span></p>
      <p>vos commandes : <span><?= $fetch_commandes['total_produits']; ?></span></p>
      <p>prix total : <span>$<?= $fetch_commandes['total_prix']; ?>/-</span></p>
      <p> statut du paiement : <span style="color:<?php if($fetch_commandes['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_commandes['payment_status']; ?></span> </p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">aucune commande a encore été placée !</p>';
      }
      }
   ?>

   </div>

</section>

<script src="../js/script.js"></script>

</body>
</html>