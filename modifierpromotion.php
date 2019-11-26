<HTML>
<head>
</head>
<body>
<?PHP
include "entities/promotion.php";
include "core/promotionC.php";
if (isset($_GET['ref'])){
	$promotionC=new promotionC();
    $result=1111;//$promotionC->recupererpromotion($_GET['ref']);
	foreach($result as $row){
		$ref=$row['ref'];
		$nomp=$row['nomp'];
		$prixi=$row['prixi'];
		$pourcentage=$row['pourcentage'];
		$datef=$row['datef'];
?>
<form method="POST">
<table>
<caption>Modifier promotion</caption>
<tr>
<td>ref</td>
<td><input type="text" name="ref" value="<?PHP echo $ref ?>"></td>
</tr>
<tr>
<td>nomp</td>
<td><input type="text" name="nomp" value="<?PHP echo $nomp ?>"></td>
</tr>
<tr>
<td>prixi</td>
<td><input type="text" name="prixi" value="<?PHP echo $prixi ?>"></td>
</tr>
<tr>
<td>nb heures</td>
<td><input type="date" name="pourcentage" value="<?PHP echo $pourcentage ?>"></td>
</tr>
<tr>
<td>tarif horaire</td>
<td><input type="number" name="datef" value="<?PHP echo $datef ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="ref_ini" value="<?PHP echo $_GET['ref'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$promotion=new promotion($_POST['ref'],$_POST['nomp'],$_POST['prixi'],$_POST['pourcentage'],$_POST['datef']);
	$promotionC->modifierpromotion($promotion,$_POST['ref_ini']);
	echo $_POST['ref_ini'];
	header('Location: afficherpromotion.php');
}
?>
</body>
</HTMl>