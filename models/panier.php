<?php

include '../models/connexion.php';
include '../models/liste_de_souhaits.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['delete'])){
   $panier_id = $_POST['panier_id'];
   $delete_panier_item = $db->prepare("DELETE FROM `panier` WHERE id = ?");
   $delete_panier_item->execute([$panier_id]);
}

if(isset($_GET['delete_all'])){
   $delete_panier_item = $db->prepare("DELETE FROM `panier` WHERE user_id = ?");
   $delete_panier_item->execute([$user_id]);
   header('location:panier.php');
}

if(isset($_POST['modification_qty'])){
   $panier_id = $_POST['panier_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $modification_qty = $db->prepare("UPDATE `panier` SET quantity = ? WHERE id = ?");
   $modification_qty->execute([$qty, $panier_id]);
   $message[] = 'panier quantity updated';
}

include '../views/panier.php';
?>
