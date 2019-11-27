<?PHP
include "../entites/produit.php";
include "../core/ProduitC.php";

if (isset($_POST['nom']) and isset($_POST['prix'])){
$produit1=new produit($_POST['nom'],$_POST['prix']);
//Partie2
/*
var_dump($produit1);
}
*/
//Partie3
$Produit1C=new ProduitC();
$Produit1C->ajouterproduit($produit1);
header('Location: afficherproduit.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>