<?php
require_once "assets/php/auth0.php";
include 'assets/php/functions.php';
logged_only();
include "assets/php/config.php";
include "assets/php/init_utilisateur.php";
include "assets/php/query.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
   <title>GCS PROJETS</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">
 
<div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html">
       <img src="assets/images/favicon.png" class="favicon" alt="favicon">
        <h5 class="logo-text">GCS PROJETS</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">NAVIGATION</li>
     <li>
        <a href="dashboard.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>HOME</span>
        </a>
      </li>

      <li>
        <a href="projet.php">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Projet</span>
        </a>
      </li>

    <li>
        <a href="categorie_produit.php">
          <i class="zmdi zmdi-calendar-check"></i> <span>Categorie produit</span>
          <!--<small class="badge float-right badge-light">New</small>-->
        </a>
    </li>

    <li>
      <a href="produit.php">
          <i class="zmdi zmdi-assignment-check"></i> <span>Produit</span>
          </a>
    </li>
    <li>
        <a href="utilisateur.php">
          <i class="zmdi zmdi-invert-colors"></i> <span>Utilisateurs</span>
        </a>
    </li>

    </ul>
   
   </div>
   <!--End sidebar-wrapper-->
<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
      <i class="fa fa-envelope-open-o"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $_SESSION['nom_utilisateur'] ?> </h6>
            <p class="user-subtitle"><?php echo  $_SESSION['email_utilisateur'] ?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"> <a href="assets/php/logout.php"><i class="icon-power mr-2"></i> Deconnexion</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>


<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

  <!--Start Dashboard Content-->

	<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <!--<div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <p class="mb-0 text-white small-font"><a href=liste_équipements_livres.php>Liste de tous les équipements </a></p>
                </div>
            </div>-->
            <div class="col-12 col-lg-6 col-xl-6 border-light">
                <div class="card-body">
                  <p class="mb-0 text-black small-font"><a href=liste_equipements_livres.php>Liste des equipements livres</a></p>
                </div>
            </div>
            
            <div class="col-12 col-lg-6 col-xl-6 border-light">
                <div class="card-body">
                  <p class="mb-0 text-black small-font"><a href=liste_equipements_non_livres.php>Liste des equipements non livres</a></p>
                </div>
            </div>
        </div>
    </div>
 </div> 


 <div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-black mb-0">Projets <span class="float-right"><i class="fa fa-shopping-cart"></i></span></h5>
                    <div class="progress my-3" style="height:5px;">
                       <div class="progress-bar" style="width:60%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Total Orders <span class="float-right">+4.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">Projets en cours <span class="float-right"><i class="fa fa-usd"></i></span></h5>
                    <div class="progress my-3" style="height:5px;">
                       <div class="progress-bar" style="width:60%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Total Revenue <span class="float-right">+1.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">Projets termines <span class="float-right"><i class="fa fa-eye"></i></span></h5>
                    <div class="progress my-3" style="height:5px;">
                       <div class="progress-bar" style="width:60%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Visitors <span class="float-right">+5.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
        </div>
    </div>
 </div> 

  <div class="row">
   <div class="col-12 col-lg-12">
     <div class="card">
       <div class="card-header">liste projets
        <?php 
        var_dump($_SESSION);
         ?>
      <div class="card-action">
             <div class="dropdown">
             <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
              <i class="icon-options"></i>
             </a>
              <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="javascript:void();">Action</a>
              <a class="dropdown-item" href="javascript:void();">Another action</a>
              <a class="dropdown-item" href="javascript:void();">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="javascript:void();">Separated link</a>
               </div>
              </div>
             </div>
     </div>
         <div class="table-responsive">
                 <table class="table align-items-center table-flush table-borderless">
                  <thead>
                   <tr>
                      <th width="25%">Projet</th>
                      <th width="25%">Produit</th>
                      <th width="25%">Quantite commandee</th>
                      <th width="25%">Quantite livree</th>
                      <th width="25%">Actions</th>
                   </tr>
                   </thead>
                   <tbody>
                    <?php

                                            // while ($row_appartenir=$statement_appartenir->fetch())
                                            // {
                                            //     $id_projet=$row_projet['id_projet'];
                                            //     $query_projet="SELECT * FROM projet WHERE id_projet=:id_projet ";
                                            //     $statement_projet=$pdo->prepare($query_projet);
                                            //     $statement_projet->execute(array(':id_projet'=>$id_projet));
                                            //     $row_projet=$statement_projet->fetch();

                                            //     $id_produit=$row_produit['id_produit'];
                                            //     $query_produit="SELECT * FROM produit WHERE id_produit=:id_produit ";
                                            //     $statement_produit=$pdo->prepare($query_produit);
                                            //     $statement_produit->execute(array(':id_produit'=>$id_produit));
                                            //     $row_produit=$statement_produit->fetch();
                                                

                                            //     echo "<tr>";
                                            //     echo "<td><p class='c_name'>".$row_appartenir['nom_appartenir'];
                                            //     echo "<td><span class='email'>".$row_utilisateur['email_utilisateur']."</span></td>";
                                            //     echo "<td><i class=''></i>".$row_projet['nom_projet']."</td>";
                                            //     echo "<td><i class=''></i>".$row_produit['libelle_produit']."</td>";
                                            //     echo "<td><i class=''></i>".$row_quantite_commandee['quantite_produit']."</td>";
                                            //     echo "<td><i class=''></i>".$row_quantite_livree['quantite_produit']."</td>";


                                            //     echo "<td><a class='btn btn-info'>Modifier</a> <a class='btn btn-danger' href='delete/delete_utilisateur.php?id_appartenir=$row_appartenir[id_appartenir]\" onClick=\"return confirm('Voulez-vous vraiment supprimer cet appartenir ?')\'>Supprimer</a></td>";
                                            //     //echo"<td>  </td>";
                                            //     echo "</tr>";


                                                //echo "<td><a class='btn btn-info'><a class='btn btn-info'></i></button><a href=\"delete\delete_utilisateur.php?id_utilisateur=$row_utilisateur[id_utilisateur]\" onClick=\"return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')\"><a class='btn btn-info'><a class='btn btn-info'></i></button></td>";
                                                //echo "</tr>";


                       

                                            // }

                                    ?>


                    <tr>

      <!--End Dashboard Content-->
	  
	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
    
    </div>
    <!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2020 GCS Project
        </div>
      </div>
    </footer>
	<!--End footer-->

  <!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <script src="assets/js/jquery.loading-indicator.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  <!-- Chart js -->
  
  <script src="assets/plugins/Chart.js/Chart.min.js"></script>
 
  <!-- Index js -->
  <script src="assets/js/index.js"></script>

</body>
</html>
