<?php
try {
    // Connexion a la base de données Echuée
    $bd = new PDO('mysql:host=localhost;dbname=debo;charset=utf8', 'root', '');
    
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

} catch (Exception $e) {
    // Connexion a la base de données Echuée
    die('Erreur de Conn' . $e->getMessage());
}