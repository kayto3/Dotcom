<?php 
ob_start();
?>
<?php session_start(); ?>

<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
    <div class="row">

        <?php include "./templates/sidebar.php"; ?>
        <?PHP
        include "../core/ReclamationC.php";
        $reclamation1C = new reclamationC();
        $listereclamation = $reclamation1C->afficherReclamations();

        //var_dump($listepromotions->fetchAll());
        ?>
        <div class="row">
            <div class="col-10">
                <h2>Liste des réclamations</h2>
            </div>
            <div class="col-2">
                <a  href="ajouter_reponse.php" class="btn btn-primary btn-sm">Ajouter une réponse</a>
            </div>
        </div>

        <div class="table-responsive">
 <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom Utilisateur</th>
                        <th>Date de reclamation </th>
                        <th>Photo</th>
                        <th>Objet</th>
                        <th>Mail</th>
                        <th>Message</th>
                        <th>Traitement </th>
                    </tr>
                            
                </thead>
                                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Chercher reclamations.." title="Type in a name">
                                <button onclick="sortTable()">Sort</button>

                <tbody id="myTable" >
                <?PHP
                  $i = 0;
                  foreach ($listereclamation as $row) {
                    $i++;

                    ?>
                    <tr>
                      <td>
                        <a href="basic_table.html#"><?PHP echo $row['id']; ?></a>
                      </td>
                      <td class="hidden-phone"><?PHP echo $row['nom']; ?>
                        
                      </td>
                      
                      <td><?PHP echo $row['dateR']; ?></td>
                      <td style="width:150px;"><img src="../product_images/<?php echo $row['photo']; ?>" alt="img description" style="width:140px;" ></td>
                      <td><span class="label label-warning label-mini"><?PHP echo $row['Objet']; ?></span></td>
                      <td class="hidden-phone"><?PHP echo $row['mail']; ?></td>
                      <td class="hidden-phone"><?PHP echo $row['msg']; ?></td>
                      <td class="hidden-phone"><?PHP echo $row['traitement']; ?></td>
                      <td>

                        <button class="btn btn-primary btn-xs" name="kk" data-toggle="modal" data-target="#myModal" <?php $id = $row['id']; ?>><i class="fa fa-pencil"></i>MOD</button>
                        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="idd<?php echo $i ?>">

                        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                        <form style="display: inline;" method="POST" action="supprimerreclamation.php">
                          <button class="btn btn-danger btn-xs" name="supprimer"><i class="fa fa-trash-o"></i>SUPP</button>
                          <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                        </form>
                        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="idd<?php echo $i ?>">
                        
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
            

<button onclick="fonction()">Imprimer cette page</button>


<script>
function fonction() {
  window.print();
}
</script>
</br>
<br>
            <!-- <div class="col-2">
                <a  href="testmail.php" class="btn btn-primary btn-sm">SEND MAIL</a>
            </div> -->
            <br>
             


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
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
                <?PHP
                include "../entities/Reclamation.php";
                if (1 == 1) {
                  $reclamationC = new reclamationC();
                  $result = $reclamationC->recupererReclamation($id);
                  $total = $result->rowCount();
                  ?>
                  <input class=" form-control" id="cref" name="traitement" minlength="2" type="hidden" value="<?PHP echo $traitement?>" required />
                  <?php
                    foreach ($result as $row) {
                     
                      $traitement = $row['traitement'];
                      ?>
                    <form method="POST">
                      <p>Modifier le traitement d'une reclamation</p>
                      <div style="color:black;" class="row mt">
                        <div class="col-lg-12">
                          <h4><i class="fa fa-angle-right"></i>Modifier Traitement</h4>
                          <div class="form-panel">
                            <div class=" form">
                              <form class="cmxform form-horizontal style-form" id="commentForm" method="get" action="">
                                <div class="form-group ">
                                  <label for="cenom" class="control-label col-lg-2"></label>
                                  <div class="col-lg-10">
                                    <input class="form-control " id="cnom" name="traitement" type="text" value="<?PHP echo $traitement ?>" required />
                                  </div>
                                </div>
                                
                                <td><input type="hidden" name="ref_ini" value="<?PHP echo $traitement; ?>"></td>

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
                      $reclamation = new reclamation($_POST['traitement']);
                      $promotionC->modifierReclamation1($reclamation, $_POST['id_ini']);
                      echo $_POST['traitement_ini'];
                      header("location:afficherReclamation.php");
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


<?php include_once("./templates/footer.php"); ?>
