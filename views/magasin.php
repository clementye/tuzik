<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="/controllers/magasin.php" method="post">
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
			<div class="texte"><label for="prix">Horaires:</label>
			<input type="prix" id="prix" name="prix" /></div>
			<br />
            <br>
			<button name="action" value="Enregister">Enregister</button>
		</form>
		</div>
    <a href="/views/espace_personnel.php">Retour</a>
  </body>
</html>
