<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil</title>
	</head>
	<body>
		<a href="/views/accueil.php">Acceuil</a>
		<h1>Bienvenu <?php echo $_SESSION["user-name"]; ?></h1>
        <p>Vous êtes bien connecté.</p>
				<a href="/controllers/deconnexion.php">Déconnexion</a><br>

	</body>
</html>
