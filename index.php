<?php
    include 'functions.php';

    $employe = getNombreEmployes();
    $projet = getNombreProjets();
    $step = getNombreSteps();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lear Corporation | RH Administration</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="shortcut icon" href="dist/img/favicon.ico">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="dist/img/lear_logo.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="dist/img/lear_logo_full.png"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
    
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

              </li>
              <!-- Menu Footer-->
              <li class="user-footer">

              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>

    <!-- The SideBar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="header">&nbsp;</li>
        <li class="active"><a href="index.php"><i class="fa fa-home"></i><span>Accueil</span></a></li>

        <li class="header">Menu</li>
        <li class="treeview">
          <a href="#">
          <i class="fa fa-users"></i>
          <span>Gestion des Employés</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Ajouter_Employe.php"><i class="fa fa-plus-square"></i> Ajouter Employé</a></li>
            <li><a href="Modifier_Employe.php"><i class="fa fa-edit"></i> Modifier Employé</a></li>
            <li><a href="Affecter_Employe.php"><i class="fa fa-users"></i> Affecter Employé</a></li>
            <li><a href="Supprimer_Employe.php"><i class="fa fa-trash"></i> Supprimer Employé</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
          <i class="fa fa-clipboard"></i>
          <span>Gestion des Projets</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Gestion_Projet.php"><i class="fa fa-list"></i> Liste des Projets</a></li>
            <li><a href="Ajouter_Projet.php"><i class="fa fa-plus-square"></i> Ajouter Projet</a></li>
            <li><a href="Gestion_Steps.php"><i class="fa fa-file"></i> Gestion des Steps</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
          <i class="fa ion-clipboard"></i>
          <span>Gestion des Quiz</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="ShowQuiz.php"><i class="fa fa-list"></i> Liste des Quiz</a></li>
            <li><a href="Ajouter_Quiz.php"><i class="fa fa-plus-square"></i> Ajouter Quiz</a></li>
          </ul>
        </li>

        <li><a href="Certification.php"><i class="fa ionicons ion-ribbon-b"></i><span>Gestion des certifications</span></a></li>

        <li class="treeview">
          <a href="#">
          <i class="fa fa-bar-chart-o"></i>
          <span>Matrices et Rapports</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Rapport_Projet.php"><i class="fa fa-table"></i> Par Projet</a></li>
            <li><a href="Rapport_Employé.php"><i class="fa fa-table"></i> Par Employé</a></li>
          </ul>
        </li>

        <li class="header">&nbsp;</li>
        <li><a href="Logs.php"><i class="fa fa-history"></i><span>Historique & Logs</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Accueil
        <br><small>Tableau de bord</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="row"> <!-- la class row sert à ligner deux div ou plus dans la même ligne -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue-active">
            <div class="inner">
              <h3>Employés</h3>

              <p>Gestion des employés</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="Gestion_Employe.php" class="small-box-footer">Accèder <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-teal-active">
            <div class="inner">
              <h3>Projets</h3>

              <p>Gestion des projets</p>
            </div>
            <div class="icon">
              <i class="ion ion-folder"></i>
            </div>
            <a href="Gestion_Projet.php" class="small-box-footer">Accèder <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive-active">
            <div class="inner">
              <h3>Quiz</h3>

              <p>Gestion des quiz</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="ShowQuiz.php" class="small-box-footer">Accèder <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow-active">
            <div class="inner">
              <h3>Certifications</h3>

              <p>Gestion des certifications</p>
            </div>
            <div class="icon">
              <i class="ion ion-ribbon-b"></i>
            </div>
            <a href="Certification.php" class="small-box-footer">Accèder <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red-active">
            <div class="inner">
              <h3>Matrices</h3>

              <p>Matrices & Rapports</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="Rapport_Projet.php" class="small-box-footer">Accèder <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple-active">
            <div class="inner">
              <h3>Historique</h3>

              <p>Historique & logs</p>
            </div>
            <div class="icon">
              <i class="ion ion-clock"></i>
            </div>
            <a href="Logs.php" class="small-box-footer">Accèder <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>

    <br><br><br>

    <div class="row">
      <div class="box box-primary col-xs-6 col-lg-10">
            <div class="box-header with-border">
              <h3 class="box-title">Statistiques :</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue-active"><i class="ion ion-person-stalker"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Nombre des Employés</span>
              <span class="info-box-number"><?php echo $employe[0][0]; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red-active"><i class="ion ion-folder"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Nombre des Projets</span>
              <span class="info-box-number"><?php echo $projet[0][0]; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green-active"><i class="fa fa-arrow-right"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Nombre des Steps</span>
              <span class="info-box-number"><?php echo $step[0][0]; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

      </div>
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer -->
          </div>
    </div>


    </section>
    <!-- /.content -->
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2016-2017 <a href="https://www.lear.com">Lear Corporation</a>.</strong> All rights
    reserved.
  </footer>
  </div>

  

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
