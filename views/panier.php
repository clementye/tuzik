<?php
// Tableau pour stocker les produits dans le panier
$panier = array();

// Fonction pour ajouter un produit au panier
function ajouter_au_panier($produit_id, $produit_nom, $produit_prix) {
  global $panier;
  // Ajout du produit au tableau de produits
  $panier[] = array(
    'id' => $produit_id,
    'nom' => $produit_nom,
    'prix' => $produit_prix);
}

// Fonction pour retirer un produit du panier
function retirer_du_panier($produit_id) {
  global $panier;
  // Parcours du tableau de produits
  foreach ($panier as $key => $produit) {
    // Si l'ID du produit correspond à celui à retirer
    if ($produit['id'] == $produit_id) {
      // Suppression du produit du tableau
      unset($panier[$key]);
      break;
    }
  }
}

// Ajout de quelques produits au panier
ajouter_au_panier(1, 'test1', 9.99);
ajouter_au_panier(2, 'test2', 19.99);
ajouter_au_panier(3, 'test3', 29.99);

// Affichage du panier
echo '<h1>Panier</h1>';
echo '<ul>';
foreach ($panier as $produit) {
  echo '<li>' . $produit['nom'] . ' (' . $produit['prix'] . '€)';
  echo ' <a href="?remove=' . $produit['id'] . '">Retirer du panier</a></li>';
}
echo '</ul>';

// Si un produit a été retiré du panier
if (isset($_GET['remove'])) {
// Retrait du produit du panier
retirer_du_panier($_GET['remove']);
}

?>
<html>
<a href="/controllers/accueil.php">Retour</a>
</html>