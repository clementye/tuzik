<?php
require_once "connexion.php";

$ajouter_fabricant = function (string $adresse, string $nom, string $specialite, string $prix, string $uid) use($db) {
	$statement = $db->prepare("INSERT INTO profil_fabricant(adresse, nom, spécialité, prix, utilisateurid) VALUES (?, ?, ?, ?, ?);");
	$result = $statement->execute([$adresse, $nom, $specialite, $prix, $uid]);
	var_dump($result);
	// TODO: Gestion des erreurs.
};

$afficher_fabriquant = function (){
  $statement = $db->prepare("SELECT Nom, specialite, adresse, prix FROM profil_fabriquant")
	$result = $statement->fetch(PDO::FETCH_OBJ);
	return $result;
}

$ajouter_statue_utilisateur = function (string $numId, string $uid){
  if ($numId !== NULL){
    $statement = $db -> prepare(
      "UPDATE utilisateur SET 'Num Fabricant' = ? WHERE email = ?;"
    );
    $statement->execute([$numId, $uid]);}
}
 ?>
