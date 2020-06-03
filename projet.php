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
		<h4 class="text-left">Projets</h4>	
	</div>

	<div class="col-4 offset-4">
		<a class="btn btn-light" href="projet-create.php">Ajouter un nouveau Projet</a>		
	</div>
</div>		



<div class="row">
<div class="col-12 col-lg-12">
<div class="card">
	<div class="card-header">Liste de tous les Projets </div>
	<div class="table-responsive">
		<table class="table align-items-center table-flush table-borderless">
			<thead>
				<tr>
					<th width="10%">#</th>
					<th width="20%">Libéllé</th>
					<th width="25%">date creation</th>
					<th width="10%">auteur</th>
					<th width="25%"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				require'config/config.php'; #variable de connexion
				
				if ($_SESSION['auth']->id_type_utilisateur == '2') {
					# on verifie si l'utilisateur connecté est utilisateur(2) :: if [1]

					#affiche tous les champs de proj et user où idUser=id de celui qui est connecté 
					# et range dans lordre decroissant des idProj
					$req = $bd->prepare('SELECT * FROM projet p 
						INNER JOIN utilisateur u
						WHERE u.id_utilisateur = '.$_SESSION['auth']->id_utilisateur
						.' ORDER BY p.id_projet DESC');
					$req->execute();

					#while
					while ($projet = $req->fetch(PDO::FETCH_ASSOC)) {?>
						<tr>
							<td><?=$projet['id_projet']?></td>
							<td><?=$projet['nom_projet']?></td>
							<td><?=$projet['date_projet']?></td>
							<td><?=$projet['nom_utilisateur']?>  <?=$projet['prenom_utilisateur']?></td>
							<td>
								<a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$projet['id_projet']?>">Supprimer</a>
								<a class="btn btn-info"  href="projet-update.php?id=<?=$projet['id_projet']?>">Modiffier</a>

				<!-- Modal -->
				<div class="modal fade bg-theme11" id="exampleModal<?=$projet['id_projet']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog bg-theme11" role="document">
					<div class="modal-content">
					<div class="modal-header bg-theme11">
						<h5 class="modal-title text-danger" id="exampleModalLabel"><?= $projet['nom_projet'] ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p style="color: black">Vous allez supprimer cet utilisateur. <br> ce genre d'actions sont IRRÉVERSIBLES. <br> Vous pouvez maintenant annuller la suppression <br> si ce n'est pas l'action désirée </p>
					</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
							<a type="button" class="btn btn-danger" href="treatments/projet-delete.php?id=<?= $projet['id_projet']?>">Confirmer la suppression</a>
						</div>
					</div>
					</div>
				</div>



							</td>
						</tr>
				<?php } #fin while
				}#fin if[1] ?>

				
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
