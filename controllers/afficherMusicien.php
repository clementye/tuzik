<?php

  session_start();
  require_once "../views/afficherMusicien.php";
  if (isset($_POST["user-id"])){
    $message=$afficher_mail($_POST["recherche"]);
  } else {
    $message = "Connectez-vous pour contacter";
  }

?>
