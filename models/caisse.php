<?php

include '../models/connexion.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['order'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $number = $_POST['telephone'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $method = $_POST['method'];
    $method = filter_var($method, FILTER_SANITIZE_STRING);
    $address = 'flat no. '. $_POST['flat'] .', '. $_POST['street'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
    $address = filter_var($address, FILTER_SANITIZE_STRING);
    $total_produits = $_POST['total_produits'];
    $total_prix = $_POST['total_prix'];
 
    $check_panier = $db->prepare("SELECT * FROM `panier` WHERE user_id = ?");
    $check_panier->execute([$user_id]);
 
    if($check_panier->rowCount() > 0){
 
       $insert_order = $db->prepare("INSERT INTO `commandes`(user_id, name, telephone, email, method, address, total_produits, total_prix) VALUES(?,?,?,?,?,?,?,?)");
       $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_produits, $total_prix]);
 
       $delete_panier = $db->prepare("DELETE FROM `panier` WHERE user_id = ?");
       $delete_panier->execute([$user_id]);
 
       $message[] = 'commande passée avec succès !';
    }else{
       $message[] = 'votre panier est vide';
    }
 
 }

include '../views/caisse.php';
?>
