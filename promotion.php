<?php session_start(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
    <div class="row">

        <?php include "./templates/sidebar.php"; ?>
        <?PHP
        include "core/promotionC.php";
        $promotion1C = new promotionC();
        $listepromotion = $promotion1C->afficherpromotion();

        //var_dump($listepromotions->fetchAll());
        ?>
        <div class="row">
            <div class="col-10">
                <h2>Product List</h2>
            </div>
            <div class="col-2">
                <a  href="Ajouter_promotion.php" class="btn btn-primary btn-sm">Ajouter Promotion</a>
            </div>
        </div>

        <div class="table-responsive">
                          <table>
                            <tr>
                               <td><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"></td> 
                               
                             </tr>
                             </table>
 <table cellpadding="2" cellspacing="0" border="2;" class="display table table-bordered" id="myTable2">             
    <thead>
                    <tr>
                        <th onclick="sortTable(0)">Reference</th>
                        <th onclick="sortTable(1)">Nom Produit</th>
                        <th> Photo produit</th>
                        <th onclick="sortTable(2)">Prix initiale</th>
                        <th onclick="sortTable(3)">Pourcentage</th>
                        <th onclick="sortTable(4)">Prix finale</th>
                        <th>Action</th>
                    </tr>
                            
                </thead>


                <tbody id="myTable" >
                <?PHP
                  $i = 0;
                  foreach ($listepromotion as $row) {
                    $i++;

                    ?>
                    <tr>
                      <td>
                        <a href="basic_table.html#"><?PHP echo $row['ref']; ?></a>
                      </td>
                      <td class="hidden-phone"><?PHP echo $row['nomp']; ?>
                        
                      </td>
                      <td style="width:150px;"><img src="../product_images/<?php echo $row['photop']; ?>" alt="img description" style="width:140px;" ></td>
                      <td><?PHP echo $row['prixi']; ?></td>
                      <td><span class="label label-warning label-mini"><?PHP echo $row['pourcentage']; ?>%</span></td>
                      <td class="hidden-phone"><?PHP echo $row['prixf']; ?></td>
                      <td>

                        <button class="btn btn-primary btn-xs" name="kk" data-toggle="modal" data-target="#myModal" <?php $ref = $row['ref']; ?>><i class="fa fa-pencil"></i>MOD</button>
                        <input type="hidden" value="<?PHP echo $row['ref']; ?>" name="reff<?php echo $i ?>">

                        <input type="hidden" value="<?PHP echo $row['ref']; ?>" name="ref">
                        <form style="display: inline;" method="POST" action="supprimerpromotion.php">
                          <button class="btn btn-danger btn-xs" name="supprimer"><i class="fa fa-trash-o"></i>SUPP</button>
                          <input type="hidden" value="<?PHP echo $row['ref']; ?>" name="ref">
                        </form>
                        <input type="hidden" value="<?PHP echo $row['ref']; ?>" name="reff<?php echo $i ?>">
                        
                      </td>
                    </tr>
                  <?PHP
                    }

                    ?>
                </tbody>
            </table>
        </div>
         <script>
              function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                console.log(tr);
                for (i = 0; i < tr.length; i++) {
                  td = tr[i].getElementsByTagName("td")[1];
                  console.log(td);
                  if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  }
                }
              }

              function sortTable() {
                var table, rows, switching, i, x, y, shouldSwitch;
                table = document.getElementById("myTable");
                switching = true;
                /*Make a loop that will continue until
                no switching has been done:*/
                while (switching) {
                  //start by saying: no switching is done:
                  switching = false;
                  rows = table.rows;
                  /*Loop through all table rows (except the
                  first, which contains table headers):*/
                  for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("td")[1];
                    y = rows[i + 1].getElementsByTagName("td")[1];
                    //check if the two rows should switch place:
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                      //if so, mark as a switch and break the loop:
                      shouldSwitch = true;
                      break;
                    }
                  }
                  if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                  }
                }
              }
            </script>
<table>
  <tr>
    <td>
<p>Translate this page:</p>

<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<br>
</td>
<td>
            <div class="col-2">
                <a  href="testmail.php" class="btn btn-primary btn-sm">MAIL</a>
            </div>
            </td>
            <td>
                         <div class="col-2">
                <a  href="generate_pdf.php" class="btn btn-primary btn-sm">PDF</a>
            </div>
            </td>
            </tr>
</table>
<div id="piechart" style="width: 1000px; height: 300px;"></div>

        </main>

    </div>

</div>





<!-- Edit Product Modal start -->

 <!-- Modal content-->
 <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <?PHP
                include "entities/promotion.php";
                if (1 == 1) {
                  $promotionC = new promotionC();
                  $result = $promotionC->recupererpromotion($ref);
                  $total = $result->rowCount();
                  ?>
                  <input class=" form-control" id="cref" name="ref" minlength="2" type="hidden" value="<?PHP echo $ref ?>" required />
                  <?php
                    foreach ($result as $row) {
                      $ref = $row['ref'];
                      $nomp = $row['nomp'];
                      $prixi = $row['prixi'];
                      $pourcentage = $row['pourcentage'];
                      $prixf = $row['prixf'];
                      ?>
                    <form method="POST">
                      <p>Modifier promotion</p>
                      <div style="color:black;" class="row mt">
                        <div class="col-lg-12">
                          <h4><i class="fa fa-angle-right"></i>Ajouter Promotion</h4>
                          <div class="form-panel">
                            <div class=" form">
                              <form class="cmxform form-horizontal style-form" id="commentForm" method="get" action="">
                                <div class="form-group ">
                                  <label for="cref" class="control-label col-lg-2">Reference Produit</label>
                                  <div class="col-lg-10">
                                    <input class=" form-control" id="cref" name="ref" minlength="2" type="text" value="<?PHP echo $ref ?>" required />
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label for="cref" class="control-label col-lg-2">PHOTO</label>
                                  <div class="col-lg-10">
                                  <img  src="../product_images/<?php echo $row['photop']; ?>" alt="img description" style="width:140px;" >
                                  </div>
                                </div>
                                
                                <div class="form-group ">
                                  <label for="cenom" class="control-label col-lg-2">Nom Produit</label>
                                  <div class="col-lg-10">
                                    <input class="form-control " id="cnom" name="nomp" type="text" value="<?PHP echo $nomp ?>" required />
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label for="prixi" class="control-label col-lg-2">Prix Avant Promotion</label>
                                  <div class="col-12">
                                    <input class="form-control " id="cprixi" type="number" name="prixi" value="<?PHP echo $prixi ?>" />
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label for="pourcentage" class="control-label col-lg-2">Pourcentage (%)</label>
                                  <div class="col-12">
                                    <input class="form-control " id="cpourcentage" type="number" name="pourcentage" value="<?PHP echo $pourcentage ?>" />
                                  </div>
                                </div>
                                <td><input type="hidden" name="ref_ini" value="<?PHP echo $ref; ?>"></td>

                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-theme" type="submit" name="modifier">Modifier</button>
                                    <button class="btn btn-theme04" type="button">Cancel</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                    <?PHP
                      }
                    }
                    if (isset($_POST['modifier'])) {
                      $ph= 'promotion-40023559.jpg';
                      $p = $_POST['prixi'];
                      $k = $_POST['pourcentage'];
                      $pf = $p - ($p * ($k / 100));
                      $promotion = new promotion($_POST['ref'], $_POST['nomp'],$ph,$_POST['prixi'], $_POST['pourcentage'], $pf);
                      $promotionC->modifierpromotion($promotion, $_POST['ref_ini']);
                      echo $_POST['ref_ini'];
                      header("location:promotion.php");
                      ob_end_flush();
                    }
                    ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
              </div>

            </div>
          </div>

        </div>
      </div>
<!-- Edit Product Modal end -->




  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
    <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>

<?php  
 $connect = mysqli_connect("localhost", "root", "", "khanstore");  
 $query = "
SELECT promotion.pourcentage as types, count(pourcentage)  AS somme FROM promotion group by pourcentage";  
 $result = mysqli_query($connect, $query);  
 ?>  
 


<script>
$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('.table tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script>  
           
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['types', 'somme'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["types"]."', ".$row["somme"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      
                      is3D:true,  
                       pieHole: 0.4 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw (data, options);  
           }  
</script>


<script>

    function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable2");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

<?php include_once("./templates/footer.php"); ?>