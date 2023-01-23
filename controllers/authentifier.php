<?php
// Si l'email ou le mot de passe n'est pas spécifié
if ($_POST["email"] == null or $_POST["password"] == null) {
	// On prépare un message d'erreur.
	$erreur = "<div class=texte >Veuillez saisir une email valide.</div>";
	require_once "../views/accueil.php";
} else {
	// Sinon, on récupère les fonctions pour gérer un utilisateur (ajouter, récupérer)
	require_once "../models/utilisateur.php";

	// Si on demande à s'inscrire
	if ($_POST["action"] == "sign-in") {

		// On vérifie si l'email est déjà utilisé par un autre compte ou non,
		$mail = $vérifier_mail($_POST["email"]);
		if ($mail == true){
			// si oui, on prépare un message d'erreur,
			$erreur = "<div class=texte >Veuillez saisir une email valide.</div>";
			require_once "../views/inscription.php";
		} else {
			$hashedPW = password_hash($_POST["password"], PASSWORD_BCRYPT);
			// si non, on ajoute l'utilisateur,
			$ajouter_utilisateur($_POST["nom"], $_POST["prenom"], $_POST["tel"], $_POST["email"], $hashedPW);

			// et on prépare un message de confirmation
			$confirmation = "Votre compte a bien été ajouté.";
			require_once "../views/connexion.php";
		}

	} else if ($_POST["action"] == "sign-up") {
		// Sinon, si on demande à se connecter

		// on essaye de récupérer l'utilisateur depuis la base de données
		$utilisateur = $recuperer_utilisateur($_POST["email"]);
		$hash = $utilisateur->motdepasse;

		// Si on a rien récupéré
		if ($utilisateur == false || !password_verify($_POST["password"], $hash)) {
			// On indique que la connexion n'a pas fonctionné
			//echo password_verify("toto")
			$erreur = "L'email ou le mot de passe n'est pas bon.";
			require_once "../views/connexion.php";
		} else {
			$nomUtilisateur ='';
			$status1 = $utilisateur-> NumMagasin;
			$status2 = $utilisateur-> NumFabricant;
			if (isset($utilisateur->prenom)) {
				$nomUtilisateur = $utilisateur->prenom;
			} else {
				$finNomUtilisateur = strpos($_POST["email"], '@');
				for ($i=0; $i < $finNomUtilisateur; $i++) {
					$nomUtilisateur .= $_POST['email'][$i];
				};
			};
			// Sinon, on enregistre l'id de l'utilisateur dans la session et on affiche la page suivante
			session_start();
			$_SESSION["user-id"] = $utilisateur->id;
			$_SESSION["user-email"] = $utilisateur->email;
			$_SESSION["user-name"] = $nomUtilisateur;
			if ($status1 >= 1) { //Vérifie si le compte est un gérant de magasin
				$_SESSION["user-statue"] = "Magasin";
			} else if ($status2 >= 1) { // ou un fabricant
				$_SESSION["user-statue"] = "Fabricant";
			} else {
				$_SESSION["user-statue"] = "de Particulier";
			}

 			require_once "../views/espace_personnel.php";
		}
	}
}
?>
