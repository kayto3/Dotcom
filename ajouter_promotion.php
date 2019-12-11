<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Product List</h2>
      	</div>
      </div>
  <section id="main-content">
    <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Ajouter Promotion</h3>
      <!-- Ajouter Promotion -->
      <div class="row mt">
        <div class="col-lg-12">
          <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
            <form class="form-horizontal style-form" method="post">
              <div class="form-group">
                <label for="cref" class="col-sm-2 col-sm-2 control-label">Reference Produit</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="crefpro" name="refpro" minlength="1" type="text" required />
                </div>
              </div>
              <br>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-theme" type="submit" name="ajouter">Rechercher</button>
                  <button class="btn btn-theme04" type="button">Cancel</button>
<?php
                  if (isset($_POST['ajouter'])) {
                    include "core/promotionC.php";
                    include "entities/promotion.php";
                    if (1 == 1) {
                      $refpro = $_POST['refpro'];
                      $promotionC = new promotionC();
                      $result = $promotionC->recupererpro($refpro);
                      $total = $result->rowCount();
                      if ($total == 0) {
                        ?>
                        <script>
                          alert("Produit non disponible");
                        </script>
                
<?php
} else {
  foreach($result as $row) {
    $nompro= $row['product_title'];
    $prixpro = $row['product_price'];
}
?>
Produit disponible <a href="ajouter_promotion2.php?refpro=<?php echo $refpro?>&amp;nompro=<?php echo $nompro?>&amp;prixpro=<?php echo $prixpro?>"> Ajouter Promotion</a></li>
<?php
}
}
}
?>
                </div>
              </div>
          </div>
        </div>
        <!-- col-lg-12-->
      </div>
      <!-- /col-lg-12 -->
      <!-- /row -->
    </section>
    <!-- /wrapper -->
  </section>



  <?php include_once("./templates/footer.php"); ?>

</form>