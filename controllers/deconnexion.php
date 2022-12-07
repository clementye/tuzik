<?php
  session_start();
  session_unset();
  session_destroy();
  require_once "../views/accueil.php";
 ?>
