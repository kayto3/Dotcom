<?PHP
include "core/promotionC.php";
$promotionC=new promotionC();
if (isset($_POST["ref"])){
	$promotionC->supprimerpromotion($_POST["ref"]);
	header('Location: afficherpromotion.php');
}

?>