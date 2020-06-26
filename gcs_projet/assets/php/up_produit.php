<?php
include "config.php";
try 
{
	if (isset($_POST['upproduit'])) 
	{
	# si le bouton modiffié est cliquez
		
		# recuperation des variables a partir du formulaire: extract($_POST);
			$nom_produit			= $_POST['nom_produit'];
			$description_produit	= $_POST['description_produit'];
			$id_categorie_produit	= $_POST['id_categorie_produit'];
			$id_produit				= $_POST['id'];

		#requete pour verifier que la catégorie est unique
			$req_verification = "SELECT * FROM produit WHERE nom_produit = :nom_produit AND description_produit = :description_produit AND id_categorie_produit = :id_categorie_produit AND id_produit <> :id_produit";

			$verification=$pdo->prepare($req_verification);

			$verification->execute(array(':nom_produit'=>$nom_produit,':description_produit'=>$description_produit,':id_categorie_produit'=>$id_categorie_produit,':id_produit'=>$id_produit));

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
		# fin verification
		else
		{
			# Si tout est Bon
				# req de modiffication dans la table categorie_produit
				$req_update = "UPDATE produit SET nom_produit = :nom_produit, description_produit = :description_produit, id_categorie_produit = :id_categorie_produit WHERE id_produit =:id_produit";

				# preparation de la req
				$statement_update = $pdo->prepare($req_update);

				# execution de req en passant les variables
				$statement_update->execute(array(':nom_produit'=>$nom_produit,':description_produit'=>$description_produit,':id_categorie_produit'=>$id_categorie_produit,':id_produit'=>$id_produit));
			?>

				<script type='text/javascript'>
					alert('Catégorie modifiée avec succès.');
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
	setTimeout(function(){window.location.href="../../produit.php";},0);
</script>
