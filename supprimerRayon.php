<?PHP
include "../core/RayonC.php";
$RayonC=new rayonC();
if (isset($_POST["ID_rayon"])){
	$RayonC->supprimerRayon($_POST["ID_rayon"]);
	header('Location: afficherRayon.php');?>
	<script type="text/javascript">
  $(document).ready(function(){
$('#supprimer').click(function(){

alert("Suppression avec succees");
});
  });
  </script>
    <?PHP

}

?>