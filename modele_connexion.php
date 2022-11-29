<?php

  $mdp = $_GET['mdp'];
  $email = $_GET['email'];

    require('connect.php');
    require('connexion.html');
    $dsn="mysql:dbname=".BASE.";host=".SERVER;
    try{
      $connexion=new PDO($dsn,USER,PASSWD);
    }
    catch(PDOException $e){
      printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }

    $sql = "SELECT * FROM utilisateur WHERE email='$email'";
    if(!$connexion->query($sql)) echo "Erreur serveur. Réessayer ulterieurement.";
  else {
    foreach ($connexion->query($sql) as $row)
      if ($row['motdepase'] != $mdp){
        echo "Mot de passe ou email incorrecte. Vérifiez l'écriture";
        header( "refresh:5;url=connexion.html" );
        die();
      } else {
        session_start();
        $_SESSION['login'] =$email;
        header( "refresh:5;url=.html");
        die();
      }}

 ?>
