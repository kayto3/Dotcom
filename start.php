<?PHP
include "../entites/produit.php";
include "../core/ProduitC.php";
$produit=new Produit(75757575,'BEN Ahmed','450 dinars');
$ProduitC=new produitC();
$ProduitC->afficherProduit($produit);
echo "****************";
echo "<br>";
echo "ID_produit:".$produit->getID_produit();
echo "<br>";
echo "nom:".$produit->getNom();
echo "<br>";
echo "prix:".$produit->getPrix();
echo "<br>";


?>