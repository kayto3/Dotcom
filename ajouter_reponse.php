<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Reclamations</h2>
      	</div>
      </div>
  <section id="main-content">
    <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Ajouter une réponse</h3>
      <!-- Ajouter Promotion -->
      <div class="row mt">
        <div class="col-lg-12">
          <div class="form-panel">
            <form class="form-horizontal style-form" method="post">
              <div class="form-group">
                <label for="cref" class="col-sm-2 col-sm-2 control-label">Saisissez le mail </label>

                <div class="col-lg-10">
                  <input class=" form-control" id="crefpro" name="refpro" minlength="1" type="text" required />
                </div>
              </br>
              <label for="cref" class="col-sm-2 col-sm-2 control-label">Réponse </label>
                <div class="col-lg-10">
                  <input class=" form-control" id="crefpro" name="refpro" minlength="1" type="text" required />
                </div>
              </div>
              <br>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button href="mail.php" class="btn btn-theme" type="submit" name="ajouter">Envoyer</button>
                  <button class="btn btn-theme04" type="button">Annuler</button>

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