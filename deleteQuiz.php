<?php 
include "dist/php/include.php";



if (isset($_POST['DeleteQuestion'])) {
	
	$id_question=$_POST['DeleteQuestion'];

	$sql = "DELETE FROM `questions` WHERE questionId='$id_question'";
          $result = executeQuery($sql);
          echo "success";
}

if (isset($_POST['delete_id'])) {

$id = $_POST['delete_id'];
$sql = "DELETE FROM `quiz` WHERE quizId='$id'";
          $result = executeQuery($sql);

     echo "success";
 }

 if (isset($_POST['ModiferQuestion'])) {

 	$id = $_POST['ModiferQuestion'];
$sql = "SELECT `reponseId`, `questionId`, `designation` FROM `reponses` WHERE questionId='$id'";
          $result = executeQuery($sql);
           $res=array();
           if($result->num_rows > 0){
           while($row_select = $result -> fetch_assoc()){
           	$res['ansId'][]=$row_select['reponseId'];
           	$res['questionId'][]=$row_select['questionId'];
           	$res['designation'][]=$row_select['designation'];
           }		    
         echo json_encode($res);
     }else {
     echo "null";
 }
 }

 	if(isset($_POST['questionModifer']))
 	{
 		$NombreReponse=$_POST['NombreReponse'];
 		$question=$_POST['questionModifer'];
 		$questionId=$_POST['questionid'];
 

 		$sql = "UPDATE `questions` SET `designation`='$question' WHERE questionId='$questionId'";
          $result = executeQuery($sql);

 		for ($i=0; $i <$NombreReponse ; $i++) { 
 			$answerModifer=$_POST['answerModifer'.$i];
 			$answerID=$_POST['answerID'.$i];
 			$sql = "UPDATE `reponses` SET `designation`='$answerModifer' WHERE reponseId='$answerID'";
            $result = executeQuery($sql);
 	}

 	echo "success";
 }
 if (isset($_POST['SupprimerReponse'])) {

 	$reponseId=$_POST['SupprimerReponse'];
 	
 	$sql = "DELETE FROM `reponses` WHERE reponseId='$reponseId'";
          $result = executeQuery($sql);
          echo "success";
 }
?>