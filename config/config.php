<?php
try {
    // Connexion a la base de données Echuée
    $bd = new PDO('mysql:host=10.224.78.20;dbname=interface_web;charset=utf8', 'root', '');

} catch (Exception $e) {
    // Connexion a la base de données Echuée
    die('Erreur de Conn' . $e->getMessage());
}