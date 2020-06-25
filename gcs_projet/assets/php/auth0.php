<?php
session_start();
 
if ((!isset($_SESSION['email_utilisateur'])) || ($_SESSION['email_utilisateur'] == ''))
{
    header('Location: login.html');
}

?>