<?php
require_once "assets/php/auth0.php";
include "assets/php/config.php";
include "assets/php/init_user.php";
include "assets/php/query.php";
 ?>
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>:: GCS Maintenance :: Inscrire un utilisateur</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body class="theme-blush">

  <!-- FICHIER MENU -->
  <?php
  $lib_typutilisateur=$rowtype['lib_typutilisateur'];
  if ($lib_typutilisateur == "User")
   {
   	include 'assets/php/menu_user.php';
   }
   else
   {
     include 'assets/php/menu.php';
   }
  ?><section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <h2>AJOUT D'UN NOUVEL UTILISATEUR</h2>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Formulaire d'enregistrement</h2>
                            <!--<ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>-->
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="assets/php/add_user.php">
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Nom" name="nom_utilisateur" required="required">
                                </div>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Prénom(s)" name="pnom_utilisateur" required="required">
                                </div>
                                <div class="form-group form-float">
                                    <input type="email" class="form-control" placeholder="Email" name="email_utilisateur" required="required">
                                </div>
                                <div class="form-group form-float">
                                    <input type="tel" class="form-control" placeholder="Téléphone" name="tel_utilisateur" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required="required">
                                </div>


                                <!--<input type="text" name="id_utilisateur" hidden="hidden" value=<?php //echo $rowselect['id_utilisateur'] ; ?> >-->

                                <div class="form-group form-float">
                                    <select class="form-control" required="" name="id_dep">
                                               <?php
                                                  while($row_dep=$statement_dep->fetch())
                                                    {
                                                        echo "<option value=".$row_dep['id_dep'].">". $row_dep['lib_dep']." </option>";
                                                    }
                                                ?>
                                    </select>
                                </div>
                                <div class="form-group form-float">
                                    <select class="form-control" required="" name="id_typutilisateur">
                                               <?php
                                                  while($row_typutilisateur=$statement_typutilisateur->fetch())
                                                    {
                                                        echo "<option value=".$row_typutilisateur['id_typutilisateur'].">". $row_typutilisateur['lib_typutilisateur']." </option>";
                                                    }
                                                ?>
                                    </select>
                                </div>
                                <input type="text" name="id_utilisateur" hidden="hidden" value=<?php echo $rowselect['id_utilisateur'] ; ?> >
                                <div class="form-group form-float">
                                    <input type="password" class="form-control" placeholder="Mot de passe" name="mdp_utilisateur" required>
                                </div>
                                <div class="form-group form-float">
                                    <input type="password" class="form-control" placeholder="Confirmez le mot de passe" name="remdp_utilisateur" required>
                                </div>
                                <!--<div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="gender" id="male" class="with-gap" value="option1">
                                        <label for="male">Male</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="gender" id="Female" class="with-gap" value="option2" checked="">
                                        <label for="Female">Female</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <textarea name="description" cols="30" rows="5" placeholder="Description" class="form-control no-resize" required></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <input id="checkbox" type="checkbox">
                                        <label for="checkbox">I have read and accept the terms</label>
                                    </div>
                                </div>-->
                                <button class="btn btn-raised btn-primary waves-effect" type="submit" name="adduser">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/plugins/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css -->
<script src="assets/plugins/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/forms/form-validation.js"></script>
</body>
</html>
