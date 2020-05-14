<?php include("includes/head.php") ?>

<body class="bg-theme bg-theme1">

<?php include_once('config/config.php')?>

<?php include_once('includes/loader.php')?>

<?php require'includes/sidebar.php' ?>

<?php include_once('includes/topbar.php');?>

<div class="clearfix"></div>
	
  	<div class="content-wrapper">
    	<div class="container-fluid">

<!--Start Dashboard Content-->
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



<!--End Dashboard Content-->
	  




    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->

	
  <?php include'includes/footer.php'?>



  <?php include'includes/colorSwitch.php'?>



   
  </div><!--End wrapper-->

  <?php include'includes/js.php'?>
  

  
</body>
</html>
