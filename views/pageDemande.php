<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
        <h1>Demande d'article</h1>
        <form action="/controllers/demande.php" method="post">
        <?php if (isset ($erreur)) {
				echo $erreur."<br>";
			}

      if (isset($confirmation)){
        echo $confirmation."<br>";
      } ?>
                   Veuillez remplir le formulaire ci-dessous

            <br />
			<div class="texte"><label for="titre">Titre :</label>
			<input type="titre" id="titre" name="titre" /></div>
			<br />
			<div class="texte"><label for="categorie">Categorie :</label>
			<input type="categorie" id="categorie" name="categorie" /></div>
			<br />
			<div class="texte"><label for="prix">Prix :</label>
			<input type="prix" id="prix" name="prix" /></div>
			<br />
            <br>
			<button name="action" value="Enregister">Enregister</button>
		</form>
		</div>
        <a href="/views/accueil.php">RETOUR</a>
    </body>
</html>
