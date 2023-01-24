<?php
    require_once "../models/payer.php";
    session_start();
    $SID = ceil(rand(10000, 50000));
    $dateCO = "00/00/0000";
    if (!isset($_GET["validate"])){
      $création_commande($_SESSION["user-id"], $SID, $_POST["adresse"], $_POST["grandtotal"], $dateCO);
      $CID = $récupérer_ID_commande($_SESSION["user-id"]);
      foreach ($CID as $CI){
        $création_commande_article($_POST["articleid"], $_POST["quantité"], $CI->id);
      }
      require_once "../views/attente_confirmation.php";
    } else {
      $CID = $récupérer_ID_commande($_SESSION["user-id"]);
      foreach ($CID as $CI){
        $paiement($CI->id, '*********', '€', 'PayPal', 'Paid');
      }
      $quantité = $récupérer_quantité($_SESSION["user-id"]);
      foreach ($quantité as $QTY) {
        $diminuer_article($QTY->Quantité, $QTY->AID);
      };
      $supprimer_panier($_SESSION["user-id"]);
      $facture = $afficher_facture($_SESSION["user-id"]);
      $confirmation = "Votre achat s'est bien effectué.";
      require_once "../views/confirmation_achat.php";
    }
 ?>
