<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <style>
 body {
background: url("../images/magasin-bg.jpg") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  }
.q {
    padding: 10%;
    margin-right: 35%;
    margin-left: 35%;
    background-color:hsla(0, 0%, 0%, 0.595);
}
  .texte {
    color: white;
    font-family:  Courier New, monospace;
  }
  a {
    text-decoration: none;
    color: white;
    font-weight: bold;
}

</style>
	</head>
	<body>
    <logo>
    <img src="/images/newtuzik.png" alt="logo" style="width:10.5%;height:10.5%;float:top-left;">
  </logo>
        <div class=q>
        <h0 class="texte">Êtes-vous sûr?</h0>
        <br>
        </br>
    <form action="../controllers/suppression_utilisateur.php" method="post">
			<button name="action" value="Confirmer">Oui</button>
      <a href="../controllers/espace_membres.php">Non</a>
  </body>
</html>
