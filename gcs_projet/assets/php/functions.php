<?php
function logged_only(){

    if (session_status() == PHP_SESSION_NONE)
    	{
    		session_start();
    	}

    if (!isset($_SESSION['nom_utilisateur']) || (!isset($_SESSION['email_utilisateur']))) {

        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit";
        echo '<script> document.location.replace("index.html"); </script>';
        exit();
    }
}
