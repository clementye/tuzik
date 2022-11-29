<?php

  $nom = $_GET['nom'];
  $prenom = $_GET['prenom'];
  $telephone = $_GET['tel'];
  $mdp = $_GET['mdp'];
  $email = $_GET['email'];

    require('connect.php');
    require('inscription.html');
    $dsn="mysql:dbname=".BASE.";host=".SERVER;
    try{
      $connexion=new PDO($dsn,USER,PASSWD);
    }
    catch(PDOException $e){
      printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }

    $sql = "SELECT * FROM utilisateur";
    if(!$connexion->query($sql)) echo "Erreur serveur. Réessayer ulterieurement.";
  else {
    foreach ($connexion->query($sql) as $row)
      if ($row['email'] != $email){
        echo "Cet email fut déjà utilisé par un autre utilisateur. Vérifiez que l'email écrite est la bonne.";
        header( "refresh:5;url=inscription.html");
        die();
      }
  }

    $sql="INSERT INTO utilisateur ('id', `Nom`, `Prenom`, `telephone`, `email`,
      `motdepasse`)
       VALUES ('', :nom, :prenom, :telephone, :email, :mdp)";

    $sql->execute(array(
      ':nom' => $nom,
      ':age' => $prenom,
      ':telephone' => $telephone,
      ':email' => $email,
      ':mdp' => $mdp,));

      $sql = "SELECT nom, prenom FROM utilisateur WHERE email like :email";
      if(!$connexion->query($sql)) echo "Erreur serveur. Réessayer ulterieurement.";
    else {
      foreach ($connexion->query($sql) as $row)
      echo $row['prenom']." ".$row['nom'].", vous avez bien été inscrit.<br/>\n";
      header( "refresh:5;url=.html");
      die();
    }
 ?>
