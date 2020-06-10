<?php
include "../assets/php/config.php";

//getting id of the data from url
$id_utilisateur = (int)$_REQUEST['id_utilisateur'];
//deleting the row from table
$query_del="DELETE FROM utilisateur WHERE id_utilisateur =:id_utilisateur";
$statement_del=$pdo->prepare($query_del);
$statement_del->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
$statement_del->execute();
echo  $statement_del->rowCount() . " utilisateur supprimé <br/>";
?>
<script type="text/javascript">
	setTimeout(function(){window.location.href="../utilisateur.php";},1000);
</script>
