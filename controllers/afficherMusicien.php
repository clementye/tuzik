<?php

session_start();
  if (isset($_SESSION["user-name"])) {
    require_once "../views/afficherMusicien.php";
  } else {
    require_once "../views/connexion.php";
}

?>