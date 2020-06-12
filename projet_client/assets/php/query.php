<?php
include "config.php";

//requete d'affichage des catégories de produit
$query_categorie_produit="SELECT * FROM categorie_produit";
$statement_categorie_produit=$pdo->prepare($query_categorie_produit);
$statement_categorie_produit->execute();

//requete d'affichage des produits
$query_produit="SELECT * FROM produit";
$statement_produit=$pdo->prepare($query_produit);
$statement_produit->execute();

//requete d'affichage des produits
$query_projet="SELECT * FROM projet";
$statement_projet=$pdo->prepare($query_projet);
$statement_projet->execute();

//Liste les types d'utilisateur
$query_typutilisateur="SELECT * FROM type_utilisateur";
$statement_typutilisateur=$pdo->prepare($query_typutilisateur);
$statement_typutilisateur->execute();

//liste utilisateur
$query_utilisateur="SELECT * FROM utilisateur";
$statement_utilisateur=$pdo->prepare($query_utilisateur);
$statement_utilisateur->execute();

//DATE
$query_date="SELECT NOW()";
$statement_date=$pdo->prepare($query_date);
$statement_date->execute();
$date=$statement_date->fetch();
 

//Rappel
//$query_rappel="SELECT * FROM rappel";
//$statement_rappel=$pdo->prepare($query_rappel);
//$statement_rappel->execute();

//Notification
//$query_notif="SELECT * FROM rappel";
//$statement_notif=$pdo->prepare($query_notif);
//$statement_notif->execute();

//Requete pour compter le nombre total de maintenance en cours

$today=strtotime(date('d-m-Y'));
$query_encours="SELECT * FROM projet WHERE date_projet >=:date_projet";
$statement_encours=$pdo->prepare($query_encours);
$statement_encours->execute(array(':date_projet'=>$today));
$count_encours=$statement_encours -> rowCount();

//Requete pour compter le nombre total de maintenance expirée
$query_expire="SELECT * FROM contrat WHERE date_fin <=:date_fin";
$statement_expire=$pdo->prepare($query_expire);
$statement_expire->execute(array(':date_fin'=>$today));
$count_expire=$statement_expire -> rowCount();

//REQUETE POUR AFFICHER LES LISTES DES EQUIPEMENTS LIVRES

$query_equiplivre="SELECT * FROM projet";
$statement_equiplivre=$pdo->prepare($query_equiplivre);
$statement_equiplivre->execute();

//REQUETE POUR AFFICHER LES LISTES DES EQUIPEMENTS NON LIVRES

$query_equipnonlivre="SELECT * FROM projet";
$statement_equipnonlivre=$pdo->prepare($query_equipnonlivre);
$statement_equipnonlivre->execute();

//LISTE EMAIL
//$query_email="SELECT * FROM emails";
//$statement_email=$pdo->prepare($query_email);
//$statement_email->execute();



?>