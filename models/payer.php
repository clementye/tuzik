<?php
    require_once "connexion.php";

    $création_commande_article = function (string $PID, string $Quantité, string $CID) use ($db) {
      $statement = $db->prepare("INSERT INTO commande_article(produitId, quantite, commandeId) VALUES (?, ?, ?);");
    	$statement->execute([$PID, $Quantité, $CID]);
    };

    $création_commande = function (string $UID, string $SID, string $Adresse, string $GrandTotal, string $DC) use ($db) {
      $statement = $db->prepare("INSERT INTO commande(utilisateurId, sessionId, shipping, total, dateCommande) VALUES (?, ?, ?, ?, ?);");
        $result = $statement->execute([$UID, $SID, $Adresse, $GrandTotal, $DC]);
    };

    $récupérer_ID_commande = function (string $UID) use ($db) {
      $statement = $db->prepare("SELECT MAX(id) as id FROM commande WHERE utilisateurId = ?;");
      $statement->execute([$UID]);
      $result = $statement->fetchAll(PDO::FETCH_OBJ);
      return $result;
    };

    $récupérer_quantité = function (string $UID) use ($db) {
      $statement = $db->prepare("SELECT CAR.produitId AS AID, CAR.quantite AS Quantité
        FROM commande_article AS CAR JOIN commande AS CA ON CAR.CommandeId=CA.id
        WHERE CA.utilisateurId = ? AND CAR.CommandeId=(
          SELECT MAX(commande_article.commandeId) FROM commande_article
        );");
      $statement->execute([$UID]);
      $result = $statement->fetchAll(PDO::FETCH_OBJ);
      return $result;
    };

    $paiement = function (string $CID, string $Code, string $Type, string $Mode, string $Status) use ($db) {
      $statement = $db->prepare("INSERT INTO paiement(commandeId, code, type, mode, paymentStatus) VALUES (?, ?, ?, ?, ?);");
      $statement->execute([$CID, $Code, $Type, $Mode, $Status]);
    };

    $diminuer_article = function (string $DimQuantité, string $AID) use ($db) {
      $statement = $db->prepare("UPDATE article
        SET quantite = quantite - ?
        WHERE id = ?;");
      $statement->execute([$DimQuantité, $AID]);
    };

    $diminuer_article = function (string $UID) use ($db) {
      $statement = $db->prepare("DELETE FROM panier_article WHERE utilisateurId = ?");
      $statement->execute([$UID]);
    };

 ?>
