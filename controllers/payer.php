<?php
    require_once "../models/articles.php";
    session_start();
    if (isset($_SESSION["user-id"])) {
      $panier=$afficher_panier($_SESSION["user-id"]);
      $total = $afficher_prix_total($_SESSION["user-id"]);
      require_once "../views/payer.php";
    } else {
      require_once "../views/connexion.php";
    }
 ?>
