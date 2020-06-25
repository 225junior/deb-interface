<?php 
include "config/config.php";
include_once('includes/loader.php');
?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body class="bg-theme bg-theme1">
 <?php
 include'includes/sidebar.php';
 include "includes/topbar.php";
 include "includes/head.php";
 ?>

 <div class="clearfix"></div>
	
  	<div class="content-wrapper">
    	<div class="container-fluid">

<!--Start Dashboard Content-->
		


	<div class="row">
	<div class="col-12 col-lg-12">
	<div class="card mt-3">
	<div class="card-content">
		<div class="row row-group m-0">
			<div class="col-12 col-lg-6 col-xl-3 border-light">
				<div class="card-body" title="Nombre total d'utilisateur" data-placement="bottom" data-toggle="tooltip">
					<?php
						//require'config/config.php';
						//$req = $bd->prepare('SELECT * from utilisateur');
						//$req->execute();
						//$users = $req->fetchObject();
						//$nbUser= $req->rowCount();
					?>
					<h5 class="text-white mb-0"> <span class="float-right"><i class="zmdi zmdi-accounts"></i></span></h5>
					<div class="progress my-3" style="height:3px;">
						<div class="progress-bar" style="width:55%"></div>
					</div>
					<p class="mb-0 text-white small-font">Total Utilisateurs</p>
				</div>
			</div>

			<div class="col-12 col-lg-6 col-xl-3 border-light">
				<div class="card-body" title="Nombre total de Projets crée" data-toggle="tooltip">
					<?php
						//require'config/config.php';
						//$req = $bd->prepare('SELECT * from projet');
						//$req->execute();
						//$nbProjet= $req->rowCount();
					?>
					<h5 class="text-white mb-0"> <span class="float-right"><i class="zmdi zmdi-assignment"></i></span></h5>
					<div class="progress my-3" style="height:3px;">
						<div class="progress-bar" style="width:55%"></div>
					</div>
					<p class="mb-0 text-white small-font">Total Projet <span class="float-right">+1.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
				</div>
			</div>

			<div class="col-12 col-lg-6 col-xl-3 border-light">
				<div class="card-body">
					<h5 class="text-white mb-0">6200 <span class="float-right"><i class="fa fa-eye"></i></span></h5>
					<div class="progress my-3" style="height:3px;">
						<div class="progress-bar" style="width:55%"></div>
					</div>
					<p class="mb-0 text-white small-font">Visitors <span class="float-right">+5.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
				</div>
			</div>
			<div class="col-12 col-lg-6 col-xl-3 border-light">
				<div class="card-body">
					<h5 class="text-white mb-0">5630 <span class="float-right"><i class="fa fa-envira"></i></span></h5>
					<div class="progress my-3" style="height:3px;">
						<div class="progress-bar" style="width:55%"></div>
					</div>
					<p class="mb-0 text-white small-font">Messages <span class="float-right">+2.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
				</div>
			</div>
		</div>
	</div>
	</div>
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
								<th>#</th>
								<th>Nom</th>
								<th>Prenoms</th>
								<th>Amount</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
						<?php
							//require'config/config.php';
							//$req = $bd->prepare('SELECT * from utilisateur ORDER BY id DESC LIMIT 5');
							//$req->execute();
							//while ($user = $req->fetch(PDO::FETCH_ASSOC)) {?>

								<tr>
									<td></td>
									<td> </td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							<?php //} ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div><!--End Row-->

<!--End Dashboard Content-->
	  




    <!-- End container-fluid-->
</div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

  <?php //include "includes/footer.php";?>

   
  </div><!--End wrapper-->
  <?php //include "includes/js.php";?>
</body>
</html>

