<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil</title>
		<link rel="stylesheet" href="/models/style.css">
	</head>
	<body>
		<section>
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
                  <li><a href="#!">Produit</a></li>
                  <li><a href="#!">Messagerie</a></li>
                  <li><a href="/controllers/espace_membres.php">Espace Membre</a></li>
                  <li><a href="#!">Panier</a></li>
                  <li><a href="/controllers/demande.php">Ajouter un article</a></li>

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
		<?php if (isset ($confirmation)) {
			echo $confirmation;
		} ?>
		<br>
	</br>
		<h1>Bienvenu <?php echo $_SESSION["user-name"]; ?></h1>
        <p>Vous êtes bien connecté.</p>
				<a href="/controllers/deconnexion.php">Déconnexion</a><br>

	</body>
</html>
