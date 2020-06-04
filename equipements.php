<?php include("includes/head.php") ?>

<body class="bg-theme bg-theme1">

<?php include_once('config/config.php')?>

<?php include_once('includes/loader.php')?>

<?php require'includes/sidebar.php' ?>

<?php include_once('includes/topbar.php');?>

<div class="clearfix"></div>
	
  	<div class="content-wrapper">
    	<div class="container-fluid">

		<?php
				logged_only();
				// recuperation de l'identifiant de la categirie en GET
				$id_cat = $_GET['categorie'];

				// recuperation du libelle de la cetegorier
				require 'config/config.php';
				$req = $bd->prepare('SELECT * FROM categorie_equipement WHERE id_categorie_equipement ='.$id_cat);
				$req->execute();
				$categorie = $req->fetch();

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


<!--Start Dashboard Content-->








<div class="row m-3">

	<div class="col-4">
		<h5 class="text-left">Catégorie : <?= $categorie['libelle_categorie_equipement'] ?></h5>
	</div>

	<div class="col-5 offset-3">
		<a class="btn btn-light" href="categorie-create.php">Ajouter un Equipement à cette Catégorie</a>
	</div>
</div>



<div class="row">
		<div class="col-12 col-lg-12">
			<div class="card">
				<div class="table-responsive">








		<table class="table align-items-center table-flush table-borderless">
			<thead>
				<tr>
					<th width="5%">#</th>
					<th width="20%">Equipement</th>
					<th width="10%">QTE</th>
					<th width="10%">Unité</th>
					<th width="*">Description</th>
					<th width="25%"></th>
				</tr>
			</thead>
			<tbody>
				<?php
					require'config/config.php';
					$req = $bd->prepare('SELECT * FROM equipement WHERE id_categorie_equipement ='.$id_cat );
					$req->execute();
					while ($equipement = $req->fetch(PDO::FETCH_ASSOC)) {?>

						<tr>
							<td><?= $equipement['id_equipement'] ?></td>
							<td><?= $equipement['nom'] ?></td>
							<td><?= $equipement['quantite'] ?></td>
							<td><?= $equipement['unite'] ?></td>
							<td><?= $equipement['description_equipement'] ?></td>
							<td>
								<a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $equipement['id_equipement'] ?>">Supprimer</a>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $equipement['id_equipement'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-danger" id="exampleModalLabel"><?= $equipement['nom'] ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p style="color: black">Vous allez supprimer cet utilisateur. <br> ce genre d'actions sont IRRÉVERSIBLES. <br> Vous pouvez maintenant annuller la suppression <br> si ce n'est pas l'action désirée </p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
				<a type="button" class="btn btn-danger" href="treatments/equipement-delete.php?categorie=<?= $id_cat?>&&id=<?= $equipement['id_equipement'] ?>">Confirmer la suppression</a>
			</div>
		</div>
	</div>
</div>

		<a class="btn btn-info"  href="categorie-update.php?id=<?= $equipement['id_equipement'] ?>">Modiffier</a>




							</td>
						</tr>
				<?php } ?>
			
			</tbody>
		</table>







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
