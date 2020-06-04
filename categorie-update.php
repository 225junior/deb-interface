<!-- head including -->
    <?php include("includes/head.php") ?>

    <body class="bg-theme bg-theme1">

    <?php include_once('config/config.php')?>

    <?php include_once('includes/loader.php')?>

    <?php require'includes/sidebar.php' ?>

    <?php include_once('includes/topbar.php');?>
<!-- End head including -->









<div class="clearfix"></div>
    
    <div class="content-wrapper">
        <div class="container-fluid">

        <?php
                logged_only();
            
                if (!empty($_SESSION['flash'])) { ?>
                    
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">×</font>
                            </font>
                        </button>
                        <div class="alert-message">
                            <span>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Connexion Reussie! <br></font>
                                </font>
                            </span>
                        </div>
                    </div>
                
                <?php } $_SESSION['flash'] = null; 
        ?>


<!--Start User-Create Content-->

        <?php 
            require'config/config.php';
            $req = $bd->prepare('SELECT * FROM categorie_equipement WHERE id_categorie_equipement = ? ');
            $req->execute([$_GET['id']]);
            $categorie_equipement = $req->fetch();
            if ($_POST) {
                $errors = array();

               if (empty($_POST['libelle'])) {
                        $errors['libelle'] = "Libelle Invalide (Alpha-Numerique)";
                }

                if (empty($errors)) {
                    // Si le tabeau des erreurs est vide
                    // debut de l'enregistrement

                        $req = $bd->prepare("UPDATE categorie_equipement 
                        SET libelle_categorie_equipement = ? WHERE `categorie_equipement`.`id_categorie_equipement` = ".$_GET['id']);

                        $req->execute( [ $_POST['libelle']]);

                        $_SESSION['flash']['success'] = 'Modification Reusie!';
                        echo '<script> document.location.replace("categorie.php"); </script>';
                        exit();
                }
            }
         ?>


<div class="row m-3">

    <div class="col-12">
        <h4 class="text-left">categorie equipement → Modification : <span style="text-transform: uppercase;"> <?= $categorie_equipement['libelle_categorie_equipement']?></span></h4>
    </div>

</div>

<div class="row m-3">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-head">
                <?php if (!empty($_SESSION['flash']['danger'])) { ?>
                
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">×</font>
                            </font>
                        </button>
                        <div class="alert-message">
                            <span>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"><?= $_SESSION['flash']['danger'] ?> <br></font>
                                </font>
                            </span>
                        </div>
                    </div>

                <?php }if (!empty($_SESSION['flash']['success'])) { ?>
                
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">×</font>
                            </font>
                        </button>
                        <div class="alert-message">
                            <span>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"><?= $_SESSION['flash']['success'] ?> <br></font>
                                </font>
                            </span>
                        </div>
                    </div>
                <?php } $_SESSION['flash'] = null; 
                    if (!empty($errors)) {?>

                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">×</font>
                            </font>
                        </button>
                    <div class="alert-message">
                    <?php foreach ($errors as $error ) {?>
                        <span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;"><?= $error ?> <br></font>
                            </font>
                        </span>
                <?php } ?>

            </div>
<?php       } ?>
            </div>
        <div class="card-body">





             <form method="POST">
                    <!-- name = libelle  -->
               <div class="form-group" >
                    <label for="input-1">Titre De la categorie</label>
                    <input type="text" name="libelle" value="<?= $categorie_equipement['libelle_categorie_equipement']?>" class="form-control" required id="input-1" placeholder="Titre De la categorie_equipement">
                </div>


                    <!-- name = valider  -->
                <div class="form-group">
                    <button type="submit" name="valider" class="btn btn-info px-5 btn-block">Modifier</button>
                </div>
            </form>





        </div>
        </div>
    </div>
</div>










<!--End Dashboard Content-->
    </div><!--End container-fluid-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
    
  <?php include'includes/footer.php'?>
   
</div><!--End wrapper-->











  <?php include'includes/js.php'?>
  

  
</body>
</html>
