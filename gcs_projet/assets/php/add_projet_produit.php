<?php
include ("config.php");
try 
{
  if (isset($_POST['addprojetproduit'])) 
  {
    # code...
    //recuperation des variables a partir du formulaire

       // extract($_POST);

         $id_projet =$_POST['id_projet'];
         $id_produit =$_POST['id_produit'];
         $quantite_produit =$_POST['quantite_produit'];
         $statut_produit=$_POST['statut_produit']
     

    //requete pour verifier que la catégorie est unique 
        //$queryappartenir="SELECT * FROM appartenir WHERE id_projet=? AND id_produit=? AND quantite_produit=? AND statut_produit=?";
        //$verifappartenir=$pdo->prepare($queryappartenir,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        //$verifappartenir->execute(array($id_projet, $id_produit, $quantite_produit, $statut_produit));

        //if ($countappartenir=$verifappartenir->fetch()) 
        //{
          # code...
           ?>
                <!-- //<script type='text/javascript'>
                    alert('Cet enregistrement existe déjà.');
                </script> -->
             <?php
        //}
        //else
        {
          # code...
                //req d'insertion dans la table produit
                $query_insert="INSERT INTO appartenir (id_projet, id_produit, quantite_produit, statut_produit) VALUES (:id_projet, :id_produit, :quantite_produit, :statut_produit)";
                $statement_insert=$pdo->prepare($query_insert,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $statement_insert->execute(array(':id_projet'=>$id_projet, ':id_produit'=>$id_produit, ':quantite_produit'=>$quantite_produit, ':statut_produit'=>$statut_produit));
               ?>
                <script type='text/javascript'>
                    alert('Enregistrement effectué avec succès.');
                </script>

                <?php 
        }

         echo $id_projet ;
         echo $id_produit ;
         echo $quantite_produit ;
         echo $statut_produit;
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
    setTimeout(function(){window.location.href="../../liste_projet.php";},2);
</script>
