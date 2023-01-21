<?php
  require_once "connexion.php";

  $afficher_articles_all = function () use ($db) {
    $statement = $db->prepare("SELECT Titre, quantite, prix, utilisateurId FROM article;");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };

  $afficher_articles_précis = function (string $catégorie) use ($db) {
    $statement = $db->prepare("SELECT Titre, quantite, prix, utilisateurId FROM article ORDER BY id DESC;");
    $statement->execute([$catégorie]);
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };

  $afficher_articles_last = function () use ($db) {
    $statement = $db->prepare("SELECT Titre, quantite, prix, utilisateurId FROM article;");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };

  $afficher_catégorie = function () use ($db) {
    $statement = $db->prepare("SELECT * FROM categorie;");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };

  $afficher_commandes = function (string $UserID) use ($db) {
    $statement = $db->prepare("SELECT CO.sessionId AS Id, CO.total AS Total, CO.dateCommande AS 'Date', CO.shippingStatus AS Statue, AR.Titre AS Titre, AR.prix AS Prix, CAR.quantite AS Quantité, UT.Prenom AS Prenom, UT.email AS Email
      FROM utilisateur AS UT LEFT JOIN commande AS CO ON  UT.id = CO.utilisateurId
      LEFT JOIN commande_article AS CAR ON CO.id = CAR.CommandeId
      LEFT JOIN article AS AR ON CAR.produitId = AR.id
      LEFT JOIN utilisateur AS UT2 ON AR.utilisateurId = UT2.id
      WHERE UT.id = ?;");
    $statement->execute([$UserID]);
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };

  $afficher_produit_achetes= function (string $UID) use ($db) {
    $statement = $db->prepare();
    $statement->execute($UID);
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };
 ?>
