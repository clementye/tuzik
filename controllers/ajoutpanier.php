<?php
  session_start();
  $ajouter_panier($_POST["Titre"], $_POST["Prix"], $_POST["Titre"], $_POST["Titre"], '0');
  if ($_SESSION["user-id"]===TRUE){
    $confirmer_panier($_SESSION["user-id"]);
    require_once "../views/panier";
  } else {
    require_once "/views/connexion.php"
  }
 ?>
