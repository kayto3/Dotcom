<?PHP
include "entities/prix.php";
include "core/promotionC.php";

if (isset($_POST['$prix_initiale']) and isset($_POST['pourcentageF']) and isset($_POST['prix_finale'])){
$prix1=new prix($_POST['prix_initiale'],$_POST['pourcentageF'],$_POST['prix_finale']);
//Partie2
/*
var_dump($prix1);
}
*/
//Partie3
$prix1C=new prixC();
$prix1C->ajouterprix($prix1);
header('Location: afficherprix.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>