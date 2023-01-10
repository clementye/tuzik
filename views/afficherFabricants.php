<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=Edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Tuzik ?</title>
   <link rel="stylesheet" href="/models/style.css">
   <style>
      body {
         background-color: #EFEFEF;
      }
      table {
         margin-left: auto;
         margin-right: 10%;  
         margin-top: 0%; 
         border-collapse: collapse;
      }
      th, td{
      border: 1px solid black;
      padding: 10px;
      }
      p {
         display: flex;
         flex-direction: row;
         text-align: center;
      }
     
      img {
         margin-left: 10%;
         margin-top: 5%;

            }
   </style>
</head>

<body>
   <!-- barre de navigation ---->
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
   <parent>
   <img src="/images/luthier.png">
   <table  border="1" cellpading="7" width=50% bgcolor=#18257190>
      
      <tr>
         <th>Nom</th>
         <th>Specialite</th>
         <th>Adresse</th>
         <th>Prix</th>
      </tr>
     
   <?php 
    require_once "../models/fabricant.php";
    $fabricant = $afficher_fabricant();
    foreach ($fabricant as $fab) {
      echo '
      <tr>
      <th>'. $fab->Nom." "."</th>
      <th> ". $fab->specialite." "."</th>
      <th> ". $fab->adresse." "."</th>
      <th> ". $fab->prix." "."</th>
      </tr> ";

  }
   ?>
    </table>   
   </parent>
</body>
</html>
