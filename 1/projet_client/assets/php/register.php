<?php 
//connexion base de données
include("config.php");
    try
    {
        if(isset($_POST['logout']))
        {
        	$password_utilisateur=$_POST['password_utilisateur'] ;
        	$confirm_password=$_POST['confirm_password'];
          $user_name=$_POST['user_name'];
          $first_name=$_POST['first_name'];
          $last_name=$_POST['last_name'];
          $user_email=$_POST['user_email'];
          $user_service=$_POST['user_service'];
          $user_categorie=$_POST['user_categorie'];
           

              //requete pour verifier que le login entrer est unique 
                $querylogin="SELECT * FROM login WHERE user_name=?";
                $veriflogin=$pdo->prepare($querylogin,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
                $veriflogin->execute(array($user_name));

                    if($countlogin=$veriflogin->fetch())
                        {
                            ?>
                                <script type='text/javascript'>
                                    alert('LOGIN EXISTANT, VEUILLEZ REESSAYER SVP!');
                                    setTimeout(function(){window.location.href="../../login.html";},100);
                                </script>
                            <?php
                        }
                        else
                        {
                             //check de confirmation du mot de passe
                            if($user_password==$confirm_password)
                                { 
                                          
                                             //req d'insertion dans la table login
                                          $sql="INSERT INTO login (user_name, user_password, first_name, last_name,user_email,user_service,user_categorie) VALUES (:user_name,:user_password,:first_name,:last_name,:user_email,:user_service,:user_categorie)";
                                          $result=$pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                                          $result->execute(array(':user_name'=>$user_name,':user_password'=>$user_password,':first_name'=>$first_name,':last_name'=>$last_name,':user_email'=>$user_email,':user_service'=>$user_service,':user_categorie'=>$user_categorie));
                                          ?>

                                          <script type='text/javascript'>
                                            alert('ENREGISTREMENT EFFECTUE AVEC SUCESS !!!');
                                          </script>
                                          <?php
                                }             
                             else
                              {
                                ?>
                                   <script type='text/javascript'>
                                    alert('VEUILLEZ VERIFIER LE MOT DE PASSE SVP!');
                                    setTimeout(function(){window.location.href="../../login.html";},1000);
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
