<?php
include ("config.php");
try 
{
  if (isset($_POST['addproduit'])) 
  {
    # code...
    //recuperation des variables a partir du formulaire

       // extract($_POST);

        $nom_produit =$_POST['nom_produit'];
        $description_produit =$_POST['description_produit'];
        $id_categorie_produit =$_POST['id_categorie_produit'];
        
     

    //requete pour verifier que la catégorie est unique 
        $queryproduit="SELECT * FROM produit WHERE nom_produit=?";
        $verifproduit=$pdo->prepare($queryproduit,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $verifproduit->execute(array($nom_produit));

        if ($countproduit=$verifproduit->fetch()) 
        {
          # code...
           ?>
                <script type='text/javascript'>
                    alert('Ce produit existe déjà.');
                </script>
             <?php
        }
        else
        {
          # code...
                //req d'insertion dans la table produit
                $query_insert="INSERT INTO produit (nom_produit, description_produit, id_categorie_produit) VALUES (:nom_produit, :description_produit, :id_categorie_produit)";
                $statement_insert=$pdo->prepare($query_insert,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $statement_insert->execute(array(':nom_produit'=>$nom_produit, ':description_produit'=>$description_produit, ':id_categorie_produit'=>$id_categorie_produit));
           ?>
                <!-- <script type='text/javascript'>
                    alert('produit ajouté avec succès.');
                </script> -->
                <?php 
        }
 

        echo $nom_produit;
        echo $description_produit;
        echo $id_categorie_produit;
  }
} 
catch (Exception $e)
{
  print "Erreur ! :" .$e ->getMessage() ."<br/>";
    die();
}

        ?>
<script type="text/javascript">
      //Redirection automatique aprés 3s
    setTimeout(function(){window.location.href="../../produit.php";},2);
</script>
