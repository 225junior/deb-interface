<?php
	include("includes/head.php")
?>

<body class="bg-theme bg-theme1">
<?php 
	// include_once('config/config.php')
?>

<?php 
	include_once('includes/loader.php')
?>

<?php
				logged_only();
	
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

			// si email est vide 	 ou 	 email ne respecte pas email format
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

			if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
					$errors['password'] = "Mot de Passe Invalide";
			}


			if (empty($errors)) {
				// Si le tabeau des erreurs est vide
				// debut de l'enregistrement

					$req = $bd->prepare("INSERT INTO utilisateur 
					SET nom_utilisateur = ?,prenom_utilisateur = ?, telephone_utilisateur = ?,email_utilisateur = ?, motpass_utilisateur = ?");

					$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

					$req->execute( [ $_POST['name'],$_POST['firstname'],$_POST['tel'],$_POST['email'],$password  ]);

			}
    }

?>
<!-- Start wrapper-->
 <div id="wrapper">

	<div class="card card-authentication1 mx-auto my-4">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="assets/images/logo-icon.png" alt="logo icon">
		 	</div>
      <div class="card-title text-uppercase text-center py-3">S'enregistrer</div>

<?php if (!empty($errors)) {?>

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
<?php } ?>

		</div>




			<form method="POST">

				<!-- name name -->
				<div class="form-group">
					<label for="exampleInputName" class="sr-only">Name</label>
					<div class="position-relative has-icon-right">
						<input type="text" name="name" id="exampleInputName" required class="form-control input-shadow" placeholder="Votre Nom">
						<div class="form-control-position">
								<i class="icon-user"></i>
						</div>
					</div>
				</div>


				<!-- name firstname -->
			  	<div class="form-group">
					<label for="exampleInputfirstname" class="sr-only">Prenom</label>
					<div class="position-relative has-icon-right">
						<input type="text" name="firstname" id="exampleInputfirstname" required class="form-control input-shadow" placeholder="Votre Prenom">
						<div class="form-control-position">
								<i class="icon-user"></i>
						</div>
					</div>
			  	</div>


				<!-- name tel -->
			  	<div class="form-group">
					<label for="exampleInputTel" class="sr-only">Téléphone</label>
					<div class="position-relative has-icon-right">
						<input type="tel" name="tel" maxlength="8" minlength="8" required id="exampleInputTel" class="form-control input-shadow" placeholder="Votre téléphone">
						<div class="form-control-position">
							<i class="zmdi zmdi-account-box-mail"></i>
						</div>
					</div>
				</div>



				<!-- name email -->
			  	<div class="form-group">
			  		<label for="exampleInputEmailId" class="sr-only">Email ID</label>
					<div class="position-relative has-icon-right">
						<input type="email" name="email" id="exampleInputEmailId" required class="form-control input-shadow" placeholder="Votre adresse E-mail">
						<div class="form-control-position">
							<i class="icon-envelope-open"></i>
						</div>
					</div>
			   	</div>


				<!-- name password -->
			  <div class="form-group">
			   	<label for="exampleInputPassword" class="sr-only">Mot de passe</label>
					<div class="position-relative has-icon-right">
						<input type="password" id="exampleInputPassword" minlength="8" required name="password" class="form-control input-shadow" placeholder="Votre Mot de passe">
						<div class="form-control-position">
							<i class="icon-lock"></i>
						</div>
					</div>
			  </div>


			  <!-- name password_confirm -->
			  	<div class="form-group">
			   		<label for="exampleInputpassword_confirm" class="sr-only">Confirmé</label>
					<div class="position-relative has-icon-right">
						<input type="password" id="exampleInputPassword" required name="password_confirm" class="form-control input-shadow" placeholder="Confirmez">
						<div class="form-control-position">
							<i class="icon-lock"></i>
						</div>
					</div>
			  	</div>

			   <button type="submit" name="valider" class="btn btn-light btn-block waves-effect waves-light">S'Enregistrer</button>

       	</form>









		   	</div>
		</div>

	     </div>

  </div><!--wrapper-->

  <?php 
		include_once('includes/js.php')
	?>


</body>
</html>