<?php

	require('../config/config.php');
	// $req = $bd->prepare('SELECT * from utilisateur WHERE email = :email');
	// $req->execute(['email' => $_POST['email']]);
	// $user = $req->fetchObject();
	// $sql = "DESC `utilisateur`";
	$a = $bd->prepare("SELECT * from projet");
	$a->execute();
	while ($ligne = $a->fetch(PDO::fetchObject)) {
		// $ligne->nom_utilisateur;
		echo $ligne['nom_projet'];
	}


?>