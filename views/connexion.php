<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil</title>
        <style>
  body {
background: url("/images/TUZIK(bckgrnd2).png") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  }
.l {
    padding: 10%;
    padding-top: 0%;
    margin-top: 10%;
    margin-right: 35%;
    margin-left: 35%;
    background-color:hsla(0, 0%, 0%, 0.595);
}
.logo {
    width: 0%;
    height: 0%;
    padding-top: 50%;
  }
  .texte {
    color: white;
    font-family:  Courier New, monospace;
  }
</style>
	</head>
	<body>
    <logo>
    <img src="/images/newtuzik.png" alt="logo" style="width:20%;height:20%;">
  </logo>
        <div class=l>
		<form action="/controllers/authentifier.php" method="post">
			<?php if (isset ($erreur)) {
				echo $erreur;
				echo "<br>";
			} ?>
            <h1 class="texte">Connexion</h1>
            <br />
			<div class="texte"><label for="email">Email :</label>
			<input type="email" id="email" name="email" /></div>
			<br />
			<div class="texte"><label for="password">Mot de passe :</label>
			<input type="password" id="password" name="password" /></div>
      <br />
			<button name="action" value="sign-up">Se connecter</button>
      <br />
      <a style="color:aliceblue" href="/views/inscription.php">Pas encore inscrit ?</a>
		</form>
		</div>
		<?php if (isset ($confirmation)) {
			echo $confirmation;
		} ?>
	</body>
</html>
