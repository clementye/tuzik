<?php
require_once "connexion.php";

$ajouter_fabricant = function (string $adresse, string $nom, string $horaires, string $uid) use($db) {
	$statement = $db->prepare("INSERT INTO profilmagasin(adresse, nom, horaires, utilisateurid) VALUES (?, ?, ?, ?);");
	$result = $statement->execute([$adresse, $nom, $specialite, $prix, $uid]);
	var_dump($result);
	// TODO: Gestion des erreurs.
};

$afficher_magasin = function (){
  $statement = $db->prepare("SELECT Nom, adresse, horaires FROM profilmagasin")
	$result = $statement->fetch(PDO::FETCH_OBJ);
	return $result;
}

$afficher_magasin_precis = function (string $uid){
	$statement = $db->prepare(
		"SELECT id
		FROM profilmagasin
		WHERE utilisateurid = ?;"
	);
	$statement->execute([$email]);
	$result = $statement->fetch(PDO::FETCH_OBJ);
	return $result;
}

$ajouter_statue_utilisateur = function (string $numId){
	if ($numId !== NULL){
		$statement = $db -> prepare(
			"UPDATE utilisateur SET 'Num Magasin' = ? WHERE email = ?;"
		);
		$statement->execute([$téléphone, $email]);}
}
 ?>
