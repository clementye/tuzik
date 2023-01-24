<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Liste des fabricants</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>

<?php include '../models/header.php'; ?>

<section class="">
<parent>

   <table  border="1" cellpading="5" width=85% style="margin-left:5%; position:center; font-size:large">

      <tr>
         <th>Nom</th>
         <th>Niveau</th>
         <th>Adresse</th>
         <th>Instrument</th>
         <th>À propos de moi</th>
         <th>Contact</th>
      </tr>

   <?php
    require_once "../models/musicien.php";
    $musicien = $afficher_musicien();
    foreach ($musicien as $mus) {
      echo '
      <tr>
      <th>'. $mus->Nom." "."</th>
      <th> ". $mus->niveau." "."</th>
      <th> ". $mus->adresse." "."</th>
      <th> ". $mus->instrument." "."</th>
      <th> ". $mus->bio." "."</th>
      <th>";
      if (isset($_SESSION["user-id"])){
        echo " ".$mus->email."</tr> ";
      } else {
        echo "<th> Veuillez-vous connecter</th></tr> ";
      };
  }

   ?>
    </table>
   </parent>
</body>
</html>
