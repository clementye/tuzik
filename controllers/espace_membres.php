<?php
  if (isset($_SESSION["user-name"])) {
    $déconnexion = "";
    require_once "../views/espace_personnel.php";
  } else {
    require_once "../views/connexion.php";
  }
?>
