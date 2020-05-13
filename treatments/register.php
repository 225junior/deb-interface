<?php
	if (!empty($_POST)) {
        require_once'../config/config.php';
        require_once'../includes/functions.php';
        echo 'post nest pas vide';
        $errors = array();

        if (empty($_POST['name'])) {
            $errors['name'] = "Nom Invalide (Alpha-Numerique)";
        }

        if (empty($_POST['firstname'])) {
            $errors['firstname'] = "Prénom Invalide (Alpha-Numerique)";
        }

        if (empty($_POST['adresse'])) {
            $errors['adresse'] = "Adresse Invalide (Alpha-Numerique)";
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
            SET Nom_util = ?,Prenom_util = ?, Adresse_util = ?,Tel_util = ?,email_util = ?, mot_pass_utill = ?");

            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            
            $req->execute( [ $_POST['name'],$_POST['firstname'],$_POST['adresse'],$_POST['tel'],$_POST['email'],$password  ]);
            
        }else {
           
            echo 'ye erreur dans les champs';
            debug($errors);
            
        }
    }else{
        echo 'post est vide';
    }