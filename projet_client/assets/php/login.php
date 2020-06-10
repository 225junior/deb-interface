<?php 
//connexion base de données
include("config.php");

session_start();
//On verifie que l'utilisateur appuie sur le button de connexion
if(isset($_POST['login']))
{
    //On recupere les valeurs des champs email et mot de passe suivie du hashage du mot de passe (Fonction sha1)

    $email_utilisateur=$_POST['email_utilisateur'];
    //SI CRYPTE
    //$motpass_utilisateur=sha1($_POST['motpass_utilisateur']);
    $motpass_utilisateur=$_POST['motpass_utilisateur'];
    if (!empty($email_utilisateur) AND !empty($motpass_utilisateur)) 
    {

        $query='SELECT * FROM utilisateur WHERE email_utilisateur = :email_utilisateur AND motpass_utilisateur= :motpass_utilisateur limit 1';
        $statement = $pdo->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $statement->execute(
            array(
                'email_utilisateur' => $email_utilisateur,
               'motpass_utilisateur' => $motpass_utilisateur
                 )
                );
        $count=$statement -> rowCount();

        if($count > 0)
            {
                 $userinfo=$statement->fetch();
                 $_SESSION['nom_utilisateur']=$userinfo['nom_utilisateur'];
                 $_SESSION['prenom_utilisateur']=$userinfo['prenom_utilisateur'];
                 $_SESSION['email_utilisateur']= $_POST['email_utilisateur'];
                 $_SESSION['id_typutilisateur']= $_POST['id_typutilisateur'];
                 $_SESSION['tel_utilisateur']=$userinfo['tel_utilisateur'];


                 // //redirection selon le type d'utilisateur
                 // $query_check="SELECT * FROM type_utilisateur WHERE id_typutilisateur=:id_typutilisateur ";
                 // $statement_check=$pdo->prepare($query_check);
                 // $statement_check->execute(array(':id_typutilisateur'=>$userinfo['id_typutilisateur']));
                 // $rowCheck=$statement_check->fetch();
                 // $id_value=$rowCheck['lib_typutilisateur'];

                 // if ($id_value =="admin")
                 //  {
                 //     # code...
                 //    header('Location: includes/admin/content/dashboard.php');
                 //  }
                 //  else
                 //  {
                 //    header('Location: index-1.php');
                 //  }
                 
             header('Location: ../../index.php');
            }
        else if($count == 0)
            {
             ?>        
             <script type="text/javascript">
                alert('Compte inexistant, Veuillez créer un compte svp!');
                setTimeout(function(){window.location.href="../../login.html";},1000);
             </script>
             <?php

            }
        else
            {
                ?>      
             <script type="text/javascript">
                alert('Login incorrect veuillez verifier vos informations!');
                setTimeout(function(){window.location.href="../../login.html";},1000);
             </script>
             <?php
            }
    }
    else
    {
          ?>      
             <script type="text/javascript">
                alert('Veuillez renseigner tous les champs SVP!');
                setTimeout(function(){window.location.href="../../login.html";},100);
             </script>
             <?php

    }
    
}

 ?>