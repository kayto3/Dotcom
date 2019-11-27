<?PHP
include "..entities/Reclamation.php";
include "..core/ReclamationC.php";

if (isset($_POST['id'])and isset($_POST['nom']) and isset($_POST['date'])and isset($_POST['Objet']) and isset($_POST['mail']) and isset($_POST['msg'])){
	var_dump($_GET['id']);
	var_dump($_GET['nom']);
	var_dump($_GET['date']);
	var_dump($_GET['Objet']);
	var_dump($_GET['mail']);
	var_dump($_GET['msg']);
$reclamation1=new reclamation($_POST['id'],$_POST['nom'],$_POST['date'],$_POST['Objet'],$_POST['mail'],$_POST['msg']);

//var_dump($Avis1);
$reclamation1C=new reclamationC();
$reclamation1C->ajouterReclamation($reclamation1);
header('Location: afficherReclamation.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>