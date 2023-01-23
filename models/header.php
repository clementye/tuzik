<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
   include '../models/connexion.php';
?>

<header class="header">

   <section class="flex">

      <a href="accueil.php" class="logo">Tuzik<span>?</span></a>

      <nav class="navbar">
         <a href="accueil.php">Accueil</a>
         <a href="boutique.php">Boutique</a>
         <a href="produits.php">Ajouter articles</a>
         <a href="afficherFabricants.php">Liste des fabricants</a>
         <a href="commandes.php">Commande</a>
         <a href="espace_membres.php">Espace membres</a>
      </nav>

      <div class="icons">
         <?php
            $count_liste_de_souhaits_items = $db->prepare("SELECT * FROM `liste_de_souhaits` WHERE user_id = ?");
            //$count_liste_de_souhaits_items->execute([$user_id]);
            $total_liste_de_souhaits_counts = $count_liste_de_souhaits_items->rowCount();

            $count_panier_items = $db->prepare("SELECT * FROM `panier` WHERE user_id = ?");
            //$count_panier_items->execute([$user_id]);
            $total_panier_counts = $count_panier_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="recherche.php"><i class="fas fa-search"></i></a>
         <a href="liste_de_souhaits.php"><i class="fas fa-heart"></i><span>(<?= $total_liste_de_souhaits_counts; ?>)</span></a>
         <a href="panier.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_panier_counts; ?>)</span></a>
      </div>

   </section>

</header>