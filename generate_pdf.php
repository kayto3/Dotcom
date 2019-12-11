
<?php
//include connection file 
//include_once("../config.php");
include_once('pdf/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   // $this->Image('C:/wamp64/www/LSM/front/views/img/logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'LISTE DES PRODUITS EN PROMO',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$dbConnection = mysqli_connect('localhost', 'root', '', 'khanstore');

$query  = "SELECT * FROM promotion";
$result = mysqli_query($dbConnection, $query);
$e=0;
$i=0;
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
if (mysqli_num_rows($result) > 0) {
    $pdf->Cell(30,10,"Reference",1,0);
    $pdf->Cell(40,10,"Nom Produit",1,0);
    $pdf->Cell(40,10,"Prix Initile",1,0);
    $pdf->Cell(30,10,"Pourcentage",1,0);
    $pdf->Cell(40,10,"Prix Finale",1,1);
  
  
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $ref = $row['ref']; 
          $nomp = $row['nomp'];
          $prixi = $row['prixi'];
          $pourcentage=$row['pourcentage'];
          $prixf=$row['prixf'];
          
          if($e==0)
          {
  
          $pdf->Cell(30,10,"{$ref} ",1,0); 
          $pdf->Cell(40,10,"{$nomp} ",1,0);
          $pdf->Cell(40,10,"{$prixi} ",1,0);
          $pdf->Cell(30,10,"{$pourcentage} ",1,0);
          $pdf->Cell(40,10,"{$prixf} ",1,1);
  
  
          }
  
  
  
      } }
$pdf->Output();
?>