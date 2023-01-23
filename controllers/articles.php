<?php

  session_start();
  require_once "../models/articles.php";
  $mesArticles = $afficher_mes_articles($_SESSION["user-id"]);

  require_once "../views/mesArticles.php";

?>
