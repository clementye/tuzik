<?php

include '../models/connexion.php';
//include '../models/liste_de_souhaits_panier.php';
session_start();
if (isset($_SESSION["user-id"])) {
  require_once "../views/recherche.php";
} else {
  require_once "../views/connexion.php";
}

?>

