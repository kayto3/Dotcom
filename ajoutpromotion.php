<?PHP
include "entities/promotion.php";
include "core/promotionC.php";

if (isset($_POST['ref']) and isset($_POST['nomp']) and isset($_POST['prixi']) and isset($_POST['pourcentage']) and isset($_POST['datef'])){
$promotion1=new promotion($_POST['ref'],$_POST['nomp'],$_POST['prixi'],$_POST['pourcentage'],$_POST['datef']);
//Partie2
/*
var_dump($promotion1);
}
*/
//Partie3
$promotion1C=new promotionC();
$promotion1C->ajouterpromotions($promotion1);
header('Location: afficherpromotion.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>