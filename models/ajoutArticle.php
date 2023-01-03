<?php
require_once "connexion.php";

$ajouter_article = function (string $titre, string $categorie, string $prix, string $uid) use($db) {
	$statement = $db->prepare("INSERT INTO profilfabricant(titre, categorie, prix, utilisateurid) VALUES (?, ?, ?, ?);");
	$result = $statement->execute([$titre, $categorie, $prix, $uid]);
	var_dump($result);
	// TODO: Gestion des erreurs.
};

$afficher_article = function() use($db){
  $statement = $db->prepare("SELECT titre, categorie, prix FROM article");
	$result = $statement->fetch(PDO::FETCH_OBJ);
	return $result;
};
?>