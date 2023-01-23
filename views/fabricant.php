<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
	<style>
 body {
background: url("../images/fabricant-bg.jpg") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  }
.f {
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
        <div class=f>
    <form action="/controllers/fabricant.php" method="post">
			<?php if (isset ($erreur)) {
				echo $erreur;
				echo "<br>";
			} ?>
            <h1 class="texte">Inscription</h1>
            <br />
            <div class="texte"><label for="adresse">Adresse :</label>
			<input type="adresse" id="adresse" name="adresse" /></div>
            <br />
			<div class="texte"><label for="nom">Nom :</label>
			<input type="nom" id="nom" name="nom" /></div>
			<br />
			<div class="texte"><label for="specialite">Specialite :</label>
			<input type="specialite" id="specialite" name="specialite" /></div>
			<br />
			<div class="texte"><label for="prix">Prix horaire:</label>
			<input type="prix" id="prix" name="prix" /></div>
			<br />
            <br>
			<button name="action" value="Enregister">Enregister</button>
		</form>
    <a href="/controllers/espace_membres.php" style="color:darkorange">Retour</a>
		</div>
    
  </body>
</html>
