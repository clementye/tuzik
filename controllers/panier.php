<?php
  session_start();
  if (isset($_SESSION["user-name"])) {
    require_once "../views/panier.php";
  } else {
    require_once "../views/connexion.php";
  }
?>
