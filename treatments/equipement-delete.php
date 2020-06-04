<?php
if (isset($_GET['id'])) {
	require '../config/config.php';
	$sql = "DELETE FROM equipement WHERE id_equipement = ? ";
	$req = $bd->prepare($sql);
	$req->execute([$_GET['id']]);
	echo '<script> document.location.replace("../equipements.php?categorie='.$_GET['categorie'].'"); </script>';
}