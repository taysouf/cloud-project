<?php

require_once 'functions.php';
if (!empty($_GET['matricule'])) {
    $matricule = $_GET['matricule'];
}else{
  header('Location:Affecter_Employe.php');
}
$employe = getEmployeById($matricule);
$projets = getProjets();
$r  = getAffectations($matricule);

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

<div class="wrapper">

  <header class="main-header">
    <div id="messageInfo"></div>
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
        <li ><a href="index.php"><i class="fa fa-home"></i><span>Accueil</span></a></li>

        <li class="header">Menu</li>
        <li class="treeview menu-open active">
          <a href="#">
          <i class="fa fa-users"></i>
          <span>Gestion des Employés</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Ajouter_Employe.php"><i class="fa fa-plus-square"></i> Ajouter Employé</a></li>
            <li><a href="Modifier_Employe.php"><i class="fa fa-edit"></i> Modifier Employé</a></li>
            <li class="active"><a href="Affecter_Employe.php"><i class="fa fa-users"></i> Affecter Employé</a></li>
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
        Gestion des Employés
        <br><small>Affectation Employé</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <div class="col-md-1">
        </div>
        
        <div class="col-md-10 form-horizontal">
            <fieldset class="form-group">
              <legend>Informations d'identification</legend>
              <div class="form-group">
                <label class="control-label col-sm-2" for="nom">Nom:</label>
                <div class="col-sm-10">
                  <input required="true" type="text" readonly value="<?php echo $employe['nom']; ?>" class="form-control" id="nom" placeholder="Entrer le nom" name="nom">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="prenom">Prénom:</label>
                <div class="col-sm-10">
                  <input required="true" type="text" readonly value="<?php echo $employe['prenom']; ?>" class="form-control" id="prenom" placeholder="Entrer le prénom" name="prenom">
                </div>
              </div>              
              <div class="form-group">
                <label class="control-label col-sm-2" for="matricule">Matricule:</label>
                <div class="col-sm-10">
                  <input required="true" type="text" class="form-control" readonly id="matricule" value="<?php echo $matricule; ?>" placeholder="Entrer le matricule" name="matricule">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="cardId">CardID:</label>
                <div class="col-sm-10">
                  <input required="true" type="number" min=1 class="form-control" readonly id="cardId" value="<?php echo $employe['cardId']; ?>" placeholder="Entrer le CardID" name="cardId">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="dateEntree">Date d'Entrée:</label>
                <div class="col-sm-10">
                  <input required="true" type="date" class="form-control" readonly id="dateEntree" value="<?php echo $employe['dateEntree']; ?>" placeholder="Enter la date d'entrée" name="dateEntree">
                </div>
              </div>
            </fieldset>
            <div class="row">
            <div class="box col-md-12">
              
              <div class="box-header">Liste des projets/steps :</div>
              <div class="box-body">
                <table id="example1" class=" table table-bordered table-striped text-uppercase">
                  <thead><tr><th>ZONE</th><th>PROJET</th><th>CLIENT</th><th>STEP</th><th>DATE AFFECTATION</th><th>DESAFFECTER</th></tr></thead>
                  <tfoot><tr><th>ZONE</th><th>PROJET</th><th>CLIENT</th><th>STEP</th><th>DATE AFFECTATION</th><th>DESAFFECTER</th></tr></tfoot>
                  <tbody>
                  <?php
                        foreach ($r as $projet) {
                          echo "<tr>";
                          echo "<td>";
                          echo $projet['zone'];
                          echo "</td>";
                          echo "<td>";
                          echo $projet['nomProjet'];
                          echo "</td>";
                          echo "<td>";
                          echo $projet['client'];
                          echo "</td>";
                          echo "<td>";
                          echo $projet['nomStep'];
                          echo "</td>";
                          echo "<td>";
                          echo $projet['dateA'];
                          echo "</td>";
                          echo "<td style=\"text-align: center;\"><button title=\"désaffecter employé\" type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"desaffecterEmploye(";
                          echo $matricule.','.$projet['projetId'].','.$projet['stepId'];
                          echo ")\"><i class=\"fa fa-sign-out\"></i></button></td>";
                          echo "</tr>";
                        }
                  ?>
                  </tbody>  
                </table>
                 </div>
            </div>
            </div>
            <br>
              <br>
              <form class="form-horizontal" id="formAffectation">
              <fieldset class="form-group">
              <legend>Affectation :</legend>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="projet">Projet:</label>
                  <div class="col-sm-10 text-uppercase">
                    <select id="projet" required class="col-sm-10 form-control text-uppercase">
                    <option class="text-uppercase" value="NULL">  </option>
                      <?php
                          foreach ($projets as $row) {
                            echo "<option class=\"text-uppercase\" value = \"".$row['projetId']."\">".$row['designation']." - ".$row['client']."</option>";
                          }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="step">Step:</label>
                  <div class="col-sm-10">
                    <select id="step" required class="form-control col-sm-10 text-uppercase">
                    <option class="text-uppercase" value="NULL"> </option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="step">Date Affectation:</label>
                  <div class="col-sm-10">
                    <input required type="date" class="form-control" id="date" value="<?php echo date('Y-m-d')?>" placeholder="Enter la date d'affectation" name="date">
                  </div>
                </div>

              </fieldset></form>                  
          <br>

          <div class="row col-md-10 col-sm-offset-2">
                  <button style="width: 150px;" id="btn-submitFormAffect" class="btn btn-success col-sm-offset-3">Enregistrer</button>
                  <button style="width: 150px;" id="btn-annulerFormAffect" class="btn btn-danger col-sm-offset-1">Annuler</button>
          </div>
        </div>
      </div>

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

<script type="text/javascript" src="dist/pnotify/pnotify.custom.min.js"></script>

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
