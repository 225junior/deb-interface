<?php
//connexion a la base de données
include("config.php");

try 
{
    if (isset($_POST['addutilisateur'])) 
    {
        # code...
        //recuperation des variables a partir du formulaire

       // extract($_POST);

         $nom_utilisateur=$_POST['nom_utilisateur'];
         $prenom_utilisateur=$_POST['prenom_utilisateur'];
         $email_utilisateur=$_POST['email_utilisateur'];
         $motpass_utilisateur=$_POST['motpass_utilisateur'];
         $password=$_POST['password'];
         $id_typutilisateur=$_POST['id_typutilisateur'];
        $tel_utilisateur=$_POST['tel_utilisateur'];

        //requete pour verifier que l'email est unique 
        $queryemail="SELECT * FROM utilisateur WHERE email_utilisateur=?";
        $verifemail=$pdo->prepare($queryemail,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $verifemail->execute(array($email_utilisateur));

        if ($countemail=$verifemail->fetch()) 
        {
            # code...
             ?>
                <script type='text/javascript'>
                    alert('Cet email existe déjà.');
                </script>
             <?php
        }
        else
        {
            //check de confirmation du mot de passe
            if ($motpass_utilisateur==$password) 
            {
                # code...
                //req d'insertion dans la table utilisateur
                $query_insert="INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, email_utilisateur, motpass_utilisateur,id_typutilisateur,tel_utilisateur) VALUES (:nom_utilisateur,:prenom_utilisateur,:email_utilisateur,:motpass_utilisateur,:id_typutilisateur,:tel_utilisateur)";
                $statement_insert=$pdo->prepare($query_insert,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $statement_insert->execute(array(':nom_utilisateur'=>$nom_utilisateur,':prenom_utilisateur'=>$prenom_utilisateur,':email_utilisateur'=>$email_utilisateur,':motpass_utilisateur'=>$motpass_utilisateur,':id_typutilisateur'=>$id_typutilisateur,':tel_utilisateur'=>$tel_utilisateur));
               ?>
                <script type='text/javascript'>
                    alert('Enregistrement effectué avec succès.');
                </script>
                <?php
            }
            else
            {
                #code...
                ?>                                          
                <script type='text/javascript'>
                     alert('Les mots de passe ne correspondent pas');
                </script>
                <?php
            }
        }

      echo $nom_utilisateur;
      echo $prenom_utilisateur;
      echo $email_utilisateur;
      echo $motpass_utilisateur;
      echo $password;
      echo $id_typutilisateur;
      echo $tel_utilisateur;

    }
} 
catch (Exception $e) 
{
    print "Erreur ! :" .$e ->getMessage() ."<br/>";
    die();
}

                ?><script type="text/javascript">
      //Redirection automatique aprés 2s
    setTimeout(function(){window.location.href="../../utilisateur.php";},2);
</script>