<?php

function debug($variable){
    echo "<pre>" . print_r($variable, true) ."</pre>";
}


function logged_only(){

    if (session_status() == PHP_SESSION_NONE) { 
        session_start(); 
    }

    if (!isset($_SESSION['auth'])) {
        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit";
        // header('Location:index.php');
        echo '<script> document.location.replace("index.php"); </script>';
        exit();
    }
}