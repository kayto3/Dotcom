<?PHP
include "../core/ProduitC.php";
$ProduitC=new produitC();
if (isset($_POST["ID_produit"])){
	$ProduitC->supprimerProduit($_POST["ID_produit"]);
	header('Location: afficherProduit.php'); ?>
	
	
	
	<script type="text/javascript">
  $(document).ready(function(){
$('#supp').click(function(){

alert("Suppression avec succees");
});
  });
  </script>
  <?PHP
}

?>