<?php
header('Content-Type= text/csv');
try
{

$pdo= new PDO('mysql:host=localhost;dbname=gcs','root','');

}
catch (PDOException $e)
{
	echo "Connexion Impossible, Veuillez réessayer svp !";
}
?>