<?php
include "../assets/php/config.php";

//getting id of the data from url
$id_produit = (int)$_REQUEST['id_produit'];
//deleting the row from table
$query_del="DELETE FROM produit WHERE id_produit =:id_produit";
$statement_del=$pdo->prepare($query_del);
$statement_del->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
$statement_del->execute();
echo  $statement_del->rowCount() . " Produit supprimé <br/>";
?>
<script type="text/javascript">
	setTimeout(function(){window.location.href="../produit.php";},2);
</script>
