<?php
  session_start();

  if($_POST['action']="Confirmer"){
    require_once "../models/utilisateur.php";
    $supprimer_compte($_SESSION["user-email"]);
    session_unset();
    session_destroy();
    require_once "../views/accueil.php";
  } else {
    require_once "/controllers/espace_membres.php";
  }
 ?>
