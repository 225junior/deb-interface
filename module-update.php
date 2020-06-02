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

        <?php 
            require'config/config.php';
            $req = $bd->prepare('SELECT * FROM module WHERE id_module = ? ');
            $req->execute([$_GET['id']]);
            $module = $req->fetch();
            if ($_POST) {
                $errors = array();

               if (empty($_POST['libelle'])) {
                        $errors['libelle'] = "Libelle Invalide (Alpha-Numerique)";
                }

                if (empty($_POST['description'])) {
                        $errors['description'] = "Description Invalide (Alpha-Numerique)";
                }

                if (empty($_POST['qte']) || !preg_match('/^[0-9_]+$/',$_POST['qte'])) {
                        $errors['qte'] = "Quantité Invalide (Numerique)";
                }
                if (empty($errors)) {
                    // Si le tabeau des erreurs est vide
                    // debut de l'enregistrement

                        $req = $bd->prepare("UPDATE module 
                        SET libelle_module = ?,quantite_module = ?, description_module = ? WHERE `module`.`id_module` = ".$_GET['id']);

                        $req->execute( [ $_POST['libelle'],$_POST['qte'],$_POST['description']]);

                        $_SESSION['flash']['success'] = 'Modiffication Reusie!';
                        echo '<script> document.location.replace("module.php"); </script>';
                        exit();
                }
            }
         ?>


<div class="row m-3">

	<div class="col-12">
		<h4 class="text-left">Module → Modiffication : <span style="text-transform: uppercase;"> <?= $module['libelle_module']?></span></h4>
	</div>

</div>

<div class="row m-3">

	<div class="col-lg-8">
        <div class="card">
            <div class="card-head">
                <?php if (!empty($_SESSION['flash']['danger'])) { ?>
                
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">×</font>
                            </font>
                        </button>
                        <div class="alert-message">
                            <span>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"><?= $_SESSION['flash']['danger'] ?> <br></font>
                                </font>
                            </span>
                        </div>
                    </div>

                <?php }if (!empty($_SESSION['flash']['success'])) { ?>
                
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">×</font>
                            </font>
                        </button>
                        <div class="alert-message">
                            <span>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"><?= $_SESSION['flash']['success'] ?> <br></font>
                                </font>
                            </span>
                        </div>
                    </div>
                <?php } $_SESSION['flash'] = null; 
                    if (!empty($errors)) {?>

                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">×</font>
                            </font>
                        </button>
                    <div class="alert-message">
                    <?php foreach ($errors as $error ) {?>
                        <span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;"><?= $error ?> <br></font>
                            </font>
                        </span>
                <?php } ?>

            </div>
<?php       } ?>
            </div>
        <div class="card-body">





             <form method="POST">
                    <!-- name = libelle  -->
               <div class="form-group" >
                    <label for="input-1">Titre Du Module</label>
                    <input type="text" name="libelle" value="<?= $module['libelle_module']?>" class="form-control" required id="input-1" placeholder="Titre Du Module">
                </div>

                    <!-- name = qte -->
                <div class="form-group" method="POST" >
                    <label for="input-2">Quantité</label>
                    <input type="number" name="qte" min="0" value="<?= $module['quantite_module']?>" class="form-control" required id="input-2" placeholder="Quantité">
                </div>

                    <!-- name = description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?= $module['description_module']?></textarea>
                </div>

                    <!-- name = valider  -->
                <div class="form-group">
                    <button type="submit" name="valider" class="btn btn-info px-5 btn-block">Modiffier</button>
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
