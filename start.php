<?PHP
include "../entites/rayon.php";
include "../core/RayonC.php";
$rayon=new Rayon(75757575,'BEN Ahmed');
$RayonC=new rayonC();
$RayonC->afficherRayon($rayon);
echo "****************";
echo "<br>";
echo "ID_rayon:".$rayon->getID_rayon();
echo "<br>";
echo "nom:".$rayon->getNom();
echo "<br>";


?>