
<?PHP
include "../core/ReclamationC.php";

$reclamationC=new reclamationC();
if (isset($_POST["supprimer"])){
?>

<?PHP
	$reclamationC->supprimerReclamation($_POST["id"]);
	header('Location: afficherReclamation.php');
}

?>
