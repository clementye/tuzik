<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Espace membres</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   
<?php include '../models/header.php'; ?>

<section class="espace">

<text style="font-size:large">
   <br>
	</br>
		
		<h1>Bienvenue <?php echo $_SESSION["user-name"]; ?> </h1>
		<?php echo "Vous avez un profil ".$_SESSION["user-statue"] ?><br>
				<a href="/views/modifier_utilisateur.php">Modifier compte</a><br>
				<a href="/views/fabricant.php">Profil de fabriquant</a><br>
            <a href="/views/musicien.php">Profil de musicien</a><br>
				<a href="/views/magasin.php">Enregistrer un magasin</a><br>
				<a href="/controllers/deconnexion.php">Déconnexion</a><br>
				<a href="/views/supprission_utilisateur_temp.php">Supprimer mon compte</a>
            <br>
	</br>
            <?php if (isset ($confirmation)) {
			echo $confirmation;
		} ?>
   </text>

</section>

<script src="../js/script.js"></script>

</body>
</html>
