<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>caisse</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   
<?php include '../models/header.php'; ?>

<section class="caisse-commandes">

   <form action="" method="POST">

   <h3>vos commandes</h3>

      <div class="display-commandes">
      <?php
         $grand_total = 0;
         $panier_items[] = '';
         $select_panier = $db->prepare("SELECT * FROM `panier` WHERE user_id = ?");
         $select_panier->execute([$user_id]);
         if($select_panier->rowCount() > 0){
            while($fetch_panier = $select_panier->fetch(PDO::FETCH_ASSOC)){
               $panier_items[] = $fetch_panier['name'].' ('.$fetch_panier['prix'].' x '. $fetch_panier['quantity'].') - ';
               $total_produits = implode($panier_items);
               $grand_total += ($fetch_panier['prix'] * $fetch_panier['quantity']);
      ?>
         <p> <?= $fetch_panier['name']; ?> <span>(<?= '$'.$fetch_panier['prix'].'/- x '. $fetch_panier['quantity']; ?>)</span> </p>
      <?php
            }
         }else{
            echo '<p class="empty">votre panier est vide !</p>';
         }
      ?>
         <input type="hidden" name="total_produits" value="<?= $total_produits; ?>">
         <input type="hidden" name="total_prix" value="<?= $grand_total; ?>" value="">
         <div class="grand-total">grand total : <span>$<?= $grand_total; ?>/-</span></div>
      </div>

      <h3>placez vos commandes</h3>

      <div class="flex">
         <div class="inputBox">
            <span>votre name :</span>
            <input type="text" name="name" placeholder="saisissez votre nom" class="box" maxlength="20" required>
         </div>
         <div class="inputBox">
            <span>votre téléphone :</span>
            <input type="number" name="telephone" placeholder="saisissez votre téléphone" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
         </div>
         <div class="inputBox">
            <span>votre email :</span>
            <input type="email" name="email" placeholder="saisissez votre email" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select name="method" class="box" required>
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit card">credit card</option>
               <option value="paytm">paytm</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>adresse :</span>
            <input type="text" name="adresse" placeholder="saississez votre adresse" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>ville :</span>
            <input type="text" name="ville" placeholder="saississez votre ville" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>pays :</span>
            <input type="text" name="pays" placeholder="saississez votre pays" class="box" maxlength="50" required>
         </div>

      <input type="submit" name="order" class="btn <?= ($grand_total > 0)?'':'disabled'; ?>" value="place order">

   </form>

</section>

<script src="../js/script.js"></script>

</body>
</html>