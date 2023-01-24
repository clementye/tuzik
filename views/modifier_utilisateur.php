<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
         body {
            background-color: #EFEFEF;}
      </style>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  <?php include '../models/header.php'; ?>
      <logo>
      <!--<img src="/images/newtuzik.png" alt="logo" style="width:20%;height:20%;">
    </logo>
          <div class=l>-->
          <?php
          session_start();
           ?>
      <form action="/controllers/modifier_utilisateur.php" method="post" style="font-size:medium; margin-left:5%; margin-top:5%">
        <?php if (isset ($erreur)) {
          echo $erreur;
          echo "<br>";
        } ?>
              <h1 class="texte">Modifier information utilisateur</h1><br>
        <div class="texte"><label for="nom">Nom :</label>
        <input type="nom" id="nom" name="nom" /></div>
        <br />
        <div class="texte"><label for="prenom">Prénom :</label>
        <input type="prenom" id="prenom" name="prenom" /></div>
        <br />
        <div class="texte"><label for="email" value="<?php echo $_SESSION["user-email"]; ?>">Email :</label>
        <input type="email" id="email" name="email" required/></div>
        <br />
        <div class="texte"><label for="telephone">Téléphone :</label>
        <input type="telephone" id="telephone" name="telephone" /></div>
        <br />
        <div class="texte"><label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required/></div>
        <br />
        <div class="texte"><label for="newPassword">Nouveau mot de passe :</label>
        <input type="newPassword" id="newPassword" name="newPassword" /></div>
        <br />
        <button name="action" value="change" style="font-size:medium; color:blue" >Enregistrer les modifications</button>
        <br />
        <a href="/controllers/espace_membres.php">Retour</a>
      </form>
      </div>
  </body>
</html>
