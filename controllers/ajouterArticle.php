<?php
    session_start();
    require_once "../models/articles.php";

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../imageArticle/" . $filename;

    $ajouter_article($_POST["Titre"], $_POST["Prix"], $_POST["Quantité"], $_POST["Catégorie"], $_SESSION["user-id"]);
    $article = $afficher_article_id($_POST["Titre"]);
    $ajouter_photo($filename,$article->id);
    move_uploaded_file($tempname, $folder);

    $confirmation = "Votre article fut bien enregistré";
    require_once "../views/mesArticles.php"
 ?>
