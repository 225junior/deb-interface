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
									<font style="vertical-align: inherit;"><?= $_SESSION['flash']['success'] ?><br></font>
								</font>
							</span>
						</div>
					</div>
				
				<?php } $_SESSION['flash'] = null; 
		?>


<div class="row m-3">

	<div class="col-4">
		<h4 class="text-left">Liste des Modules</h4>
	</div>

	<div class="col-4 offset-4">
		<a class="btn btn-light" href="module-create.php">Ajouter un nouveau Module</a>
	</div>
</div>



<div class="row">
		<div class="col-12 col-lg-12">
			<div class="card">
				<div class="table-responsive">








		<table class="table align-items-center table-flush table-borderless">
			<thead>
				<tr>
					<th width="10%">#</th>
					<th width="20%">Libéllé</th>
					<th width="10%">Qte</th>
					<th width="20%">Description</th>
					<th width="25%"></th>
				</tr>
			</thead>
			<tbody>
				<?php
					require'config/config.php';
					$req = $bd->prepare('SELECT * FROM module');
					$req->execute();
					while ($module = $req->fetch(PDO::FETCH_ASSOC)) {?>

						<tr>
							<td><?= $module['id_module'] ?></td>
							<td><?= $module['libelle_module'] ?></td>
							<td><?= $module['quantite_module'] ?></td>
							<td><?= $module['description_module'] ?></td>
							<td>
								<a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Supprimer</a>
								<a class="btn btn-info"  href="module-update.php?id=<?=$module['id_module']?>">Modiffier</a>

				<!-- Modal -->
				<div class="modal fade bg-theme11" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog bg-theme11" role="document">
				    <div class="modal-content">
				      <div class="modal-header bg-theme11">
				        <h5 class="modal-title text-danger" id="exampleModalLabel"><?= $module['libelle_module'] ?></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        	<p style="color: black">Vous allez supprimer cet utilisateur. <br> ce genre d'actions sont IRRÉVERSIBLES. <br> Vous pouvez maintenant annuller la suppression <br> si ce n'est pas l'action désirée </p>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
				        <a type="button" class="btn btn-danger" href="treatments/module-delete.php?id=<?= $module['id_module']?>">Confirmer la suppression</a>
				      </div>
				    </div>
				  </div>
				</div>



							</td>
						</tr>
				<?php } ?>
			
			</tbody>
		</table>







				</div>
			</div>
		</div>
	</div>



















<!--End module Content-->
    </div><!--End container-fluid-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
  <?php include'includes/footer.php'?>
   
</div><!--End wrapper-->











  <?php include'includes/js.php'?>
  

  
</body>
</html>