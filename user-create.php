<!-- head including -->
	<?php include("includes/head.php") ?>

	<body class="bg-theme bg-theme1">

	<?php include_once('config/config.php')?>

	<?php include_once('includes/loader.php')?>

	<?php require'includes/sidebar.php' ?>

	<?php include_once('includes/topbar.php');?>
<!-- End head including -->









<div class="clearfix"></div>
	
  	<div class="content-wrapper">
    	<div class="container-fluid">

		<?php
				logged_only();
			
				if (!empty($_SESSION['flash'])) { ?>
					
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">×</font>
							</font>
						</button>
						<div class="alert-message">
							<span>
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Connexion Reussie! <br></font>
								</font>
							</span>
						</div>
					</div>
				
				<?php } $_SESSION['flash'] = null; 
		?>


<!--Start User-Create Content-->



<div class="row m-3">

	<div class="col-4">
		<h4 class="text-left">Utilisateurs → Nouveau</h4>	
	</div>

</div>		

<div class="row m-3">

	<div class="col-lg-8">
        <div class="card">
        <div class="card-body">




            <form>
                    <!-- name =  -->
               <div class="form-group" method="POST" >
                    <label for="input-1">Nom</label>
                    <input type="text" name="name" class="form-control" id="input-1" placeholder="Entrez le nom">
                </div>

                    <!-- name =  -->
                <div class="form-group">
                    <label for="input-2">Email</label>
                    <input type="text" name="email" class="form-control" id="input-2" placeholder="Entrez l'adresse email">
                </div>

                    <!-- name =  -->
                <div class="form-group">
                    <label for="input-3">Mobile</label>
                    <input type="number" name="tel" min="0" maxlength="8" minlength="8" class="form-control" id="input-3" placeholder="Entrez le numéro de mobile">
                </div>

                    <!-- name =  -->
                <div class="form-group">
                    <label for="input-4">Mot de passe</label>
                    <input type="text" name="password" class="form-control" id="input-4" placeholder="Entrer le mot de passe">
                </div>

                    <!-- name =  -->
                <div class="form-group">
                    <button type="submit" name="valider" class="btn btn-light px-5">Inscrire</button>
                </div>
            </form>




        </div>
        </div>
    </div>
</div>










<!--End Dashboard Content-->
    </div><!--End container-fluid-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
  <?php include'includes/footer.php'?>
   
</div><!--End wrapper-->











  <?php include'includes/js.php'?>
  

  
</body>
</html>
