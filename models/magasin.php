<?php
require_once "connexion.php";

$ajouter_fabricant = function (string $adresse, string $nom, string $horaires, string $uid) use($db) {
	$statement = $db->prepare("INSERT INTO profil_fabricant(adresse, nom, horaires, utilisateurid) VALUES (?, ?, ?, ?);");
	$result = $statement->execute([$adresse, $nom, $specialite, $prix, $uid]);
	var_dump($result);
	// TODO: Gestion des erreurs.
};

$afficher_fabriquant = function (){
  $statement = $db->prepare("SELECT Nom, adresse, horaires FROM profil_fabriquant")
	$result = $statement->fetch(PDO::FETCH_OBJ);
	return $result;
}


 ?>
