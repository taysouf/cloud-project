<?php

include 'functions.php';

$projetId=$_GET['projetId'];
$step=getStepsByProjetId($projetId);
$projetInfo=getProjetByIdSingle($projetId);
$stepsNotAffected=getNotAffectedSteps($projetId);
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
<div id="messageInfo"></div>
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.html" class="logo">
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
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Déconnexion</a>
                </div>
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
        <li><a href="index.html"><i class="fa fa-home"></i><span>Accueil</span></a></li>

        <li class="header">Menu</li>
        <li class="treeview ">
          <a href="Gestion_Employe.php">
          <i class="fa fa-users"></i>
          <span>Gestion des Employés</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li  class="active"><a href="Ajouter_Employe.php"><i class="fa fa-plus-square"></i> Ajouter Employé</a></li>
            <li><a href="Modifier_Employe.php"><i class="fa fa-edit"></i> Modifier Employé</a></li>
            <li><a href="Affecter_Employe.php"><i class="fa fa-users"></i> Affecter Employé</a></li>
            <li><a href="Supprimer_Employe.php"><i class="fa fa-trash"></i> Supprimer Employé</a></li>
          </ul>
        </li>

        <li class="treeview menu-open active">
          <a href="#">
          <i class="fa fa-clipboard"></i>
          <span>Gestion des Projets</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="Gestion_Projet.php"><i class="fa fa-list"></i> Liste des Projets</a></li>
            <li><a href="Ajouter_Projet.php"><i class="fa fa-plus-square"></i> Ajouter Projet</a></li>
            <li><a href="Gestion_Steps.php"><i class="fa fa-file"></i> Gestion des Steps</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
          <i class="fa fa-check-square-o"></i>
          <span>Gestion des Quiz</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="ShowQuiz.php"><i class="fa fa-list"></i> Liste des Quiz</a></li>
            <li><a href="Ajouter_Quiz.php"><i class="fa fa-plus-square"></i> Ajouter Quiz</a></li>
          </ul>
        </li>
        <li>
          <a href="Certification.php">
          <i class="fa fa-star"></i>
          <span>Gestion des certifications</span>
          </a>
        </li> 
        <li class="treeview">
          <a href="#">
          <i class="fa fa-bar-chart-o"></i>
          <span>Matrices et Rapports</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Rapport_Projet.php"><i class="fa fa-table"></i> Par Projet</a></li>
            <li><a href="Rapport_Niveau.php"><i class="fa fa-area-chart"></i> Par Niveaux</a></li>
            <li><a href="Rapport_Employé.php"><i class="fa fa-line-chart"></i> Par Employé</a></li>
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
        Gestion des Projets
        <br><small>Ajouter Projet</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row"> <!-- la class row sert à ligner deux div ou plus dans la même ligne -->
        
        <div class="col-md-1">
        </div>
        
        <div class="col-md-10">
          <form class="form-horizontal" id="formProjet">
            <fieldset class="form-group">
              <legend>Informations d'identification</legend>
              <div class="form-group">
                <label class="control-label col-sm-2" for="matricule">Nom de Projet :</label>
                <div class="col-sm-10">
                <input type="hidden" name="projetIdModifier" value="<?php echo $projetId; ?>">
                  <input required="true" type="text" value="<?php echo $projetInfo['designation'] ?>"  class="form-control" id="nomProjetModifier" placeholder="Entrer le nom de projet" name="nomProjetModifier">
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-sm-2" for="cardId">Zone :</label>
                <div class="col-sm-10">
                  <select id="zoneProjetModifier" default="<?php echo $projetInfo['zone'] ?>" name="zoneProjetModifier" required class="form-control col-sm-10 zoneProjet">
                    <option class="" value="power" <?php if ($projetInfo['zone']=='power') {echo ' selected="selected"';} ?> >power </option>
                    <option class="" value="magazin" <?php if ($projetInfo['zone']=='magazin') {echo ' selected="selected"';} ?>> magazin</option>
                    <option class="" value="smt" <?php if ($projetInfo['zone']=='smt') {echo ' selected="selected"';} ?>>smt </option>
                    <option class="" value="rework" <?php if ($projetInfo['zone']=='rework') {echo ' selected="selected"';} ?>>rework </option>
                    </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="dateEntree">Client :</label>
                <div class="col-sm-10">
                  <input required="true" type="text" value="<?php echo $projetInfo['client'] ?>" class="form-control" id="clientIdModifier" placeholder="Enter le nom de client" name="clientIdModifier">
                </div>
              </div>
            </fieldset>
            <br>
              <br>
              <fieldset class="form-group" >
              <legend>Affectation :</legend> <div class="pull-right">
              <button type="button" title="Affecter Step" class="btn btn-primary" data-toggle="modal" data-target="#affecterStep"  >Affecter une Step</button>
              <button type="button" title="Ajouter Step" class="btn btn-success AjouterStep " data-toggle="modal" data-target="#addStep"  ><i class="fa fa-plus" ></i></button>
              </div>
                <div class="form-group">
                  <div class="col-sm-12 " id="loadStep" style="background-color: white;">
                  <table id="StepDataTable" class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>Selectionner</th>
                  <th>code Step </th>
                  <th>Designation Step</th>
                  <th>Date d'affectation</th>
                </tr>
                </thead>
                <tbody>
                <?php
                          foreach ($step as $row) {
                            $stepId=$row['stepId'];
                            $designation=$row['designation'];
                            $dateAffectation=$row['dateAffectation'];

                          
                      ?>
                                <tr  >
                  <td> <input type="checkbox" checked="true" name="checkedSteps" value="<?php echo $stepId ?>"></td>
                  <td><?php echo $stepId ?></td>
                  <td><?php echo $designation ?></td>
                  <td><input type="date" value="<?php echo $dateAffectation?>" class="form-control" name="<?php echo 'dateAffectationModifier'.$stepId?>"></td>
              </tr>
              <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Selectionner</th>
                  <th>code Step</th>
                  <th>Designation Step</th>
                  <th>Date d'affectation</th>
                </tr>
                </tfoot>
              </table>

                  </div>
                </div>
              </fieldset>                     
          </form>
          <br>

          <div class="row col-md-12">
                  <button style="width: 150px;" id="btn-ModifierProjet" class="btn btn-success col-sm-offset-3">Enregistrer</button>
                  <button style="width: 150px;" id="btn-annulerForm" class="btn btn-danger col-sm-offset-1">Annuler</button>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
<div class="modal fade" id="addStep" role="dialog" >
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter Step</h4>
        </div>
        <div class="modal-body">
        <form id="ajoutStep">
                <div class="form-group">
                    <label for="email">Description du Step :</label>
                    <input required="true" type="text" class="form-control" id="NomStep" placeholder="Entrer la description du Step" name="NomStep">
                </div>
         </form>
 
        </div>  
        <div class="modal-footer">
          <button style="width: 150px;" id="btn-ajouterStep" class="btn btn-success col-sm-offset-3">Enregistrer</button>
          <button type="button" class="btn btn-danger col-sm-offset-1" id="close" data-dismiss="modal">Annuler</button>
        </div>
      </div>
      
    </div>
  </div>


  <div class="modal fade" id="affecterStep" role="dialog" >
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Affecter Step</h4>
        </div>
        <div class="modal-body">
        <form id="form-affecterStep">
                <div class="form-group">
                    <label for="email">Selecionner une Step :</label>
                    <input type="hidden" name="projetIdAffected" value="<?php echo $projetId ?>">
                    <input type="search" class="form-control" id="searchBox" placeholder="chercher ici ">
                    <br>
                    <select id="stepsNotAffected" name="stepsNotAffected" required class="col-sm-10 form-control text-uppercase">
                    <option class="text-uppercase" value="NULL">  </option>
                      <?php
                          foreach ($stepsNotAffected as $row) {
                            echo "<option class=\"text-uppercase\" value = \"".$row['stepId']."\">".$row['designation']."</option>";
                          }
                      ?>
                    </select>
                </div>
                <br><br>
                <div class="form-group">
                  <label class="control-label"> Date d'affectation</label>
                  <input type="date" class="form-control" name="dateAffectationNotaffected" value="<?php echo date('Y-m-d') ?>">

                </div>
         </form>
 
        </div>  
        <div class="modal-footer">
          <button style="width: 150px;" id="btn-affecterStep" class="btn btn-success col-sm-offset-3">Affecter</button>
          <button type="button" class="btn btn-danger col-sm-offset-1" id="close" data-dismiss="modal">Annuler</button>
        </div>
      </div>
      
    </div>
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
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<script src="dist/js/functions.js"></script>
<script src="dist/js/functionJS.js"></script>
<!-- pnotify -->

<link rel="stylesheet" type="text/css" media="all" href="dist/pnotify/pnotify.custom.min.css">
<script type="text/javascript" src="dist/pnotify/pnotify.custom.min.js"></script>
<script type="text/javascript">
  
  searchBox = document.querySelector("#searchBox");
countries = document.querySelector("#stepsNotAffected");
var when = "keyup"; //You can change this to keydown, keypress or change

searchBox.addEventListener("keyup", function (e) {
    var text = e.target.value; 
    var options = countries.options; 
    for (var i = 0; i < options.length; i++) {
        var option = options[i]; 
        var optionText = option.text; 
        var lowerOptionText = optionText.toLowerCase();
        var lowerText = text.toLowerCase(); 
        var regex = new RegExp("^" + text, "i");
        var match = optionText.match(regex); 
        var contains = lowerOptionText.indexOf(lowerText) != -1;
        if (match || contains) {
            option.selected = true;
            return;
        }
        searchBox.selectedIndex = 0;
    }
});


    $('#StepDataTable').DataTable({

          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
    
$('#btn-ModifierProjet').click(function(){
        var val = [];
        var checked = [];
        $('input:checkbox:not(:checked)').each(function(i){
          val[i] = $(this).val();
        });
        $(':checkbox:checked').each(function(i){
          checked[i] = $(this).val();
        });
           $.ajax({
        type: "POST",
        data: $("#formProjet" ).serialize()+"&checked="+checked+"&checkedSize="+checked.length+"&unchecked="+val+"&uncheckedSize="+val.length,
        url: "projetAjax.php",
        success: function(data){
        location.href="Gestion_Projet.php";
            }
          });
});

  $('#btn-ajouterStep').click(function(){

        $.ajax({
      type: "POST",
      url:  "projetAjax.php",
      data: $("#ajoutStep" ).serialize(),
      success: function(result){
        $('#close').click();
        location.reload();
      }
    });
      });


  $('#btn-affecterStep').click(function(){

        $.ajax({
      type: "POST",
      url:  "projetAjax.php",
      data: $("#form-affecterStep" ).serialize()+"&action=affecter",
      success: function(result){     
        $('#close').click();
        location.reload();
      }
    });
      });
</script>
</body>
</html>
