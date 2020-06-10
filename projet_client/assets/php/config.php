<?php
header('Content-Type= text/csv');
try
{

$pdo= new PDO('mysql:host=localhost;dbname=interface','test','123456789');

}
catch (PDOException $e)
{
	echo "Connexion Impossible, Veuillez réessayer svp !";
}
?>