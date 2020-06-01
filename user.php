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
		<h4 class="text-left">Liste des Utilisateurs</h4>
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
					<th width="10%">Email</th>
					<th width="10%">Role</th>
					<th width="25%"></th>
				</tr>
			</thead>
			<tbody>
				<?php
					require'config/config.php';
					$req = $bd->prepare('SELECT * from utilisateur ORDER BY id_utilisateur DESC');
					$req->execute();
					while ($user = $req->fetch(PDO::FETCH_ASSOC)) {?>

						<tr>
							<td><?= $user['id_utilisateur'] ?></td>
							<td><?= $user['nom_utilisateur'] ?></td>
							<td><?= $user['prenom_utilisateur'] ?></td>
							<td><?= $user['email_utilisateur'] ?></td>
							<td><?= $user['id_type_utilisateur'] ?></td>
							<td>
								<a class="btn btn-danger">Supprimer</a>
								<a class="btn btn-info" href="user-update.php?id=<?=$user['id_utilisateur']?>">Modiffier</a>
							</td>
						</tr>
				<?php } ?>
			
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
