<?php
include ("config.php");
//include ("query.php");
?>
<!DOCTYPE HTML>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une catégorie de produit</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
    
<body>
    
    <form method="POST" action="add_produit.php">
        <input type="text" placeholder="Nom du produit" name="nom_produit"><br>
        <input type="text" placeholder="Description" name="description_produit"><br>
        <select name="id_categorie_produit ">
            <?php   
       $id_categorie_produit=$row_categorie_produit['id_categorie_produit'];
       $query_categorie_produit="SELECT * FROM categorie_produit WHERE id_categorie_produit=:id_categorie_produit ";
                while($row_categorie_produit=$statement_categorie_produit->fetch())
                    { 
                         echo $row_categorie_produit['id_categorie_produit'];
                    } 
             ?>
        </select><br>
        <input type="submit" name="addproduit" placeholder="Ajouter">
    </form>

    
</body>
</html>
