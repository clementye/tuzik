<?php
require_once "connexion.php";

$ajouter_fabricant = function (string $adresse, string $nom, string $specialite, string $prix, string $uid) use($db) {
	$statement = $db->prepare("INSERT INTO profilfabricant(adresse, Nom, specialite, prix, utilisateurid) VALUES (?, ?, ?, ?, ?);");
	$statement->execute([$adresse, $nom, $specialite, $prix, $uid]);
	// TODO: Gestion des erreurs.
};

$afficher_fabricant = function() use($db){
  $statement = $db->prepare("SELECT Nom, specialite, adresse, prix FROM profilfabricant;");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_OBJ);
	return $result;
};

$ajouter_statue_utilisateur = function (string $numId, string $uid) use($db){
  if ($numId !== NULL){
    $statement = $db -> prepare(
      "UPDATE utilisateur SET 'Num Fabricant' = ? WHERE email = ?;"
    );
    $statement->execute([$numId, $uid]);}
}
 ?>
