<?php
try {
    // Connexion a la base de données Echuée
    $bd = new PDO('mysql:host=localhost;dbname=debo;charset=utf8', 'root', '');
    die('Connection ok');

} catch (Exception $e) {
    // Connexion a la base de données Echuée
    die('Erreur de Conn' . $e->getMessage());
}