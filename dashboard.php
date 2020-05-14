<?php
include("includes/head.php")
?>

<body class="bg-theme bg-theme1">

<?php 
include_once('config/config.php')
?>

<?php

include_once('includes/loader.php')
?>

<?php
  	require'includes/sidebar.php';
?>
 


<?php
  	require'includes/topbar.php';
?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">



	 

<!--Start Dashboard Content-->
		<?php
			debug($_SESSION);
		?>

		<?php if (!empty($_SESSION['flash'])) { ?>
				
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
			
		<?php } $_SESSION['flash'] = null; ?>


	<div class="row">
		<div class="col-12 col-lg-12">
			<div class="card mt-3">
				<div class="card-content">
					<div class="row row-group m-0">
							<div class="col-12 col-lg-6 col-xl-3 border-light">
								<div class="card-body">
									<h5 class="text-white mb-0">9526 <span class="float-right"><i class="fa fa-shopping-cart"></i></span></h5>
									<div class="progress my-3" style="height:3px;">
										<div class="progress-bar" style="width:55%"></div>
									</div>
									<p class="mb-0 text-white small-font">Total Orders <span class="float-right">+4.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
								</div>
							</div>
							<div class="col-12 col-lg-6 col-xl-3 border-light">
								<div class="card-body">
									<h5 class="text-white mb-0">8323 <span class="float-right"><i class="fa fa-usd"></i></span></h5>
									<div class="progress my-3" style="height:3px;">
										<div class="progress-bar" style="width:55%"></div>
									</div>
									<p class="mb-0 text-white small-font">Total Revenue <span class="float-right">+1.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
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
				<div class="card-header">Derniers Ajouts</div>
				<div class="table-responsive">
					<table class="table align-items-center table-flush table-borderless">
						<thead>
							<tr>
								<th>Product</th>
								<th>Photo</th>
								<th>Product ID</th>
								<th>Amount</th>
								<th>Date</th>
								<th>Shipping</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Hand Watch</td>
								<td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
								<td>#9405840</td>
								<td>$ 1800.00</td>
								<td>03 Aug 2017</td>
								<td>
									<div class="progress shadow" style="height: 3px;">
									<div class="progress-bar" role="progressbar" style="width: 40%"></div>
									</div>
								</td>
							</tr>
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
	





	
  <?php include'includes/footer.php'?>



  <?php include'includes/colorSwitch.php'?>



   
  </div><!--End wrapper-->

  <?php include'includes/js.php'?>
  

  
</body>
</html>
