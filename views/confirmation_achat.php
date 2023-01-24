<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>commandes</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../models/header.php'; ?>


<?php if(isset($confirmation)){
  echo $confirmation."</br>";
  echo "Nom :".$facture->Nom."          Session :".$facture->Session."</br>";
  echo "Prénom :".$facture->Prenom."        Adresse de livraison : ".$facture->Shipping."</br>";
  echo "Téléphone :".$facture->Tèl."        Total : ".$facture->GrandTotal."</br>";
  echo "Email :".$facture->Email."        Date de facturation : ".$facture->DateCo."</br>";
} else {
  echo "Problème lors du paiement.</br> Une erreur de connexion avec le serveur est survenue.</br> Veuillez réessayer plus tard.</br>";
}
  ?>

  <a href="../controllers/commandes.php">Voir mes commandes</a>
  <a href="../controllers/accueil.php">Retourner à l'accueil</a>

  <script src="../js/script.js"></script>

</body>
</html>
