<?php
require_once "../models/connexion.php";

$ajouter_musicien = function (string $adresse, string $instrument, string $niveau, string $bio, string $uid) use($db) {
	$statement = $db->prepare("INSERT INTO profilmusicien(adresse, instrument, niveau, bio, utilisateurId) VALUES (?, ?, ?, ?, ?);");
	$statement->execute([$adresse, $instrument, $niveau, $bio, $uid]);
	// TODO: Gestion des erreurs.
};

$afficher_musicien = function() use($db){
  $statement = $db->prepare("SELECT UT.Nom AS Nom, PM.instrument AS instrument, PM.adresse AS adresse, PM.niveau AS niveau, PM.bio AS bio, UT.email AS email
		FROM profilmusicien AS PM JOIN utilisateur AS UT ON PM.utilisateurId = UT.id;");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_OBJ);
	return $result;
};

$ajouter_statue_utilisateur = function (string $numId, string $uid) use($db){
  if ($numId !== NULL){
    $statement = $db -> prepare(
      "UPDATE utilisateur SET 'NumMagasin' = ? WHERE email = ?;"
    );
    $statement->execute([$numId, $uid]);}
}
 ?>
