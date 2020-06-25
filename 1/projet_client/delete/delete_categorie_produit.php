<?php
include "../assets/php/config.php";

//getting id of the data from url
$id_categorie_produit = (int)$_REQUEST['id_categorie_produit'];
//deleting the row from table
$query_del="DELETE FROM categorie_produit WHERE id_categorie_produit =:id_categorie_produit";
$statement_del=$pdo->prepare($query_del);
$statement_del->bindValue(':id_categorie_produit', $id_categorie_produit, PDO::PARAM_INT);
$statement_del->execute();
echo  $statement_del->rowCount() . " categorie produit supprimée <br/>";
?>
<script type="text/javascript">
	setTimeout(function(){window.location.href="../categorie_produit.php";},2);
</script>
