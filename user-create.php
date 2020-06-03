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
            if (!empty($_POST)) {
            
            require_once'config/config.php';
            require_once'includes/functions.php';

            $errors = array(); 
 
            if (empty($_POST['name'])) {
                    $errors['name'] = "Nom Invalide (Alpha-Numerique)";
            }

            if (empty($_POST['firstname'])) {
                    $errors['firstname'] = "Prénom Invalide (Alpha-Numerique)";
            }
            
            if (empty($_POST['tel']) || !preg_match('/^[0-9_]+$/',$_POST['tel'])) {
                    $errors['tel'] = "Erreur (Numerique Ex: 01020304)";
            }

            // si email est vide     ou      email ne respecte pas email format
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL )) {
                    // tableau errors ajoute le message
                $errors['email'] = "Email Invalide";
            }else{
                // si email n'est pas vide, et email respecte le format 
                // verification si email deja dans bd
                    $req = $bd->prepare('SELECT id_utilisateur FROM utilisateur WHERE email_utilisateur = ? ');
                    $req->execute([$_POST['email']]);
                    $user = $req->fetch();
                    // ajoute l'erreur dans le tableau erreur
                    if ($user) {
                        $errors['email'] = 'Cette E-mail existe déjà'; 
                    }
            }

            if (empty($_POST['password']) ) {
                    $errors['password'] = "Mot de Passe Invalide";
            }

            if ($_POST['check']) {
                $check = 1;
            }else{
                $check = 2;
            }
            if (empty($errors)) {
                // Si le tabeau des erreurs est vide
                // debut de l'enregistrement

                $req = $bd->prepare("INSERT INTO utilisateur 
                SET nom_utilisateur = ?,prenom_utilisateur = ?, telephone_utilisateur = ?,email_utilisateur = ?, motpass_utilisateur =?,id_type_utilisateur = ?");

                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $req->execute( [ $_POST['name'],$_POST['firstname'],$_POST['tel'],$_POST['email'],$password,$check ]);

                // message flash si enregistrement Bien déroulé
                $_SESSION['flash']['success'] = 'Enregistrement Effectué.';

            }
    }
        ?>











<div class="row m-3">

	<div class="col-lg-8">
        <div class="card">
        <div class="card-header">Utilisateur → Nouveau

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
                    <!-- name = name  -->
               <div class="form-group" >
                    <label for="input-1">Nom</label>
                    <input type="text" name="name" class="form-control" required id="input-1" placeholder="Entrez le nom">
                </div>

                    <!-- name = firstname -->
                <div class="form-group" method="POST" >
                    <label for="input-2">Prénoms</label>
                    <input type="text" name="firstname" class="form-control" required id="input-2" placeholder="Entrez le prénom">
                </div>

                    <!-- name = email -->
                <div class="form-group">
                    <label for="input-3">Email</label>
                    <input type="text" name="email" class="form-control" required id="input-3" placeholder="Entrez l'adresse email">
                </div>

                    <!-- name = tel -->
                <div class="form-group">
                    <label for="input-4">Mobile</label>
                    <input type="number" name="tel" min="0" maxlength="8" required minlength="8" class="form-control" id="input-4" placeholder="Entrez le numéro de téléphone">
                </div>

                    <!-- name = password -->
                <div class="form-row">
                    <div class="form-group col-8">
                        <label for="input-4">Mot de passe</label>
                        <input type="text" minlength="8"  name="password" required class="form-control" id="input-4" placeholder="Entrer le mot de passe">
                    </div>

                    <div class="icheck-material-white form-group col-3 " style="margin-top: 40px">
                        <input type="checkbox" id="user-checkbox" name="check">
                        <label for="user-checkbox" title="En Cochant, vous pouvez faire ce cet utilisateur un administrateur" data-toggle="tooltip" data-placement="right">Administrateur ?</label>
                    </div>
                </div>

                    <!-- name = valider  -->
                <div class="form-group">
                    <button type="submit" name="valider" class="btn btn-info px-5 btn-block">Inscrire</button>
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
