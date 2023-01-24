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
   
   <table  border="1" cellpading="7" width=50% style="position:absolute; font-size:large">
      
      <tr>
         <th>Nom</th>
         <th>Adresse</th>
         <th>Horaires</th>
      </tr>
     
   <?php 
    require_once "../models/magasin.php";
    $magasin = $afficher_magasin();
    foreach ($magasin as $mag) {
      echo '
      <tr>
      <th>'. $mag->Nom." "."</th>
      <th> ". $mag->adresse." "."</th>
      <th> ". $mag->horaires." "."</th>
      </tr> ";

  }
   ?>
    </table>   
   </parent>
  

</section>

<script src="../js/script.js"></script>

</body>
</html>
