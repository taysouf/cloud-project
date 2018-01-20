

<?php
include "dist/php/include.php";
include 'log.php';
try
	{
			$dsn = getenv('MYSQL_DSN');
			$user = getenv('MYSQL_USER');
			$password = getenv('MYSQL_PASSWORD');
			$bdd = new PDO($dsn, $user, $password);
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
if (isset($_POST['question111'])) {
	
	if (!empty($_POST['question111'])) {
		# code...
		$quizid=$_POST['QuizIDQuestion'];
	$question=$_POST['question111'];
	$ansNumber=$_POST['ansNumber111'];
	if($ansNumber>0)
	{
		$typeQuestiion=1;
	}else{
		$typeQuestiion=0;
		$ansNumber=0;
	}

	$sql_question = "INSERT INTO `questions`(`quizId`, `nombreReps`, `designation`, `type`) VALUES ('$quizid','$ansNumber','$question','$typeQuestiion')" ;  
	$result_question = executeQuery($sql_question);

	$sql_searchQiD = "SELECT questionId FROM `questions` WHERE quizId='$quizid' and nombreReps='$ansNumber' and designation='$question'";
	$result_searchQiD = executeQuery($sql_searchQiD);
	$questionID=$result_searchQiD -> fetch_array(); 
	
	
	$questionID=$questionID['questionId'];
	 $check=0;
	for($j=0;$j<$_POST['ansNumber111'];$j++){
	$answer=$_POST['answer111'.$j];
    ///// insert answers to db 
    if (!empty($_POST['answer111'.$j])) {
    	$sql_answer = "INSERT INTO `reponses`( `questionId`, `designation`) VALUES ('$questionID','$answer')"       ;
	    $result_answer = executeQuery($sql_answer);	
	    $check=$check+1;
    }
    if ($check==0) {
    	$sql_update = "UPDATE `questions` SET `nombreReps`=0,`type`=0 WHERE questionId='$questionID'";       ;
	    $result_update = executeQuery($sql_update);	
    	
    }
}
	echo "success";

	}else
		echo "error";
}else
{


$projetID=$_POST['projetID'];
$stepID=$_POST['stepID'];
$num=$_POST['numOfFields'];
$typeQuestiion='';


////// check if the quiz alrady exist !!!!!!!
$sql = "SELECT * FROM `quiz` WHERE projetId='$projetID' and StepId='$stepID'";

                            $result = executeQuery($sql);
							$quizId=$result -> fetch_array();
							
							if($result->num_rows === 0)
							{
								if (!empty($_POST['question0'])) {
									$sql_insert = "INSERT INTO `quiz`( `projetId`, `StepId`) VALUES ('$projetID','$stepID') ";
								}

								write_mysql_log("Ajout du Quiz pour le projet dont ID = $projetID et Step = $stepID ","INSERT", $bdd);
                            $result_insert = executeQuery($sql_insert);
								
							}
// if exist get the quiz id 
$sql = "SELECT * FROM `quiz` WHERE projetId='$projetID' and StepId='$stepID'";

                            $result = executeQuery($sql);
							$quizId=$result -> fetch_array();
							$quizId =$quizId['quizId'];

echo $num.'<br>';
  for($i=0;$i<=$num;$i++){
	
	$question=$_POST['question'.$i];
	$ansNumber=$_POST['ansNumber'.$i];
	///// check if the question has multiple answers or not 
	if($ansNumber>0)
	{
		$typeQuestiion=1;
	}else{
		$typeQuestiion=0;
		$ansNumber=0;
	}
	
	
	//// insert into table question 
		
		if (!empty($question)) {

	$sql_question = "INSERT INTO `questions`(`quizId`, `nombreReps`, `designation`, `type`) VALUES ('$quizId','$ansNumber','$question','$typeQuestiion')" ;  
	$result_question = executeQuery($sql_question);
	///////// search for the question id added in order to inset answers 
	$sql_searchQiD = "SELECT questionId FROM `questions` WHERE quizId='$quizId' and nombreReps='$ansNumber' and designation='$question'";
	$result_searchQiD = executeQuery($sql_searchQiD);
	$questionID=$result_searchQiD -> fetch_array(); 
	
	
	$questionID=$questionID['questionId'];
	
	for($j=0;$j<$_POST['ansNumber'.$i];$j++){
	$answer=$_POST['answer'.$i.$j];
    ///// insert answers to db 
    if (!empty($answer)) {
    	$sql_answer = "INSERT INTO `reponses`( `questionId`, `designation`) VALUES ('$questionID','$answer')"       ;
	$result_answer = executeQuery($sql_answer);
    }
	
	
	
	}
	echo "success";
}else{
		echo "error";
}
	echo '<br><br>';
}
	


header("Location: ShowQuiz.php");
}
?>