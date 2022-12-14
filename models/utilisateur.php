<?php
require_once "connexion.php";

$vérifier_mail = function (string $email) use($db) {
	$statement = $db->prepare(
		"SELECT *
		FROM utilisateur
		WHERE email = ?;"
	);
	$statement->execute([$email]);
	$result = $statement->fetch(PDO::FETCH_OBJ);
	return $result;
};

$ajouter_utilisateur = function (string $nom, string $prenom, string $tel, string $email, string $motDePasse) use($db) {
	$statement = $db->prepare("INSERT INTO utilisateur(Nom, Prenom, telephone, email, motdepasse) VALUES (?, ?, ?, ?, ?);");
	$result = $statement->execute([$nom, $prenom, $tel, $email, $motDePasse]);
	var_dump($result);
	// TODO: Gestion des erreurs.
};

$recuperer_utilisateur = function (string $email) use($db) {
	$statement = $db->prepare(
		"SELECT id, email, motdepasse
		FROM utilisateur
		WHERE email = ?;"
	);
	$statement->execute([$email]);
	$result = $statement->fetch(PDO::FETCH_OBJ);
	return $result;
};

/*	$modifier_utilisateur = function (string $motDePasse, string $nom, string $prenom, string $téléphone, string $email) use ($db) {
		if ($motDePasse !== NULL){
			$statement = $db -> prepare(
				"UPDATE utilisateur SET motdepasse = ? WHERE email = ?;"
			);
		}
		if ($nom !== NULL){
			$statement = $db -> prepare(
				"UPDATE utilisateur SET nom = ? WHERE email = ?;"
			);
		}
		if ($prenom !== NULL){
			$statement = $db -> prepare(
				"UPDATE utilisateur SET prenom = ? WHERE email = ?;"
			);
		}
		if ($telephone !== NULL){
			$statement = $db -> prepare(
				"UPDATE utilisateur SET telephone = ? WHERE email = ?;"
			);
		}
		$statement->execute([$email, $nom, $prenom, $motDePasse, $téléphone]);
	}*/

	$supprimer_compte = function (string $email) use ($db){
		$statement = $db->prepare(
			"DELETE FROM utilisateur WHERE email;"
		);
		$statement->execute([$email]);
	}
?>
