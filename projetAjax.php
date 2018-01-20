<?php 
include 'functions.php';
include "dist/php/include.php";

if (isset($_POST['NomStep'])) {
	$descriptionStep=$_POST['NomStep'];
	if (!empty($descriptionStep)) {
		$reponse=AjouterStep($descriptionStep);
		echo "success";
	}else {
		echo "erreur";
	}

}

if (isset($_POST['nomProjet']) ) {
	if (!empty($_POST['nomProjet']) && !empty($_POST['zoneProjet']) && !empty($_POST['clientId'])) {
		$length=$_POST['arrSize'];
		$designation=$_POST['nomProjet'];
		$zone=$_POST['zoneProjet'];
		$clientId=$_POST['clientId'];
		$checked=$_POST['val'];		
		AjouterProjet($designation,$zone,$clientId);
		$sql = "SELECT MAX(projetId) as projetId FROM `projet`";
		$result = executeQuery($sql);
		$result=$result->fetch_array();
		$id=$result['projetId'];
		$checkedSteps = explode(",", $checked);
		for ($i=$length-1; $i >=0 ; $i--) { 
			$dateAffectation=$_POST['dateAffectation'.$checkedSteps[$i]];
			affecterProjetStep($checkedSteps[$i],$id,$dateAffectation);
		}
		echo "success";

}else{
	echo "Champs Non Remplit ";
	}
	
}

if (isset($_POST['DeleteProjet'])) {

	$idProjet=$_POST['DeleteProjet'];
	supprimerProjet($idProjet);
	
}
if (isset($_POST['nomProjetModifier']) ) {
	if (!empty($_POST['nomProjetModifier']) && !empty($_POST['zoneProjetModifier']) && !empty($_POST['clientIdModifier'])) {
		$checkedSize=$_POST['checkedSize'];
		$uncheckedSize=$_POST['uncheckedSize'];
		$projetId=$_POST['projetIdModifier'];
		$designation=$_POST['nomProjetModifier'];
		$zone=$_POST['zoneProjetModifier'];
		$clientId=$_POST['clientIdModifier'];
		$unchecked=$_POST['unchecked'];		
		$checked=$_POST['checked'];
		updateProjet($projetId,$designation,$zone,$clientId);
		
		$uncheckedSteps = explode(",", $unchecked);
		$checkedSteps = explode(",", $checked);
		
		for ($i=$checkedSize-1; $i >=0 ; $i--) { 
			$dateAffectation=$_POST['dateAffectationModifier'.$checkedSteps[$i]];
				UpdateDateAffectation($projetId,$checkedSteps[$i],$dateAffectation)	;
				echo $dateAffectation;
			}

		for ($i=$uncheckedSize-1; $i >=0 ; $i--) { 
			desaffecterProjetStep($uncheckedSteps[$i],$projetId);
		}
		

}else{
	echo "Champs Non Remplit ";
	}
	
}

if (isset($_POST['stepsNotAffected'])) {
	if (!empty($_POST['stepsNotAffected'])) {

		$projetId = $_POST['projetIdAffected'];
		$dateAffectation=$_POST['dateAffectationNotaffected'];
		$stepNotAffected=$_POST['stepsNotAffected'];
	
		affecterProjetStep($stepNotAffected,$projetId,$dateAffectation);
	}
	
}

if (isset($_POST['DeleteStep'])) {

	$idStep=$_POST['DeleteStep'];
	supprimerStep($idStep);
	
}

if (isset($_POST['NomStepModifer'])) {
	if (!empty($_POST['NomStepModifer'])) {
		$designation=$_POST['NomStepModifer'];
		$stepId=$_POST['stepIdModifier'];
		 updateStep($stepId,$designation);
	}
}
?>
