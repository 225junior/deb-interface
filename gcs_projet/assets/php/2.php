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
        $queryappartenir="SELECT * FROM appartenir WHERE nom_projet=?";
        $verifappartenir=$pdo->prepare($queryappartenir,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $verifappartenir->execute(array($nom_projet));

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



<?php 
//connexion base de données
include("config.php");
include("typeuser.php");
    try
    {
        if(isset($_POST['sigin']))
        {
          $passwd=$_POST['passwd'] ;
          $repasswd=$_POST['repasswd'];
            $email_util=$_POST['email_util'];
            $code_validation=$_POST['code_validation'];
            $id_ent=1;
          

              //requete pour verifier que l'email entrer est unique 
                $queryemail="SELECT * FROM utilisateur WHERE email_util=?";
                $verifemail=$pdo->prepare($queryemail,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
                $verifemail->execute(array($email_util));

                    if($countemail=$verifemail->fetch())
                        {
                            ?>
                                <script type='text/javascript'>
                                    alert('EMAIL EXISTANT, VEUILLEZ REESSAYER SVP!');
                                </script>
                            <?php
                        }
                        else
                        {
                             //check de confirmation du mot de passe
                            if($passwd==$repasswd)
                                {

                                //requete pour verifier le code de l'entreprise
                                    $querycode="SELECT * FROM entreprise WHERE code_validation=?";
                                    $verifcode=$pdo->prepare($querycode,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
                                    $verifcode->execute(array($code_validation));
                                
                                    if ($code=$verifcode->fetch()) 
                                        {  
                                          
                                             //req d'insertion dans la table utilisateurs
                                          $sql="INSERT INTO utilisateur (email_util, passwd, nom_util, pnom_util,id_ent,id_type) VALUES (:email_util,:passwd,:nom_util,:pnom_util,:id_ent,:id_type)";
                                          $result=$pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                                          $result->execute(array(':email_util'=>$_POST['email_util'],':passwd'=>sha1($_POST['passwd']),':nom_util'=>$_POST['nom_util'],':pnom_util'=>$_POST['pnom_util'],':id_ent'=>$code['id_ent'],':id_type'=>$obj['id_type']));
                                          ?>

                                          <script type='text/javascript'>
                                            alert('ENREGISTREMENT EFFECTUE AVEC SUCESS !');
                                          </script>
                                          <?php
                                        }
                                    else
                                    {
                                          ?>                                          
                                               <script type='text/javascript'>
                                                 alert('Code de l\'entreprise erroné, VEUILLEZ REESSAYER SVP!');
                                               </script>
                                            <?php 
                                    }
                                }             
                             else
                              {
                                ?>
                                   <script type='text/javascript'>
                                    alert('VEUILLEZ VERIFIER LE MOT DE PASSE SVP!');
                                   </script>
                                <?php
                              }
                        }           
        }
    }
    catch (PDOException $e)
    {
    print "Erreur ! :" .$e ->getMessage() ."<br/>";
    die();
    }
?>
