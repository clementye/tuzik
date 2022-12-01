<?php
require_once "connexion.php";

$ajouter_utilisateur = function (string $email, string $motDePasse) use($db) {
	$statement = $db->prepare("INSERT INTO user(/*id, Nom, Prenpm, telephone,*/ email, password_hash) VALUES (/*'', ?, ?, ?,*/ ?, ?);");
	$statement->execute([/*$nom, $prenom, $tel,*/ $email, password_hash($motDePasse, PASSWORD_BCRYPT)]);
	// TODO: Gestion des erreurs.
};

$recuperer_utilisateur = function (string $email) use($db) {
	$statement = $db->prepare(
		"SELECT id, email, password_hash
		FROM user
		WHERE email = ?;"
	);
	$statement->execute([$email]);
	$result = $statement->fetch(PDO::FETCH_OBJ);
	return $result;
};
?>
