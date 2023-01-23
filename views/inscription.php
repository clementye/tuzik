<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil</title>
        <style>
 body {
background: url("../images/accueil-bg.png") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  }
.l {
    padding: 10%;
    padding-top: 0%;
    margin-right: 35%;
    margin-left: 35%;
    background-color:hsla(0, 0%, 0%, 0.595);
}
  .texte {
    color: white;
    font-family:  Courier New, monospace;
  }
</style>
	</head>
	<body>
    <logo>
    <img src="/images/newtuzik.png" alt="logo" style="width:10.5%;height:10.5%;float:top-left;">
  </logo>
        <div class=l>
		<form action="/controllers/authentifier.php" method="post">
			<?php if (isset ($erreur)) {
				echo $erreur;
				echo "<br>";
			} ?>
            <h1 class="texte">Inscription</h1>
			<div class="texte"><label for="nom">Nom :</label>
			<input type="nom" id="nom" name="nom" /></div>
			<br />
      <div class="texte"><label for="prenom">Prénom :</label>
			<input type="prenom" id="prenom" name="prenom" /></div>
			<br />
      <div class="texte"><label for="tel">Téléphone :</label>
			<input type="tel" id="tel" name="tel" /></div>
			<br />
			<div class="texte"><label for="email">Email :</label>
			<input type="email" id="email" name="email" /></div>
			<br />
			<div class="texte"><label for="password">Mot de passe :</label>
			<input type="password" id="password" name="password" /></div>
            <br>
			<button name="action" value="sign-in">S'inscrire</button> <br>
      <a style="color:aliceblue" href="/views/connexion.php">Déjà inscrit ?</a> </br>
		</form>
		</div>
    
		<?php if (isset ($confirmation)) {
			echo $confirmation;
		} ?>
	</body>
</html>
