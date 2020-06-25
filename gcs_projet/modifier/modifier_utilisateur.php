<?php
include "../assets/php/config.php";

	if (isset($_POST['update'])) 
	{
		$id_utilisateur =$_POST['id_user'];
		$nom_utilisateur=$_POST['nom_utilisateur'];
		$pnom_utilisateur=$_POST['pnom_utilisateur'];
		$email_utilisateur=$_POST['email_utilisateur'];
		$mdp_utilisateur=$_POST['mdp_utilisateur'];
		$tel_utilisateur=$_POST['tel_utilisateur'];
		$id_typutilisateur=$_POST['id_typutilisateur'];
		$id_dep=$_POST['id_dep'];
		//update
		$query_update="UPDATE utilisateur SET nom_utilisateur= :nom_utilisateur, pnom_utilisateur= :pnom_utilisateur,email_utilisateur= :email_utilisateur, mdp_utilisateur= :mdp_utilisateur, tel_utilisateur= :tel_utilisateur, id_typutilisateur= :id_typutilisateur, id_dep= :id_dep WHERE id_utilisateur = :id_utilisateur";
		$statement_update=$pdo->prepare($query_update,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$statement_update->execute(array(':nom_utilisateur'=>$nom_utilisateur,':pnom_utilisateur'=>$pnom_utilisateur,':email_utilisateur'=>$email_utilisateur,':mdp_utilisateur'=>$mdp_utilisateur,':tel_utilisateur'=>$tel_utilisateur,':id_typutilisateur'=>$id_typutilisateur,':id_dep'=>$id_dep,':id_utilisateur'=>$id_utilisateur));	
		echo $statement_update->rowCount() . " Utilisateur mis à jour <br/>";
		    ?>
		    <script type="text/javascript">
		    	//Redirection automatique aprés 3s
		    	setTimeout(function(){window.location.href="../user.php";},1000);
		    </script>
		    <?php
	}	
?>
<script type="text/javascript">
	setTimeout(function(){window.location.href="../utilisateur.php";},1000);
</script>