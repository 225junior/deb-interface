<?php
	if (!empty($_POST)) {
        require_once'../config/config.php';
        require_once'../includes/functions.php';

        $errors = array();

        if (empty($_POST['name'])) {
            $errors['name'] = "Nom Invalide (Alpha-Numerique)";
        }

        if (empty($_POST['firstname'])) {
            $errors['firstname'] = "Prénom Invalide (Alpha-Numerique)";
        }


        if (empty($_POST['tel']) || !preg_match('/^[0-9_]+$/',$_POST['tel'])) {
            $errors['tel'] = "Erreur (Numerique Ex: 01020304)";
        }

        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL )) {
            $errors['email'] = "Email Invalide";
        }else{
            $req = $bd->prepare('SELECT id_util FROM utilisateur WHERE email_util = ? ');
            $req->execute([$_POST['email']]);
            $user = $req->fetch();
            debug($user);
        }

        if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
            $errors['password'] = "Mot de Passe Invalide";
        }
        
    
        if (empty($errors)) {
            

            $req = $bd->prepare("INSERT INTO utilisateur 
            SET Nom_utilisateur = ?,Prenom_utilisateur = ?,Tel_utilisateur = ?,email_utilisateur = ?, motpass_utilisateur = ?");

            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            
            $req->execute( [ $_POST['name'],$_POST['firstname'],$_POST['tel'],$_POST['email'],$password  ]);
            
        }else {
           
            echo 'il y a une erreur dans les champs';
            debug($errors);
            
        }
    }else{
        echo 'post est vide';
    }