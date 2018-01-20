<?php 
include "dist/php/include.php";

include "functions.php";

$stepId = $_GET['StepId'];
$projectId = $_GET['projectId'];


              $quizId=getQuizByProjetIdAnsStepId($projectId,$stepId);
              //$quizId=$result -> fetch_array();

                if(sizeof($quizId) > 0)
              {
                echo '<div style="color:red;"><strong><p> Quiz existe déja </p></strong></div>';
                ?>
                <form action="Modiferquiz.php" method="get">
                <input type="hidden" name="quizid" value="<?php echo $quizId[0]['quizId']; ?>">
                <div class=""><button type="submit" class=" btn btn-primary"> Modifier Quiz </button></div>
                </form>
                <?php
              }else {
?>


<form id ="form-quiz" class="form-horizontal" action="AjoutQuizProcess.php" method="post">
            <div class="form-group">
            <input type="hidden" value="<?php echo $projectId; ?>"  name="projetID" id="projetID" >
            <input type="hidden" value="<?php echo $stepId; ?>" name="stepID" id="stepID" >
              <label for="Question-name">Question:</label>
              <input class="form-control" type="text" name="question0" placeholder="Question 1" id="question0" >
            </div>
            <div class="form-group row">
                 
                 <div class="radio col-md-5">
                    <label><input type="radio" id="one0" name="one0" onclick="sel(0)">Reponse Normale</label>
                 </div>
                 <div class="radio col-md-5">
                    <label><input type="radio" id="many0" name="many0" onclick="sel2(0)">Multiple choix</label>
                 </div>
               
            </div>
            <div class="form-group">
               <select style="visibility:hidden;" class="form-control" id="num0" onchange="selectChange(this,0)" >
               <option value="default" disabled selected="selected" >default</option>
                <option value="2">2</option>  <option value="3">3</option> 
                 <option value="4">4</option> <option value="5"></option>
                  </select>
                 </div>
                 <input type="hidden" value="" id="ansNumber0" name="ansNumber0" />
                 <div class="col-sm-8" id="ans0" ></div>
           <div id="container" class="col-sm-12" >
           </div> 
           <input type="hidden" value='0' id="numOfFields" name="numOfFields" />
          </form>
          <div class="pull-right">
               <button id="goo" type="button"  class="btn btn-success  go" onclick="sub()" >Enregistrer</button>

          <button id="load" type="button" class="btn btn-primary " onclick="addQuestion()" > Ajouter Question</button>
        </div>

<?php } ?>    
<!-- jQuery 3 -->

