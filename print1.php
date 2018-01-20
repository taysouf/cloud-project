<?php

require_once 'functions.php';

if (!empty($_GET['projetId'])) {
    $projetId = $_GET['projetId'];
}else{
  header('Location:Certification.php');
}
$projet = getProjetById($projetId);
$steps = getStepsByProjetId($projetId);
$employes = getEmployeByProjet($projetId);

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
  <style type="text/css" media="print">
  @page { size: landscape; }
  </style>

</head>
<body onload="window.print()" class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <header class="main-header no-print">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="dist/img/lear_logo.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="dist/img/lear_logo_full.png"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top no-print">
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
  <aside class="main-sidebar no-print">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="header">&nbsp;</li>
        <li ><a href="index.php"><i class="fa fa-home"></i><span>Accueil</span></a></li>

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

        <li class="treeview menu-open active">
          <a href="#">
          <i class="fa fa-bar-chart-o"></i>
          <span>Matrices et Rapports</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="Rapport_Projet.php"><i class="fa fa-table"></i> Par Projet</a></li>
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
        Matrices de certification
        <br><small>Par Projet</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content row">
        <br>
        <!-- style="overflow-x:auto;" -->
        <div class="box col-md-12" >

          <div class="box-header">Projet : <span class="text-uppercase text-bold"><?php echo $projet[0]['designation'].' | '.$projet[0]['client']; ?></span>
          
          </div>
          <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped text-uppercase" style="height: 100px; font-size: 12px;">
                <thead><tr><th class="col-md-1"></th><th class="col-md-1"></th><th colspan=<?php echo (count($steps)); ?> class="text-center warning">Steps</th></tr>
                <tr><th class="col-md-1">Nom & Prénom</th><th class="text-center col-md-1">MTC</th><?php foreach ($steps as $st ) {
                  echo "<th class=\"text-center col-md-1\">".$st['designation']."</th>";
                } ?></tr></thead>
                
                <tbody>
                <?php 
                  foreach ($employes as $em) {
                    echo "<tr><td><b>".$em['nom'].' '.$em['prenom']."<b></td><td class=\"info text-center\">".$em['matricule']."</td>";
                    foreach ($steps as $step) {
                      $there = checkAffectation($em['matricule'],$projetId,$step['stepId']);
                      if (isset($there[0]['dateD'])) {
                        echo "<td title=\"Certifié le : ".$there[0]['dateD']."\" class=\"text-center\">D</td>";
                      }elseif (isset($there[0]['dateC'])) {
                        echo "<td title=\"Certifié le : ".$there[0]['dateC']."\" class=\"text-center\">C</td>";
                      }elseif (isset($there[0]['dateB'])) {
                        echo "<td title=\"Certifié le : ".$there[0]['dateB']."\" class=\"text-center\">B</td>";
                      }elseif (isset($there[0]['dateA'])) {
                        echo "<td title=\"Certifié le : ".$there[0]['dateA']."\" class=\"text-center\">A</td>";
                      }else{
                        echo "<td></td>";
                      }
                    }
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

  <footer class="main-footer no-print">
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
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": false
  });
</script>
</body>
</html>
