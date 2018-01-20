<!DOCTYPE html>
<?php  
include "dist/php/include.php";
include 'functions.php';
        $quizid=$_GET['quizid'];

$projetStep=getProjetStepByQuizId($quizid);
  $projet=$projetStep[0]['projetDesignation'];
  $step=$projetStep[0]['stepDesignation'];

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

<div class="wrapper">
<div id="messageInfo"></div>
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
        <li ><a href="index.php"><i class="fa fa-home"></i><span>Accueil</span></a></li>

        <li class="header">Menu</li>
        <li class="treeview ">
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

        <li class="treeview menu-open active">
          <a href="#">
          <i class="fa ion-clipboard"></i>
          <span>Gestion des Quiz</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li class="active" ><a href="ShowQuiz.php"><i class="fa fa-list"></i> Liste des Quiz</a></li>
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
        Gestion des Quiz
        <br><small>Liste des Question</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box">
            <div class="box-header">
             Projet : <span class="text-uppercase"><?php echo $projet."</span>&nbsp;|&nbsp;Step : <span class=\"text-uppercase\">".$step; ?></span>

              <div class="pull-right"> <button type="button" title="Ajouter Question" class="btn btn-success AjouterQuestion"  data-toggle="modal" data-target="#QuestionModal" ><i class="fa fa-plus" ></i></button></div>
            </div>
			
            <!-- /.box-header -->
            <div class="box-body table-responsive" >
              <table id="example2" class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>Question ID </th>
                  <th> Designation</th>
                  <th>Type</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
                </thead>
                <tbody  >
				<?php 


                         //   $sql = "SELECT  * FROM questions WHERE quizId='$quizid'";

                            $result = getQuistionsbyQuizId($quizid);

                            foreach( $result as $row_select){
							  $questionid = $row_select["questionId"];
							  $Designation = $row_select["designation"];
                              $typeQuestion = $row_select["type"];
                              ?>
                                <tr>
									<td><?php echo $questionid ?></td>
									<td><?php echo $Designation ?></td>
									<td><?php echo $typeQuestion ?></td>
									<td> <button id="<?php echo $questionid ?>" class="ModifierQuestion btn-xs btn btn-primary" data-designation="<?php echo $Designation ?>"  data-value="<?php echo $questionid ?>" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit" aria-hidden="true" ></i></button></td>
									<td><button id="<?php echo $questionid ?>" class="DeleteQuestion btn-xs btn btn-danger" data-value="<?php echo $questionid ?>"><i class="fa fa-times" aria-hidden="true"></i></button></td>
								</tr>
                              <?php
                            }
                           ?> 
                
                
               
              
                </tbody>
                <tfoot>
                <tr>
                  <th>Question ID </th>
                  <th> Designation</th>
                  <th>Type</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modification d'une Question</h4>
        </div>
        <div class="modal-body">
        <form id="form-Modification">
  <div class="form-group">
    <label >Description de Question:</label>
    <input type="Text" class="form-control" name="questionModifer" id="questionModifer">
    <input type="hidden" name="questionid" id="questionid">
    <input type="hidden" name="NombreReponse" id="NombreReponse">

  </div>
  <div class="pull-right"> </div>
  <div id="answersField"> </div>
  <div class="modal-footer">
         <button type="button" class="btn btn-success  saveModiferQuestion">Enregistrer</button>
          <button type="button" class="btn btn-primary" id="annuler" data-dismiss="modal">Annluer</button>
        </div>
</form>
        </div>
      </div>
      
    </div>
  </div>


 <div class="modal fade" id="QuestionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content  col-md-10 form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><label>Ajouter Question</label></h4>
        </div>
        <div class="modal-body">
          <form id ="AddQuestion">
            <div class="form-group">
              <label for="Question-name">Question:</label>
              <input class="form-control" type="text" name="question111" id="question111" >
              <input type="hidden" name="QuizIDQuestion" value="<?php echo $quizid ?>" id="QuizIDQuestion" >
            </div>
            <div class="form-group row">
                 
                 <div class="radio col-md-5">
                    <label><input type="radio" id="one111" name="one111" onclick="sel(111)">Reponse Normale</label>
                 </div>
                 <div class="radio col-md-5">
                    <label><input type="radio" id="many111" name="many111" onclick="sel2(111)">Multiple choix</label>
                 </div>
               
            </div>
            <div class="form-group">
              
              <select style="visibility:hidden;" class="form-control" id="num111" onchange="selectChange(this,111)" >
                 <option value="default" disabled selected="selected" >default</option> 
                 <option value="2">2</option>  <option value="3">3</option>  
                 <option value="4">4</option> </select> <input type="hidden" value="" id="ansNumber111" name="ansNumber111" /> 

                 </div>
                 <div class="col-sm-8" id="ans111">
            </div>
            <div class="form-group" id="ans111">
            </div> 
          </form>
        </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-success  saveAddQuestion" >Ajouter</button>
        </div>
      </div>
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
<!-- pnotify -->
<link rel="stylesheet" type="text/css" media="all" href="dist/pnotify/pnotify.custom.min.css">
<script type="text/javascript" src="dist/pnotify/pnotify.custom.min.js"></script>
<script type="text/javascript" src="dist/js/functionJS.js"></script>
<script type = "text/javascript">





	$(function () {
    $('#example2').DataTable();
    
  })
  
	$(".DeleteQuestion").click(function () {
    var del_id=$(this).data('value');
 if (confirm(' Êtes-vous sûr de Supprimer cette question?')) {
   $.ajax({
      type:"POST",
      url:"deleteQuiz.php",
      data:"DeleteQuestion="+del_id,
      success:function(data) {
        new PNotify({
            title: 'Suppression réussi',
            text: "Question supprimé avec succes !!",
            type: 'success',
            icon: 'fa fa-check',
            styling: "bootstrap3",
            delay: 1800
          });
        window.setTimeout(function(){

          window.location.reload();
        }, 1850); 
      }

   });
   
  }
  return false; 
    });

   
   $(".ModifierQuestion").click(function () {
    var del_id=$(this).data('value');
    var designation=$(this).data('designation');
   $.ajax({
      type:"POST",
      url:"deleteQuiz.php",
      data:"ModiferQuestion="+del_id,
      success:function(data) {
        $("#answersField").html("");
        if(data==='null')
        {
          $("#questionModifer").val(designation);
          $("#questionid").val(del_id);
        }else{
        data=JSON.parse(data)
        var resSize=Object.keys(data['ansId']).length;
        $("#questionModifer").val(designation);
        $("#questionid").val(del_id);
        $("#NombreReponse").val(resSize);
        for (var i = 0; i < resSize; i++) {
          $("#answersField").append('<div class="form-group"> <label >Reponse '+(i+1)+':</label> <input name="answerID'+i+'" type="hidden" value="'+data['ansId'][i]+'" /><input type="Text" class="form-control" name="answerModifer'+i+'" id="questionModifer'+i+'" value="'+data['designation'][i]+'"><button id="reponse'+data['ansId'][i]+'" type="button" class="btn-xs btn btn-danger pull-right " onclick="SuppriperReponse('+data['ansId'][i]+')" title="Supprimer Reponse" data-value="'+data['ansId'][i]+'"><i class="fa fa-times" aria-hidden="true"></i></button> </div>');
        }
      }
      }
   });
    });


		$(".saveAddQuestion").click(function () {


       $.ajax({
      type: "POST",
      url:  "AjoutQuizProcess.php",
      data: $("#AddQuestion" ).serialize(),
      success: function(result){
     
        $('#annuler').click();
        location.reload();

      }
    });



    });
	
	$(".saveModiferQuestion").click(function () {
    
    $.ajax({
      type: "POST",
      url:  "deleteQuiz.php",
      data: $("#form-Modification" ).serialize(),
      success: function(result){
      
        $('#annuler').click();
       // $("#example2").load(location.href + " #example2");
       location.reload();
      }
    });
    });






function SuppriperReponse(IdReponse){
 
if (confirm('Êtes-vous sûr de Supprimer cette reponse ?')) {
   $.ajax({
      type:"POST",
      url:"deleteQuiz.php",
      data:"SupprimerReponse="+IdReponse,
      success:function(data) {
        new PNotify({
            title: 'Suppression réussi',
            text: "Reponse supprimé avec succes !!",
            type: 'success',
            icon: 'fa fa-check',
            styling: "bootstrap3",
            delay: 1800
          });

        window.setTimeout(function(){

          window.location.reload();
        }, 1850); 
      }
   });
   
 }


}

</script>
</body>
</html>
