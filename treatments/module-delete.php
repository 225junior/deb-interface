<?php
if (isset($_GET['id'])) {
	require '../config/config.php';
	$sql = "DELETE FROM module WHERE id_module = ? ";
	$req = $bd->prepare($sql);
	$req->execute([$_GET['id']]);
	echo '<script> document.location.replace("../module.php"); </script>';
}