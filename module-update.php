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
            $user = $req->fetch();

            if (!empty($_POST)) {
                
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
                    // verification si l'email est deja prise par un other user
                    $req = $bd->prepare('SELECT id_utilisateur FROM utilisateur WHERE email_utilisateur = :email and id_utilisateur <> :id');
                    $req->execute(['email' =>$_POST['email'],'id' =>$_GET['id']]);
                    $otherUser = $req->fetch();
                    // ajoute l'erreur dans le tableau erreur
                    if ($otherUser) {
                        $errors['email'] = 'Cette E-mail existe déjà Pour un autre compte'; 
                    }
                    }

                    if (empty($_POST['password'])) {
                            $errors['password'] = "Mot de Passe Invalide";
                    }


                    if (empty($errors)) {
                        // Si le tabeau des erreurs est vide
                        // debut de l'enregistrement

                            $req = $bd->prepare("UPDATE utilisateur 
                            SET nom_utilisateur = ?,prenom_utilisateur = ?, telephone_utilisateur = ?,email_utilisateur = ?, motpass_utilisateur = ? WHERE `utilisateur`.`id_utilisateur` = ".$_GET['id']);

                            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                            $req->execute( [ $_POST['name'],$_POST['firstname'],$_POST['tel'],$_POST['email'],$password  ]);
                            $_SESSION['flash']['success'] = 'Modiffication Reusie!';
                            echo '<script> document.location.replace("user.php"); </script>';
                            exit();

                    }
            }
         ?>


<div class="row m-3">

	<div class="col-6">
		<h4 class="text-left">Utilisateur → Modiffication : <span style="text-transform: uppercase;"> <?= $user['nom_utilisateur']?></span> <?= $user['prenom_utilisateur']?></h4>	
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

                <!-- name name -->
                <div class="form-group">
                    <label for="exampleInputName" class="sr-only">Name</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" name="name" value="<?= $user['nom_utilisateur']?>" id="exampleInputName" required class="form-control input-shadow" placeholder="Nom">
                        <div class="form-control-position">
                                <i class="icon-user"></i>
                        </div>
                    </div>
                </div>


                <!-- name firstname -->
                <div class="form-group">
                    <label for="exampleInputfirstname" class="sr-only">Prenom</label>
                    <div class="position-relative has-icon-right">
                        <input type="text"  value="<?= $user['prenom_utilisateur']?>" name="firstname" id="exampleInputfirstname" required class="form-control input-shadow" placeholder="Prenom">
                        <div class="form-control-position">
                                <i class="icon-user"></i>
                        </div>
                    </div>
                </div>


                <!-- name tel -->
                <div class="form-group">
                    <label for="exampleInputTel" class="sr-only">Téléphone</label>
                    <div class="position-relative has-icon-right">
                        <input type="tel"  value="<?= $user['telephone_utilisateur']?>" name="tel" maxlength="8" minlength="8" required id="exampleInputTel" class="form-control input-shadow" placeholder="01020304">
                        <div class="form-control-position">
                            <i class="zmdi zmdi-account-box-mail"></i>
                        </div>
                    </div>
                </div>



                <!-- name email -->
                <div class="form-group">
                    <label for="exampleInputEmailId" class="sr-only">Email</label>
                    <div class="position-relative has-icon-right">
                        <input type="email"  value="<?= $user['email_utilisateur']?>" name="email" id="exampleInputEmailId" required class="form-control input-shadow" placeholder="E-mail">
                        <div class="form-control-position">
                            <i class="icon-envelope-open"></i>
                        </div>
                    </div>
                </div>


                <!-- name password -->
              <div class="form-group">
                <label for="exampleInputPassword" class="sr-only">Mot de passe</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" id="exampleInputPassword" minlength="8" required name="password" class="form-control input-shadow" placeholder="Mot de passe actuel">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
              </div>


               <button type="submit" name="valider" class="btn btn-light btn-block waves-effect waves-danger">Modiffier</button>

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
