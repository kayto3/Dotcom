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

    <form method="POST" class="form-horizontal style-form" enctype="multipart/form-data" action="ajoutpromotion.php?id=<?php if (isset($_POST['ajouter'])) {
                                                                                                                          $pourcentage = $_POST['pourcentage'];
                                                                                                                          echo ("aa" + $_POST['pourcentage']);
                                                                                                                        } //echo $_POST['pourcentage'];
                                                                                                                        ?>">
      <section id="main-content">
        <section class="wrapper">
          <h3><i class="fa fa-angle-right"></i> Ajouter Promotion</h3>
          <!-- Ajouter Promotion -->
          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>

                <div class="form-group ">
                  <label for="cenom" class="control-label col-lg-2">Nom Produit</label>
                  <div class="col-lg-10">
                    <input class="form-control " id="cprixi" type="hidden" value="<?php echo $_REQUEST['refpro'] ?>" name="ref" />
                    <input class="form-control " id="cnom" name="nomp" minlength="4" value="<?php echo $_REQUEST['nompro'] ?>" type="text" required />
                  </div>
                </div>
                <div class="form-group form-row">
                  <label for="" class="col-sm-2 form-label-group">Photo <span>*</span></label>
                  <div class="col-sm-9" style="padding-top:5px">
                    <input type="file" name="photop">(Only jpg, jpeg, gif and png are allowed)
                  </div>
                </div>
                <div class="form-group ">
                  <label for="prixi" class="control-label col-lg-2">Prix Avant Promotion</label>
                  <div class="col-lg-2">
                    <input class="form-control " id="cprixi" type="number" value="<?php echo $_REQUEST['prixpro'] ?>" name="prixi" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="pourcentage" class="control-label col-lg-2">Pourcentage (%)</label>
                  <div class="col-lg-2">
                    <input class="form-control " id="cpourcentage" type="number" name="pourcentage" />

                  </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit" name="ajouter">Ajouter</button>
                    <button class="btn btn-theme04" type="submit">Cancel</button>
                  </div>
                </div>
                <?php
                ?>
                <!-- col-lg-12-->
              </div>
              <!-- /col-lg-12 -->
            </div>
          </div>
        </section>
      </section>
  </div>

  <?php include_once("./templates/footer.php"); ?>