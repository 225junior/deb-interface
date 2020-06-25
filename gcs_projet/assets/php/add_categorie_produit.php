<?php
include "config.php";
try 
{
	if (isset($_POST['addcategorieproduit'])) 
	{
		# code...
		//recuperation des variables a partir du formulaire

       // extract($_POST);

		 $libelle_categorie_produit =$_POST['libelle_categorie_produit'];
		 

		//requete pour verifier que la catégorie est unique 
        $querycategorieproduit="SELECT * FROM categorie_produit WHERE libelle_categorie_produit=?";
        $verifcategorieproduit=$pdo->prepare($querycategorieproduit,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $verifcategorieproduit->execute(array($libelle_categorie_produit));

        if ($countcategorieproduit=$verifcategorieproduit->fetch()) 
        {
        	# code...
        	 ?>
                <script type='text/javascript'>
                    alert('Cette catégorie de produit existe déjà.');
                </script>
             <?php
        }
        else
        {
        	# code...
                //req d'insertion dans la table categorie_produit
                $query_insert="INSERT INTO categorie_produit (libelle_categorie_produit) VALUES (:libelle_categorie_produit)";
                $statement_insert=$pdo->prepare($query_insert,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $statement_insert->execute(array(':libelle_categorie_produit'=>$libelle_categorie_produit));
               ?>
                <script type='text/javascript'>
                    alert('Catégorie de produit ajoutée avec succès.');
                </script>


                <?php 
        }



      echo $libelle_categorie_produit;
   
	}
} 
catch (Exception $e)
{
	print "Erreur ! :" .$e ->getMessage() ."<br/>";
    die();
}

				?>
<script type="text/javascript">
      //Redirection automatique aprés 1s
    setTimeout(function(){window.location.href="../../categorie_produit.php";},2);
</script>
