<?php

// Vérification des droits d'accès

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