<?php
include "../assets/php/config.php";

//getting id of the data from url
$id_projet = (int)$_REQUEST['id_projet'];
//deleting the row from table
$query_del="DELETE FROM projet WHERE id_projet =:id_projet";
$statement_del=$pdo->prepare($query_del);
$statement_del->bindValue(':id_projet', $id_projet, PDO::PARAM_INT);
$statement_del->execute();
echo  $statement_del->rowCount() . " Projet supprimé <br/>";
?>
<script type="text/javascript">
	setTimeout(function(){window.location.href="../projet.php";},2);
</script>
