<?php

require_once 'functions.php';

if (!empty($_GET['projetId'])) {
    $projetId = $_GET['projetId'];
}else{
  header('Location:Certification.php');
}

$projets = getProjetById($projetId);
$r = getStepsByProjetId($projetId);

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
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" type="text/css" media="all" href="dist/pnotify/pnotify.custom.min.css">

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
<div id="messageInfo"></div>
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
        <li><a href="index.php"><i class="fa fa-home"></i><span>Accueil</span></a></li>

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

        <li class="active"><a href="Certification.php"><i class="fa ionicons ion-ribbon-b"></i><span>Gestion des certifications</span></a></li>

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
        Gestion des Certifications
        <br><small>Choix Step</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content row">
        
        <br>
        <!-- style="overflow-x:auto;" -->
        <div class="box col-sm-12 table-responsive" >

        	<div class="box-header">Liste des steps du projet : <span style="text-transform:uppercase">
          <strong>
          <?php echo $projets[0]['designation']. ' | '.$projets[0]['client']; ?></strong></span>
          </div>

        	<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead><tr><th>STEP_ID</th><th>STEP</th><th>DATE AFFECTATION</th><th>CERTIFIER</th></tr></thead>
                <tfoot><tr><th>STEP_ID</th><th>STEP</th><th>DATE AFFECTATION</th><th>CERTIFIER</th></tr></tfoot>
                <tbody>
                <?php
                      foreach ($r as $step) {
                        echo "<tr>";
                        echo "<td>";
                        echo $step['stepId'];
                        echo "</td>";
                        echo "<td>";
                        echo $step['designation'];
                        echo "</td>";
                        echo "<td>";
                        echo $step['dateAffectation'];
                        echo "</td>";
                        echo "<td style=\"text-align: center;\"><button title=\"Choisir Step\" type=\"button\" class=\"btn btn-primary btn-xs\" onclick=\"certification(";
                        echo $projetId;
                        echo ',';
                        echo $step['stepId'];
                        echo ")\"><i class=\"fa fa-arrow-circle-right\"></i></button></td>";
                        echo "</tr>";
                      }
                ?>
              	</tbody>	
              </table>
            </div>
            <br>
    </section>
    <!-- /.content -->
  </div>

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
<!-- DataTables  -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist\js\pages\dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="dist/js/functions.js"></script>
<script>
	$('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
	});
</script>
</body>
</html>
