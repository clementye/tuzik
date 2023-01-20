<?php
require_once "connexion.php";

$ajouter_musicien = function (string $adresse, string $instrument, string $niveau, string $description, string $uid) use($db) {
	$statement = $db->prepare("INSERT INTO profilmusicien(adresse, instrument, niveau, descript, utilisateur_id) VALUES (?, ?, ?, ?, ?);");
	$statement->execute([$adresse, $instrument, $niveau, $description, $uid]);
	// TODO: Gestion des erreurs.
};

$afficher_musicien = function() use($db){
  $statement = $db->prepare("SELECT UT.Nom AS Nom, PM.instrument AS instrument, PM.adresse AS adresse, PM.niveau AS niveau, PM.descript AS `Description` FROM profilmusicien AS PM JOIN utilisateur AS UT ON PM.utilisateur_id = UT.id;");
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