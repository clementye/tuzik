<?php

include '../models/connexion.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['delete'])){
   $liste_de_souhaits_id = $_POST['liste_de_souhaits_id'];
   $delete_liste_de_souhaits_item = $db->prepare("DELETE FROM `liste_de_souhaits` WHERE id = ?");
   $delete_liste_de_souhaits_item->execute([$liste_de_souhaits_id]);
}

if(isset($_GET['delete_all'])){
   $delete_liste_de_souhaits_item = $db->prepare("DELETE FROM `liste_de_souhaits` WHERE user_id = ?");
   $delete_liste_de_souhaits_item->execute([$user_id]);
   header('location:liste_de_souhaits.php');
}

include '../views/liste_de_souhaits.php';
?>

