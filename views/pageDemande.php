<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Demande d'article</title>
    </head>
    <body>
        <h1>Demande d'article</h1>
        <form action="demande.php" method="post">
            <p>
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre">
            </p>
            <p>
                <label for="description">Description :</label>
                <input type="text" name="description" id="description">
            </p>
            <p>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom">
            </p>
            <p>
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom">
            </p>
            <p>
                <label for="telephone">Téléphone :</label>
                <input type="text" name="telephone" id="telephone">
            </p>
            <p>
                <label for="prix">Prix :</label>
                <input type="text" name="prix" id="prix">
            </p>
            <p>
                <label for="photo">photo</label><br>
                <input type="file" id="photo" name="photo"><br><br>
            </p>
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
        <a href="/views/accueil.php">RETOUR</a>
    </body>
</html>
