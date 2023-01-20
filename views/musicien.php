<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
	<style>
         body {
            background-color: #EFEFEF;}
      </style>
  </head>
  <body>
    <form action="/controllers/musicien.php" method="post">
			<?php if (isset ($erreur)) {
				echo $erreur;
				echo "<br>";
			} ?>
            <h1 class="texte">Inscription</h1>
            <br />
            <div class="texte"><label for="adresse">Adresse :</label>
			<input type="adresse" id="adresse" name="adresse" /></div>
            <br />
			<div class="texte"><label for="instrument">instrument :</label>
			<input type="instrument" id="instrument" name="instrument" /></div>
			<br />
			<div class="texte"><label for="niveau">niveau :</label>
			<input type="niveau" id="niveau" name="niveau" /></div>
			<br />
            <div class="texte"><label for="description">Description :</label>
            <textarea type="description" id="descritpion" name="description" rows="5" cols="33">
            </textarea>
            </div>
            <br>
			<button name="action" value="Enregister">Enregister</button>
		</form>
		</div>
    <a href="/controllers/espace_membres.php">Retour</a>
  </body>
</html>
