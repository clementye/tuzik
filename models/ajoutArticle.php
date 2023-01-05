<?php
require_once "connexion.php";

$trouver_catégorie = function (string $catégorie) use($db) {
	$statement = $db->prepare("SELECT id FROM categorie WHERE titre = ?");
	$statement -> execute([$catégorie]);
	$result = $statement -> fetch(PDO::FETCH_OBJ);
	return $result;
};

$ajouter_article = function (string $titre, string $prix, string $uid, string $categorie) use($db) {
	$statement = $db->prepare("INSERT INTO article(titre, prix, utilisateur_Id, idCategorie) VALUES (?, ?, ?, ?);");
	$statement->execute([$titre, $prix, $uid, $categorie]);
	// TODO: Gestion des erreurs.
};

$afficher_article = function() use($db){
  $statement = $db->prepare("SELECT titre, categorie, prix FROM article");
	$result = $statement->fetch(PDO::FETCH_OBJ);
	return $result;
};
?>
