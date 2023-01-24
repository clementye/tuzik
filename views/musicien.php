<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
	<style>
 body {
background: url("../images/musicien-bg.jpg") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  }
.m {
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
        <div class=m>
    <form action="/controllers/musicien.php" method="post">
			<?php if (isset ($erreur)) {
				echo $erreur;
				echo "<br>";
			} ?>
            <h1 class="texte">Inscription</h1>
            <h4 class="texte">Entrez vos informations.</h4>

            <div class="texte"><label for="adresse">Adresse :</label>
			<input type="adresse" id="adresse" name="adresse" /></div>
            <br />
			<div class="texte"><label for="instrument">Instrument :</label>
			<input type="instrument" id="instrument" name="instrument" /></div>
			<br />
			<div class="texte"><label for="niveau">Niveau :</label>
			<input type="niveau" id="niveau" name="niveau" /></div>
			<br />
            <div class="texte"><label for="bio">bio :</label>
            <textarea type="bio" id="bio" name="bio" rows="5" cols="33"></textarea>
            </div>
			<button name="action" value="Enregister">Enregister</button>
      <br>


		</form>
    <a href="/controllers/espace_membres.php" style="color:darkorange">Retour</a>
		</div>

  </body>
</html>
