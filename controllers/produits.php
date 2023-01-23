<?php

include '../models/connexion.php';
session_start();
if (isset($_SESSION["user-id"])) {
  require_once "../views/produits.php";
} else {
  require_once "../views/connexion.php";
}

if(isset($_POST['ajouter_produits'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $prix = $_POST['prix'];
    $prix = filter_var($prix, FILTER_SANITIZE_STRING);
    $details = $_POST['details'];
    $details = filter_var($details, FILTER_SANITIZE_STRING);
 
    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_size_01 = $_FILES['image_01']['size'];
    $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
    $image_folder_01 = '../uploaded_img/'.$image_01;
 
    $image_02 = $_FILES['image_02']['name'];
    $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
    $image_size_02 = $_FILES['image_02']['size'];
    $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
    $image_folder_02 = '../uploaded_img/'.$image_02;
 
    $image_03 = $_FILES['image_03']['name'];
    $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
    $image_size_03 = $_FILES['image_03']['size'];
    $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
    $image_folder_03 = '../uploaded_img/'.$image_03;
 
    $select_produits = $db->prepare("SELECT * FROM `produits` WHERE name = ?");
    $select_produits->execute([$name]);
 
    if($select_produits->rowCount() > 0){
       $message[] = 'Le nom du produit existe déjà !';
    }else{
 
       $insert_produits = $db->prepare("INSERT INTO `produits`(name, details, prix, image_01, image_02, image_03) VALUES(?,?,?,?,?,?)");
       $insert_produits->execute([$name, $details, $prix, $image_01, $image_02, $image_03]);
 
       if($insert_produits){
          if($image_size_01 > 2000000 OR $image_size_02 > 2000000 OR $image_size_03 > 2000000){
             $message[] = 'La taille image est trop grande !';
          }else{
             move_uploaded_file($image_tmp_name_01, $image_folder_01);
             move_uploaded_file($image_tmp_name_02, $image_folder_02);
             move_uploaded_file($image_tmp_name_03, $image_folder_03);
             $message[] = 'nouveau produit ajouté !';
          }
 
       }
 
    }  
 
 };
 
 if(isset($_GET['delete'])){
 
    $delete_id = $_GET['delete'];
    $delete_produits_image = $db->prepare("SELECT * FROM `produits` WHERE id = ?");
    $delete_produits_image->execute([$delete_id]);
    $fetch_delete_image = $delete_produits_image->fetch(PDO::FETCH_ASSOC);
    unlink('../uploaded_img/'.$fetch_delete_image['image_01']);
    unlink('../uploaded_img/'.$fetch_delete_image['image_02']);
    unlink('../uploaded_img/'.$fetch_delete_image['image_03']);
    $delete_produits = $db->prepare("DELETE FROM `produits` WHERE id = ?");
    $delete_produits->execute([$delete_id]);
    $delete_panier = $db->prepare("DELETE FROM `panier` WHERE pid = ?");
    $delete_panier->execute([$delete_id]);
    $delete_liste_de_souhaits = $db->prepare("DELETE FROM `liste_de_souhaits` WHERE pid = ?");
    $delete_liste_de_souhaits->execute([$delete_id]);
    header('location:produits.php');
 }
 
?>

