<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=Edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Tuzik ?</title>
   <link rel="stylesheet" href="/models/style.css">
</head>

<body>
   <!-- barre de navigation ---->
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
                  <li><a href="/controllers/afficherFabricants.php">Fabricants</a></li>
                  <li><a href="#!">Messagerie</a></li>
                  <li><a href="/controllers/espace_membres.php">Espace Membre</a></li>
                  <li><a href="/controllers/panier.php">Panier</a></li>
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
   
   //afficher le fichier /models/fabricant.php
    <?php 
    require_once "../models/fabricant.php";
    $fabricant = $afficher_fabricant();
    var_dump($fabricant);
    foreach ((array) $fabricant as $fab) {
        echo "$fab";
    }
    ?>

</body>
</html>

