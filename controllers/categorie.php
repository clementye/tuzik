<?php

include '../models/connexion.php';

  session_start();
  if (isset($_SESSION["user-id"])) {
    require_once "../views/categorie.php";
  } else {
    require_once "../views/connexion.php";
  }

?>