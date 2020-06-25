<?php
include ("config.php");
try 
{
  if (isset($_POST['addprojet'])) 
  {
    # code...
    //recuperation des variables a partir du formulaire

       // extract($_POST);

        $nom_projet =$_POST['nom_projet'];
        $date_projet=date('d-m-Y',strtotime($_POST['date_projet']));
        $id_utilisateur =$_POST['id_utilisateur'];
        
     

    //requete pour verifier que la catégorie est unique 
        $queryprojet="SELECT * FROM projet WHERE nom_projet=?";
        $verifprojet=$pdo->prepare($queryprojet,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $verifprojet->execute(array($nom_projet));

        if ($countprojet=$verifprojet->fetch()) 
        {
          # code...
           ?>
                <script type='text/javascript'>
                    alert('Ce projet existe déjà.');
                </script>
             <?php
        }
        else
        {
          # code...
                //req d'insertion dans la table projet
                $query_insert="INSERT INTO projet (nom_projet, date_projet, id_utilisateur) VALUES (:nom_projet, :date_projet, :id_utilisateur)";
                $statement_insert=$pdo->prepare($query_insert,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $statement_insert->execute(array(':nom_projet'=>$nom_projet, ':date_projet'=>$date_projet, ':id_utilisateur'=>$id_utilisateur));
               ?>
                <script type='text/javascript'>
                    alert('Projet ajouté avec succès.');
                </script>
                <?php 
        }


       echo $nom_projet ;
       echo $date_projet ;
       echo $id_utilisateur ;
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
    setTimeout(function(){window.location.href="../../projet.php";},100);
</script>
