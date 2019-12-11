<?PHP
include "entities/promotion.php";
include "core/promotionC.php";


$valid = 1;

$path = $_FILES['photop']['name'];
$path_tmp = $_FILES['photop']['tmp_name'];
if ($path != '') {
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $file_name = basename($path, '.' . $ext);
    if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
      $valid = 0;
    }
  } else {
    $valid = 0;
  }
$ai_id=$_POST['ref'];

$final_name = 'promotion-' . $ai_id . '.' . $ext;
move_uploaded_file($path_tmp, '../product_images/' . $final_name);

if (isset($_POST['ref']) and isset($_POST['nomp']) and isset($_POST['prixi']) and isset($_POST['pourcentage'])){
	$p=$_POST['prixi'];
	 $k=$_POST['pourcentage'];
	 $pf= $p-($p*($k/100));
$promotion1=new promotion($_POST['ref'],$_POST['nomp'],$final_name,$_POST['prixi'],$_POST['pourcentage'],$pf);
//Partie2
/*
var_dump($promotion1);
}
*/
//Partie3
$promotion1C=new promotionC();
$promotion1C->ajouterpromotions($promotion1);
header('Location: promotion.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>