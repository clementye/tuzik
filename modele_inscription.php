<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>
Page Inscription v.0.5
</title>
<style>
  body {
color:black;
background-color:black;
background-image:url("LOGOTuZik.png");
background-repeat:no-repeat;
background-position:top right;
background-position:50% 35%;
}
</style>
</head>
<body>
<form action="reponse.php" method="GET">
<br>
  Prénom :<input type="text" name="nom">
<br>
  Nom :<input type="text" name="">
<br>
  Email :<input type="text" name="age">
  <br>
  Mot de passe :<input type="text" name="age">
  <br>
  Téléphone :<input type="text" name="age">
  <br>
  Cochez si vrai : <br>
  <input type="radio" name="numMag">
  <input type="radio" name="numFab">
<p>
<input type=submit value="Envoyer">
</form>
</body>
</html>
<?php

    require('connect.php');
    $dsn="mysql:dbname=".BASE.";host=".SERVER;
    try{
      $connexion=new PDO($dsn,USER,PASSWD);
    }
    catch(PDOException $e){
      printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }

    $sql = "SELECT * FROM utilisateur";
    if(!$connexion->query($sql)) { echo "Erreur serveur. Réessayer ulterieurement.";
    } else {
    foreach ($connexion->query($sql) as $row)
      if ($row['email'] == $email){
        echo "Cet email fut déjà utilisé par un autre utilisateur. Vérifiez que l'email écrite est la bonne.";
      }
  }

    $sql="INSERT INTO utilisateur ( `Nom`, `Prenom`, `telephone`, `email`,
      `motdepasse`, `Num Magasin`, `Num Fabricant`)
       VALUES (:nom, :prenom, :telephone, :email, :mdp, :numMag, :numFab)";

    $sql->execute(array(
      ':nom' => $nom,
      ':age' => $prenom,
      ':telephone' => $telephone,
      ':email' => $email,
      ':mdp' => $mdp,
      ':numMag' => $numMag,
      ':numFab' => $numFab));

      if(!$connexion->query($sql)) echo "Erreur serveur. Réessayer ulterieurement.";
    else {
      foreach ($connexion->query($sql) as $row)
      echo $row['prenom']." ".$row['nom'].", vous avez bien été inscrit.<br/>\n";
    }
 ?>
