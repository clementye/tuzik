<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>liste de souhaits</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php include '../models/header.php'; ?>

<section class="produits">

   <h3 class="heading">votre liste de souhaits</h3>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_liste_de_souhaits = $db->prepare("SELECT * FROM `liste_de_souhaits` WHERE user_id = ?");
      $select_liste_de_souhaits->execute([$user_id]);
      if($select_liste_de_souhaits->rowCount() > 0){
         while($fetch_liste_de_souhaits = $select_liste_de_souhaits->fetch(PDO::FETCH_ASSOC)){
            $grand_total += $fetch_liste_de_souhaits['prix'];  
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_liste_de_souhaits['pid']; ?>">
      <input type="hidden" name="liste_de_souhaits_id" value="<?= $fetch_liste_de_souhaits['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_liste_de_souhaits['name']; ?>">
      <input type="hidden" name="prix" value="<?= $fetch_liste_de_souhaits['prix']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_liste_de_souhaits['image']; ?>">
      <a href="fiche_produit.php?pid=<?= $fetch_liste_de_souhaits['pid']; ?>" class="fas fa-eye"></a>
      <img src="../uploaded_img/<?= $fetch_liste_de_souhaits['image']; ?>" alt="">
      <div class="name"><?= $fetch_liste_de_souhaits['name']; ?></div>
      <div class="flex">
         <div class="prix">$<?= $fetch_liste_de_souhaits['prix']; ?>/-</div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="ajouter au panier" class="btn" name="ajouter_au_panier">
      <input type="submit" value="delete item" onclick="return confirm('supprimer ceci de la liste de souhaits ?');" class="delete-btn" name="delete">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">votre liste de souhaits est vide</p>';
   }
   ?>
   </div>

   <div class="liste_de_souhaits-total">
      <p>grand total : <span>$<?= $grand_total; ?>/-</span></p>
      <a href="boutique.php" class="option-btn">continuer les achats</a>
      <a href="liste_de_souhaits.php?delete_all" class="delete-btn <?= ($grand_total > 0)?'':'disabled'; ?>" onclick="return confirm('supprimer tout de la liste de souhaits ?');">supprimer tous les articles</a>
   </div>

</section>

<script src="../js/script.js"></script>

</body>
</html>