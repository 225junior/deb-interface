<?php
include ("config.php");
try 
{
  if (isset($_POST['addprojet'])) 
  {
    # code...
    //recuperation des variables a partir du formulaire

       // extract($_POST);

         $id_projet =$_POST['id_projet'];
         $id_produit =$_POST['id_produit'];
         $quantite_produit =$_POST['quantite_produit'];
         $statut_produit=$_POST['statut_produit']


    //requete pour verifier que la catégorie est unique 
        $queryidprojet="SELECT * FROM appartenir WHERE id_projet=?";
        $verifidprojet=$pdo->prepare($queryidprojet,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $verifidprojet->execute(array($id_projet));

        if ($countidprojet=$verifidprojet->fetch()) 
        {
         
        //requete pour verifier que la catégorie est unique 
        $queryidproduit="SELECT * FROM appartenir WHERE id_produit=?";
        $verifidproduit=$pdo->prepare($queryidproduit,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $verifidproduit->execute(array($id_produit));

        if ($countidproduit=$verifidproduit->fetch()) 
        {


          //requete pour verifier que la catégorie est unique 
        $queryquantite="SELECT * FROM appartenir WHERE quantite_produit=?";
        $verifquantite=$pdo->prepare($queryquantite,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $verifquantite->execute(array($quantite_produit));

        if ($countquantite=$verifquantite->fetch()) 
        {

          //requete pour verifier que la catégorie est unique 
        $querystatut="SELECT * FROM appartenir WHERE statut_produit=?";
        $verifstatut=$pdo->prepare($querystatut,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $verifstatut->execute(array($statut_produit));

        if ($countstatut=$verifstatut->fetch()) 
        {

          # code...
           ?>
                <script type='text/javascript'>
                    alert('Ce projet existe déjà.');
                </script>
             <?php
        }
      }
    }
  }

        else
        {
          # code...
                //req d'insertion dans la table projet
                $query_insert="INSERT INTO appartenir (nom_projet) VALUES (:nom_projet)";
                $statement_insert=$pdo->prepare($query_insert,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $statement_insert->execute(array(':nom_projet'=>$nom_projet));


        else
        {
                 //req d'insertion dans la table produit
                $query_insert="INSERT INTO appartenir(nom_produit) VALUES (:nom_produit)";
                $statement_insert=$pdo->prepare($query_insert,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $statement_insert->execute(array(':nom_produit'=>$nom_produit));


        else
        {
                 //req d'insertion dans la table quantité
                $query_insert="INSERT INTO appartenir (quantite_produit) VALUES (:quantite_produit)";
                $statement_insert=$pdo->prepare($query_insert,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $statement_insert->execute(array(':quantite_produit'=>$quantite_produit));



        else
        {
                 //req d'insertion dans la table statut
                $query_insert="INSERT INTO appartenir (statut_produit) VALUES (:statut_produit)";
                $statement_insert=$pdo->prepare($query_insert,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $statement_insert->execute(array(':statut_produit'=>$statut_produit));


               ?>
                <script type='text/javascript'>
                    alert('Projet ajouté.');
                </script>
                <?php 
        }
      }
    }
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
    setTimeout(function(){window.location.href="../../liste_equipements_non_livre.php";},100);
</script>


<script type="text/javascript">
      //Redirection automatique aprés 3s
    setTimeout(function(){window.location.href="../../liste_equipements_non_livre.php";},100);
</script>