<?php
if (isset($_GET['id'])) {
	require '../config/config.php';
	$sql = "DELETE FROM projet WHERE id_projet = ? ";
	$req = $bd->prepare($sql);
	$req->execute([$_GET['id']]);
	echo '<script> document.location.replace("../projet.php"); </script>';
}