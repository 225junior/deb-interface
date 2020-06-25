<?php
if (isset($_GET['id'])) {
	require '../config/config.php';
	$sql = "DELETE FROM utilisateur WHERE id_utilisateur = ? ";
	$req = $bd->prepare($sql);
	$req->execute([$_GET['id']]);
	echo '<script> document.location.replace("../user.php"); </script>';
}