<!-- head including -->
	<?php include("includes/head.php") ?>

	<body class="bg-theme bg-theme1">

	<?php include_once('config/config.php')?>

	<?php include_once('includes/loader.php')?>

	<?php require'includes/sidebar.php' ?>

	<?php include_once('includes/topbar.php');?>
<!-- End head including -->




<?php
            if (!empty($_POST)) {
            
            require_once'config/config.php';
            require_once'includes/functions.php';
            $errors = array(); 
 
            if (empty($_POST['libelle'])) {
                    $errors['libelle'] = "Titre du projet Invalide (Alpha-Numerique)";
            }else{
                // si le libelle n'est pas vide,
                // verification s'il existe deja dans bd
                    $req = $bd->prepare('SELECT id_projet FROM projet WHERE nom_projet = ? ');
                    $req->execute([$_POST['libelle']]);
                    $user = $req->fetch();
                    // ajoute l'erreur dans le tableau erreur
                    if ($user) {
                        $errors['email'] = 'Ce Titre de projet existe déjà'; 
                    }
            }

            if (empty($errors)) {
                // Si le tabeau des erreurs est vide
                // debut de l'enregistrement

                    $req = $bd->prepare("INSERT INTO projet 
                    SET nom_projet = ?,id_utilisateur = ?");

                    $req->execute( [ $_POST['libelle'],$_SESSION['auth']->id_utilisateur]);

                    // message flash si enregistrement Bien déroulé
                    $_SESSION['flash']['success'] = 'Enregistrement Effectué.';

            }
    }
        ?>










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
                <?php } 

            }?>
        </div>

        </div>
        <div class="card-body">




            <form method="POST">
                    <!-- name =  -->
               <div class="form-group" >
                    <label for="input-1">Titre du projet</label>
                    <input type="text" name="libelle" class="form-control" id="input-1" required placeholder="Entrez le titre">
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
