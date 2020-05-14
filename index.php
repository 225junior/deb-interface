<?php
include("includes/head.php")
?>

<body class="bg-theme bg-theme1">
<?php 
include_once('config/config.php')
?>

<?php 
include_once('includes/loader.php')
?>

<?php 
	if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password']) ) {
		require 'config/config.php';
		$req = $bd->prepare('SELECT * from utilisateur WHERE email = :email');
		$req->execute(['email' => $_POST['email']]);
		$user = $req->fetchObject();

		echo($user->password);
		echo ($_POST['password']);

		if(	$user->password == $_POST['password'] )	{
			$_SESSION['auth'] = $user;
			$_SERVER['flash']['success'] = 'Vous Êtes Connecté';	
			header('Location:dashboard.php');
			
			exit();
		}else{
			$_SERVER['flash']['danger'] = 'Identifiant ou Mot de passe Incorrecte';	
		}
		
					
		
	}

?>


<!-- Start wrapper-->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 	<div class="card-content p-2">
				<div class="text-center">
					<img src="assets/images/logo-icon.png" alt="logo icon">
				</div>
				<div class="card-title text-uppercase text-center py-3">Se Connecter</div>
					





				
					<form method="POST">

						<!-- email name = email -->
						<div class="form-group">
							<label for="exampleInputUseremail" class="sr-only">E-mail</label>
							<div class="position-relative has-icon-right">
								<input type="email" id="exampleInputUseremail" name="email" class="form-control input-shadow" placeholder="E-mail">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>
						
						<!-- password name = password -->
						<div class="form-group">
							<label for="exampleInputPassword" class="sr-only">Mot de passe</label>
							<div class="position-relative has-icon-right">
								<input type="password" id="exampleInputPassword" name="password" class="form-control input-shadow" placeholder="Entez votre mot de passe">
								<div class="form-control-position">
									<i class="icon-lock"></i>
								</div>
							</div>
						</div>
						<!-- submit = btn_validate -->
						<input type="submit" name="btn_validate" class="btn btn-light btn-block">
								
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
