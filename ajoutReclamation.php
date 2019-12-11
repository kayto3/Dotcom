<?PHP
include "entities/Reclamation.php";
include "core/ReclamationC.php";




//if (isset($_POST['nom']) and isset($_POST['dateR'])and isset($_POST['Objet']) and isset($_POST['mail']) and isset($_POST['msg']) ){
if (isset ($_POST['ajouter'])) {

	$targetDir = "product_images/";
	$fileName = basename($_FILES['photo']['name']);

	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$reclamation1=new reclamation($_POST['id'],$_POST['nom'],$_POST['dateR'],$_POST['photo'],$_POST['Objet'],$_POST['mail'],$_POST['msg'],$_POST['traitement']);

//var_dump($Avis1);
$reclamation1C=new reclamationC();

$reclamation1C->ajouterReclamation($reclamation1);

header('Location: reclamation.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>