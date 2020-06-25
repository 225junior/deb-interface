<?php
$email_utilisateur=$_SESSION['email_utilisateur'];

$query_select="SELECT * FROM utilisateur WHERE email_utilisateur=:email_utilisateur ";
$statement_select=$pdo->prepare($query_select);
$statement_select->execute(array(':email_utilisateur'=>$email_utilisateur));
$rowselect=$statement_select->fetch();
$id_typutilisateur=$rowselect['id_typutilisateur'];

$query_type="SELECT * FROM type_utilisateur WHERE id_typutilisateur=:id_typutilisateur ";
$statement_type=$pdo->prepare($query_type);
$statement_type->execute(array(':id_typutilisateur'=>$id_typutilisateur));
$rowtype=$statement_type->fetch();
?>
