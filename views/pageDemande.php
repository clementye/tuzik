// Affichage de la page

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Demande d'article</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Demande d'article</h1>
        <form action="demande.php" method="post">
            <p>
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" value="<?php echo $titre; ?>">
            </p>
            <p>
                <label for="description">Description :</label>
                <input type="text" name="description" id="description" value="<?php echo $description; ?>">
            </p>
            <p>
                <label for="photo">Photo :</label>
                <input type="text" name="photo" id="photo" value="<?php echo $photo; ?>">
            </p>
            <p>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>">
            </p>
            <p>
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>">
            </p>
            <p>
                <label for="telephone">Téléphone :</label>
                <input type="text" name="telephone" id="telephone" value="<?php echo $telephone; ?>">
            </p>
            <p>
                <label for="prix">Prix :</label>
                <input type="text" name="prix" id="prix" value="<?php echo $prix; ?>">
            <p>
                <input type="submit" value="Envoyer">
            </p>
        </form>
        <?php
        // Affichage des erreurs
        if ($erreur != '') {
            echo '<p class="erreur">' . $erreur . '</p>';
        }
        // Affichage du message de confirmation
        if ($message != '') {
            echo '<p class="message">' . $message . '</p>';
        }
        ?>
    </body>
</html>