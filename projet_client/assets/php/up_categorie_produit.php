<?php
include "config.php";
try 
{
	if (isset($_POST['upcategorieproduit'])) 
	{
	# si le bouton modiffié est cliquez
		
		# recuperation des variables a partir du formulaire: extract($_POST);
			$libelle		= $_POST['libelle_categorie_produit'];
			$id				= $_POST['id'];

		#requete pour verifier que la catégorie est unique
		$req_verification = "SELECT * FROM categorie_produit WHERE libelle_categorie_produit = :libelle AND id_categorie_produit <> :id";

		$verification=$pdo->prepare($req_verification);

		$verification->execute(array(':libelle'=>$libelle,':id'=>$id));

		$data = $verification->fetch();

		if ($data)
		{
			# code
			?>
				<script type='text/javascript'>
					alert('Cette catégorie de produit existe déjà.');
				</script>
			<?php
		}
		else
		{
			# Si tout est Bon
				# req de modiffication dans la table categorie_produit
				$req_update = "UPDATE categorie_produit SET libelle_categorie_produit = :libelle WHERE id_categorie_produit =:id";

				# preparation de la req
				$statement_update = $pdo->prepare($req_update);

				# execution de req en passant les variables
				$statement_update->execute(array(':libelle'=>$libelle,':id'=>$id));
			?>

				<script type='text/javascript'>
					alert('Catégorie modiffiée avec succès.');
				</script>

			<?php 
		}

	}
}
catch (Exception $e)
{
	print "Erreur ! :" .$e ->getMessage() ."<br/>";
	die();
}

				?>
<script type="text/javascript">
	// Redirection automatique aprés 0secondes
	setTimeout(function(){window.location.href="../../categorie_produit.php";},0);
</script>
