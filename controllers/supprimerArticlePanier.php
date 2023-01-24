<?php
  require_once "../models/articles.php";
  $supprimer = $supprimer_article_panier($_POST["articleid"]);
  $confirmation ="Article Supprimer.";
  require_once "../controllers/panier.php"
 ?>
