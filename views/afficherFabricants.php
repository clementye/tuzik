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
<body>

<?php include '../models/header.php'; ?>

<section class="">
<parent>

   <table  border="1" cellpading="7" width="60%" style="margin: 0 auto; font-size:large">

      <tr>
         <th>Nom</th>
         <th>Specialité</th>
         <th>Adresse</th>
         <th>Tarif</th>
         <th>Contact</th>
      </tr>

   <?php
    require_once "../models/fabricant.php";
    $fabricant = $afficher_fabricant();
    foreach ($fabricant as $fab) {
      echo '
      <tr>
      <th>'. $fab->Nom." "."</th>
      <th> ". $fab->specialite." "."</th>
      <th> ". $fab->adresse." "."</th>
      <th> ". $fab->prix."€/H"."</th>
      ";
      if (isset($_SESSION["user-id"])){
        echo "<th> ".$fab->email."</th></tr> ";
      } else {
        echo "<th> Veuillez-vous connecter</th></tr> ";
      };

  }
   ?>
    </table>
   </parent>


</section>

<script src="../js/script.js"></script>

</body>
</html>
