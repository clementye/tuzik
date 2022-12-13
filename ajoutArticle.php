<?php

// Vérification des droits d'accès
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

// Initialisation des variables
$titre = '';
$description = '';
$photo = '';
$nom = '';
$prenom = '';
$erreur = '';
$telephone = '';
$prix = '';

// Traitement des données du formulaire
if (isset($_POST['titre'])) {
    // Récupération des données du formulaire
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $photo = $_POST['photo'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $prix = $_POST['prix'];
    // Vérification des données
    if ($titre == '') {
        $erreur .= 'Le titre est vide.<br>';
    }
    if ($description == '') {
        $erreur .= 'La description est vide.<br>';
    }
    if ($photo == '') {
        $erreur .= 'La photo est vide.<br>';
    }
    if ($nom == '') {
        $erreur .= 'Le nom est vide.<br>';
    }
    if ($prenom == '') {
        $erreur .= 'Le prénom est vide.<br>';
    }
    if ($telephone == '') {
        $erreur .= 'Le téléphone est vide.<br>';
    }
    if ($prix == '') {
        $erreur .= 'Le prix est vide.<br>';
    }
    // Si pas d'erreur, on insère les données dans la base de données
    if ($erreur == '') {
        // Connexion à la base de données
        include '/models/connexion.php';
        // Préparation de la requête
        $requete = $bd->prepare('INSERT INTO article (titre, description, photo, nom, prenom, telephone, prix) VALUES (:titre, :description, :photo, :nom, :prenom, :telephone, :prix)');
        // Exécution de la requête
        $requete->execute(array(
            'titre' => $titre,
            'description' => $description,
            'photo' => $photo,
            'nom' => $nom,
            'prenom' => $prenom,
            'telephone' => $telephone,
            'prix' => $prix,
        ));
        // Fermeture de la requête
        $requete->closeCursor();
        // Message de confirmation
        $message = 'Votre demande a été enregistrée.';
    }
}
?>
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
