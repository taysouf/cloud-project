
<?php
header('Content-type:text/html; chartset=iso-8859-1');

include "dist/php/include.php";
include "functions.php";
$projectId = $_GET['ProjedtId'];

?>
  <div class="col-sm-5">
 <select id="step"  class="form-control" onchange="showQuestions(this.value,<?php echo $projectId ;?>)" >
<option value="default" disabled selected="selected" >default</option> 
<?php 
                            

                            $result = getStepsX($projectId);

                            foreach($result as $row_select){
                              $StepId = $row_select["StepId"];
                              $designation = $row_select["designation"];
                              ?>
                                <option value="<?php echo $StepId ?>"><?php echo "$designation" ?></option>
                              <?php
                            }
                           ?> </select>
  </div>

