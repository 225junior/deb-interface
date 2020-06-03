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


<!--Start Projet-Create Content-->
<?php
            require'config/config.php';
            $req = $bd->prepare('SELECT * FROM projet WHERE id_projet = ? ');
            $req->execute([$_GET['id']]);
            $projet = $req->fetch();

            if (!empty($_POST)) {
                $errors = array();

             if (empty($_POST['libelle'])) {
                    $errors['libelle'] = "Titre du projet Invalide (Alpha-Numerique)";
            }
            if (empty($errors)) {
                // Si le tabeau des erreurs est vide
                // debut de l'enregistrement

                    $req = $bd->prepare("UPDATE projet 
                    SET nom_projet = ? WHERE `projet`.`id_projet` = ".$_GET['id']);

                    $req->execute( [ $_POST['libelle']]);

                    $_SESSION['flash']['success'] = 'Modiffication Reusie!';
                    echo '<script> document.location.replace("projet.php"); </script>';
                    exit();
            }
            }



?>



<div class="row m-3">

	<div class="col-4">
		<h4 class="text-left">Projet → Modiffication</h4>	
	</div>

</div>		

<div class="row m-3">

	<div class="col-lg-8">
        <div class="card">
            <div class="card-header">Projet → Nouveau
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
                            </div>
                            <?php } 
                        }?>
                        </div>
        <div class="card-body">



              <form method="POST">
                    <!-- name =  -->
               <div class="form-group" >
                    <label for="input-1">Titre du projet</label>
                    <input type="text" name="libelle" class="form-control" value="<?= $projet['nom_projet'] ?>" id="input-1" required placeholder="Entrez le titre">
                </div>

                    <!-- name =  -->
                <div class="form-group">
                    <button type="submit" name="valider" class="btn btn-info px-5 btn-block">Créer</button>
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
