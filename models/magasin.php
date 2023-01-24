<?php
require_once "connexion.php";

$ajouter_magasin = function (string $adresse, string $nom, string $horaires, string $uid) use($db) {
	$statement = $db->prepare("INSERT INTO profilmagasin(adresse, nom, horaires, utilisateurId) VALUES (?, ?, ?, ?);");
	$statement->execute([$adresse, $nom, $horaires, $uid]);
	// TODO: Gestion des erreurs.
};

$afficher_magasin = function () use($db){
  $statement = $db->prepare("SELECT Nom, adresse, horaires FROM profilmagasin");
  $statement->execute([]);
  $result = $statement->fetchAll(PDO::FETCH_OBJ);
	return $result;
};

$afficher_magasin_precis = function (string $name) use($db){
	$statement = $db->prepare(
		"SELECT NumMagasin
		FROM profilmagasin
		WHERE nom = ?;"
	);
	$statement->execute([$name]);
	$result = $statement->fetch(PDO::FETCH_OBJ);
	return $result;
};

$ajouter_statue_utilisateur = function (string $numId, string $email) use($db){
	if ($numId !== NULL){
		$statement = $db -> prepare(
			"UPDATE utilisateur SET NumMagasin = ? WHERE email = ?;"
		);
		$statement->execute([$numId, $email]);}
};
 ?>
