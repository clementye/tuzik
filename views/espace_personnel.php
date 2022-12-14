<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil</title>
	</head>
	<body>
		<?php if (isset ($confirmation)) {
			echo $confirmation;
		} ?>
		<a href="/views/accueil.php">Acceuil</a>
		<h1>Bienvenu <?php echo $_SESSION["user-name"]; ?></h1>
        <p>Vous êtes bien connecté.</p>
				<a href="/views/modifier_utilisateur.php">Modifier compte</a><br>
				<a href="/views/inscription_fabricant.php">Profil de fabriquant</a><br>
				<a href="/views/inscription_magasin.php">Enregistrer un magasin</a><br>
				<a href="/controllers/deconnexion.php">Déconnexion</a><br>

	</body>
</html>
