<?php

include '../models/connexion.php';

  session_start();
  if (isset($_SESSION["user-id"])) {
    require_once "../views/fiche_produit.php";
  } else {
    require_once "../views/connexion.php";
  }

?>