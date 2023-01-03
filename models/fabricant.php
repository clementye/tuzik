<?php
require_once "connexion.php";

$ajouter_fabricant = function (string $adresse, string $nom, string $specialite, string $prix, string $uid) use($db) {
	$statement = $db->prepare("INSERT INTO profilFabricant(adresse, Nom, specialite, prix, utilisateurid) VALUES (?, ?, ?, ?, ?);");
	$result = $statement->execute([$adresse, $nom, $specialite, $prix, $uid]);
	var_dump($result);
	// TODO: Gestion des erreurs.
};

$afficher_fabricant = function () use($db){
  $statement = $db->prepare("SELECT Nom, specialite, adresse, prix FROM profilFabriquant");
	$result = $statement->fetch(PDO::FETCH_OBJ);
	return $result;
}


 ?>
