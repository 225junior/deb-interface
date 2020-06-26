<?php
session_start();
 
if ((!isset($_SESSION['email_utilisateur'])) || (!isset($_SESSION['email_utilisateur'])))
{
    header('Location: index.html');
}

?>