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


<!--Start User Content-->



<div class="row m-3">

	<div class="col-3">
		<h4 class="text-left">Utilisateurs</h4>	
	</div>

	<div class="col-4 offset-4">
		<a class="btn btn-light" href="user-create.php">Ajouter un nouvel Utilisateur</a>		
	</div>
</div>		



<div class="row">
		<div class="col-12 col-lg-12">
			<div class="card">
				<div class="card-header">5 Derniers Ajouts</div>
				<div class="table-responsive">
					<table class="table align-items-center table-flush table-borderless">
						<thead>
							<tr>
								<th width="10%">#</th>
								<th width="20%">Nom</th>
								<th width="25%">Prenoms</th>
								<th width="10%">Amount</th>
								<th width="10%">Date</th>
								<th width="25%"></th>
							</tr>
						</thead>
						<tbody>
						
								<tr>
									<td>26</td>
									<td>baba</td>
									<td>baba</td>
									<td>baba</td>
									<td>25/10/2020</td>
									<td>
										<a class="btn btn-danger">Supprimer</a>
										<a class="btn btn-info">Modiffier</a>
									</td>
								</tr>
								<tr>
									<td>26</td>
									<td>baba</td>
									<td>baba</td>
									<td>baba</td>
									<td>25/10/2020</td>
									<td>
										<a class="btn btn-danger">Supprimer</a>
										<a class="btn btn-info">Modiffier</a>
									</td>
								<tr>
									<td>22</td>
									<td>reree</td>
									<td>rerere</td>
									<td>rerere</td>
									<td>25/10/2020</td>
									<td>
										<a class="btn btn-danger">Supprimer</a>
										<a class="btn btn-info">Modiffier</a>
									</td>
								</tr>
													
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>



















<!--End User Content-->
    </div><!--End container-fluid-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
  <?php include'includes/footer.php'?>
   
</div><!--End wrapper-->











  <?php include'includes/js.php'?>
  

  
</body>
</html>
