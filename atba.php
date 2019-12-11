<?PHP
include "../Core/promotionC.php";
//$produit=new ProduitInt('chaise',152,150,125,'chaise comfortable',1);
$promotion1C=new promotionC();
$listepromotion=$promotion1C->afficherpromotion();

//var_dump($listeEmployes->fetchAll());
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<body>
<a href="javascript:demoFromHTML()" class="button" style="margin-bottom:  20px;position: center;float: right;">Telecharger PDF</a>
<center>
<!--<button id="cmd" style="margin-bottom:  20px;position: center;float: right;">Telecharger PDF</button>-->
<table border="1" style="border: 2px solid black; border-collapse: collapse;" id="content">
    <caption style="margin: 5px;"><strong>Liste Des Produits en PROMO</strong></caption>
    <tr>
        <td><strong>ref</strong></td>
        <td><strong>nom</strong></td>
        <td><strong>photo produit</strong></td>
        <td><strong>prix intiale</strong></td>
        <td><strong>pourcentage</strong></td>
        <td><strong>prix finale</strong></td>
    </tr>

<?PHP
foreach($listepromotion as $row){
	?>
	<tr>
	<td><?PHP echo $row['ref']; ?></td>
	<td><?PHP echo $row['nomp']; ?></td>
	<td style="width:150px;"><img src="../product_images/<?php echo $row['photop']; ?>" alt="img description" style="width:140px;" ></td>
	<td><?PHP echo $row['prixi']; ?></td>
	<td><?PHP echo $row['pourcentage']; ?></td>
	<td><?PHP echo $row['prixf']; ?></td>
    </tr>
	<?PHP
}
?>
    <body>
    <script>
        function demoFromHTML() {
            var pdf = new jsPDF('p', 'pt', 'letter');
            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('#content')[0];

            // we support special element handlers. Register them with jQuery-style
            // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
            // There is no support for any other type of selectors
            // (class, of compound) at this time.
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector

                '#bypassme': function (element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"
                    return true
                }
            };
            margins = {
                top: 80,
                bottom: 60,
                left: 40,
                width: 522
            };
            // all coords and widths are in jsPDF instance's declared units
            // 'inches' in this case
            pdf.fromHTML(
                source, // HTML string or DOM elem ref.
                margins.left, // x coord
                margins.top, { // y coord
                    'width': margins.width, // max width of content on PDF
                    'elementHandlers': specialElementHandlers
                },

                function (dispose) {
                    // dispose: object with X, Y of the last line add to the PDF
                    //          this allow the insertion of new lines after html
                    pdf.save('Test.pdf');
                }, margins
            );
        }
    </script>

</table>
</center>
</body>


