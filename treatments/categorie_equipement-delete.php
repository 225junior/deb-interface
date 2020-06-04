<?php
if (isset($_GET['id'])) {
	require '../config/config.php';
	$sql = "DELETE FROM categorie_equipement WHERE id_categorie_equipement = ? ";
	$req = $bd->prepare($sql);
	$req->execute([$_GET['id']]);
	echo '<script> document.location.replace("../categorie_equipement.php"); </script>';
}