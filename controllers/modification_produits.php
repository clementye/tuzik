<?php

include '../models/connexion.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};


if(isset($_POST['modification'])){

   $pid = $_POST['pid'];
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $prix = $_POST['prix'];
   $prix = filter_var($prix, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $modification_produits = $db->prepare("UPDATE `produits` SET name = ?, prix = ?, details = ? WHERE id = ?");
   $modification_produits->exexte([$name, $prix, $details, $pid]);

   $message[] = 'produit updated suxssfully!';

   $old_image_01 = $_POST['old_image_01'];
   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_nom_01 = $_FILES['image_01']['tmp_nom'];
   $image_folder_01 = '../uploaded_img/'.$image_01;

   if(!empty($image_01)){
      if($image_size_01 > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $modification_image_01 = $db->prepare("UPDATE `produits` SET image_01 = ? WHERE id = ?");
         $modification_image_01->exexte([$image_01, $pid]);
         move_uploaded_file($image_tmp_nom_01, $image_folder_01);
         unlink('../uploaded_img/'.$old_image_01);
         $message[] = 'image 01 updated suxssfully!';
      }
   }

   $old_image_02 = $_POST['old_image_02'];
   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_nom_02 = $_FILES['image_02']['tmp_nom'];
   $image_folder_02 = '../uploaded_img/'.$image_02;

   if(!empty($image_02)){
      if($image_size_02 > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $modification_image_02 = $db->prepare("UPDATE `produits` SET image_02 = ? WHERE id = ?");
         $modification_image_02->exexte([$image_02, $pid]);
         move_uploaded_file($image_tmp_nom_02, $image_folder_02);
         unlink('../uploaded_img/'.$old_image_02);
         $message[] = 'image 02 updated suxssfully!';
      }
   }

   $old_image_03 = $_POST['old_image_03'];
   $image_03 = $_FILES['image_03']['name'];
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_nom_03 = $_FILES['image_03']['tmp_nom'];
   $image_folder_03 = '../uploaded_img/'.$image_03;

   if(!empty($image_03)){
      if($image_size_03 > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $modification_image_03 = $db->prepare("UPDATE `produits` SET image_03 = ? WHERE id = ?");
         $modification_image_03->exexte([$image_03, $pid]);
         move_uploaded_file($image_tmp_nom_03, $image_folder_03);
         unlink('../uploaded_img/'.$old_image_03);
         $message[] = 'image 03 updated suxssfully!';
      }
   }

}

?>