<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil</title>
		<link rel="stylesheet" href="/models/style.css">
      <style>
         body {
            background-color: #EFEFEF;}
         text {
            display: flex;
            flex-direction: column;
          text-align: center;
         }
      </style>
	</head>
	<body>
		<section style="background-color: #FFFFFF;">
      <nav>
         <div class="nav-bar">
            <!--- logo --->
            <div class="logo">
               <img src="/images/newtuzik.png" alt="" />
            </div>
            <!---- barre de navigation---->
            <div class="menu-bar">
               <ul id="menu-items">
               <li><a href="/views/accueil.php">Accueil</a></li>
                  <li><a href="/controllers/afficherFabricants">Fabricants</a></li>
                  <li><a href="#!">Messagerie</a></li>
                  <li><a href="/controllers/espace_membres.php">Espace Membre</a></li>
                  <li><a href="/controllers/panier.php">Panier</a></li>
                  <li><a href="/views/pageDemande.php">Ajouter un article</a></li>

               </ul>
            </div>
            <!--- Barre de recherche ---->
            <div class="search-bar">
               <img src="/images/search-icon.jpg" alt="">
               <input type="search" placeholder="Recherche">
            </div>
         </div>
      </nav>
   </section>
	<text>
   <br>
	</br>
		<h1>Espace Personnel</h1>
		<h1>Bienvenue <?php echo $_SESSION["user-name"]; ?> </h1>
		<?php echo "Vous avez un profil ".$_SESSION["user-statue"] ?> 
				<a href="/views/modifier_utilisateur.php">Modifier compte</a><br>
				<a href="/views/fabricant.php">Profil de fabriquant</a><br>
				<a href="/views/inscription_magasin.php">Enregistrer un magasin</a><br>
				<a href="/controllers/deconnexion.php">Déconnexion</a><br>
            <br>
	</br>
            <?php if (isset ($confirmation)) {
			echo $confirmation;
		} ?>
   </text>
	</body>
</html>
