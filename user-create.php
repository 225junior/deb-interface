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

	<div class="col-4 offset-3">
		<a class="btn btn-light" href="models/user/create.php">Ajouter un nouvel Utilisateur</a>		
	</div>
</div>		

<div class="row m-3">

	<div class="col-lg-6">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Forme verticale</font></font></div>
           <hr>
            <form>
           <div class="form-group">
            <label for="input-1">Nom</font></font></label>
            <input type="text" class="form-control" id="input-1" placeholder="Entrez votre nom">
           </div>
           <div class="form-group">
            <label for="input-2">Email</font></font></label>
            <input type="text" class="form-control" id="input-2" placeholder="Entrez votre adresse email">
           </div>
           <div class="form-group">
            <label for="input-3">Mobile</font></font></label>
            <input type="text" class="form-control" id="input-3" placeholder="Entrez votre numéro de mobile">
           </div>
           <div class="form-group">
            <label for="input-4">Mot de passe</font></font></label>
            <input type="text" class="form-control" id="input-4" placeholder="Entrer le mot de passe">
           </div>
           <div class="form-group">
            <label for="input-5">Confirmez le mot de passe</font></font></label>
            <input type="text" class="form-control" id="input-5" placeholder="Confirmez le mot de passe">
           </div>
           <div class="form-group py-2">
             <div class="icheck-material-white">
            <input type="checkbox" id="user-checkbox1" checked="">
            <label for="user-checkbox1">J'accepte les termes et conditions</font></font></label>
            </div>
           </div>
           <div class="form-group">
            <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i> S'inscrire</font></font></button>
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
