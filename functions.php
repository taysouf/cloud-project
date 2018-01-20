<?php

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

	function getEmployeById($matricule){
		global $bdd;
		$query = "SELECT * FROM employe WHERE matricule = '$matricule'";
		try {
			$q = $bdd->query($query);
		} catch (Exception $e) {
			return (print_r($e));
		}
		return $q->fetch();
	}

	function getProjets(){
		global $bdd;
		$query = "SELECT * FROM projet";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getProjetById($id){
		global $bdd;
		$query = "SELECT * FROM projet WHERE projetId = $id";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getSteps(){
		global $bdd;
		$query = "SELECT * FROM step";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getProjetsSteps(){
		global $bdd;
		$query = "SELECT * FROM affectation, projet, step
				  WHERE affectation.projetId = projet.projetId
				  AND affectation.stepId = step.stepId";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getStepByStepId($id){
		global $bdd;
		$query = "SELECT * FROM step WHERE stepId=".$id;
		$q = $bdd->query($query);
		$r = $q->fetchall();
		return($r);
	}

	function getStepsById($projetId){
		global $bdd;
		$query = "SELECT * FROM affectation NATURAL JOIN step WHERE projetId=".$projetId;
		$q = $bdd->query($query);
		$r = $q->fetchall();
		$r = json_encode($r);
		return($r);
	}

	function getStepsByProjetId($projetId){
		global $bdd;
		$query = "SELECT * FROM affectation NATURAL JOIN step WHERE projetId= '$projetId' ORDER BY dateAffectation";
		$q = $bdd->query($query);
		$r = $q->fetchall();
		return($r);
	}

	function getEmployes(){
		global $bdd;
		$query = "SELECT * FROM employe";
		$q = $bdd->query($query);

		return $q->fetchall();
	}

	function getAffectations($matricule){
		global $bdd;
		$query = "SELECT zone, client,  projet.projetId, step.stepId, dateA, dateB, dateC, dateD, projet.designation AS 'nomProjet', step.designation AS 'nomStep',matricule FROM certification,projet,step 
		WHERE matricule = $matricule AND certification.projetId=projet.projetId AND certification.stepId = step.stepId 
		ORDER BY `certification`.`dateA` DESC";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getLogs(){
		global $bdd;
		$query = "SELECT * FROM log ORDER BY `time` DESC";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getNombreEmployes(){
		global $bdd;
		$query = "SELECT count(matricule) FROM employe";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getNombreProjets(){
		global $bdd;
		$query = "SELECT count(projetId) FROM projet";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getNombreSteps(){
		global $bdd;
		$query = "SELECT count(stepId) FROM step";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getEmployeByProjet($projet){
		global $bdd;
		$query = "SELECT * FROM employe,certification WHERE projetId = $projet AND employe.matricule=certification.matricule  GROUP BY certification.matricule";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getEmployeByProjetStep($projet,$step){
		global $bdd;
		$query = "SELECT * FROM employe,certification WHERE projetId = $projet AND stepId = $step AND employe.matricule=certification.matricule";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getEmployeByMatriculeProjetStep($matricule,$projet,$step){
		global $bdd;
		$query = "SELECT * FROM certification WHERE projetId = $projet AND stepId = $step AND matricule= $matricule";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function checkAffectation($matricule,$projetId,$stepId){
		global $bdd;
		$query = "SELECT * FROM certification WHERE matricule = '$matricule' AND stepId = $stepId AND projetId = $projetId";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function desaffecterById($matricule,$projetId,$stepId){
		global $bdd;
		$query = "DELETE FROM certification WHERE matricule= $matricule AND projetId = $projetId AND stepId = $stepId";
		try {
			$q = $bdd->query($query);
			$reponse = 'ok';
			write_mysql_log("desaffectation de l'employe dont le matricule = $matricule","DELETE", $bdd);
		} catch (Exception $e) {
			$reponse = 'Erreur lors de la desaffectation de l\'employé!';
		}
		return json_encode(['reponse' => $reponse]);
	}

	function ajouterEmploye($matricule,$cardId,$dateEntree,$nom,$prenom,$dateNaissance,$email,$niveauEtude,$projetId,$stepId){
		global $bdd;
		
		if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {
	  		$reponse = "Seules les lettres et les espaces sont autorisés dans le nom";
	  		return json_encode(['reponse' => $reponse]);
		}else if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
	  		$reponse = "Seules les lettres et les espaces sont autorisés dans le prénom";
	  		return json_encode(['reponse' => $reponse]);
		}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  		$reponse = "Adresse Email invalide";
	  		return json_encode(['reponse' => $reponse]);
		}

		$query = "INSERT INTO `employe` (`matricule`, `cardId`, `nom`, `prenom`, `niveauEtude`, `email`, `dateNaissance`, `dateEntree`) VALUES (?,?,?,?,?,?,?,?)";
		$stmt = $bdd->prepare($query);
		$data = [$matricule, $cardId, $nom, $prenom, $niveauEtude, $email, $dateNaissance, $dateEntree];
		try {
			$stmt->execute($data);
			write_mysql_log("Ajout nouveau employe : $nom $prenom, matricule = $matricule ","INSERT", $bdd);
			
			$reponse = 'ok';
		} catch (Exception $e) {
			$reponse = "Erreur lors de l'enregistrement de l'employé";
		}
		$a=affectationEmploye($matricule,$projetId,$stepId,$dateEntree);
		return json_encode(['reponse' => $reponse]);
	}

	function affectationEmploye($matricule,$projetId,$stepId,$dateEntree){
		global $bdd;
		$r = checkAffectation($matricule,$projetId,$stepId);
		if ( is_null($r) || empty($r) || !isset($r)) {
			$query = "INSERT INTO `certification` (`matricule`, `projetId`, `stepId`, `niveauA`, `dateA`, `commentaire`) VALUES (?,?,?,?,?,?)";
			$stmt = $bdd->prepare($query);
			$data = [$matricule, $projetId, $stepId, true, $dateEntree, NULL];
		try {
			 	$stmt->execute($data);
			 	write_mysql_log("Affectation niveau A du matricule = $matricule à la date $dateEntree au projet : $projetId, step : $stepId","INSERT", $bdd);
			 	$reponse='ok';

		} catch (Exception $e) {
		 		$reponse='Erreur dans le process de la première certification';
		}
		 
		}else{
			$reponse='Employé déjà affecté à cette step';
		}
		return json_encode(['reponse' => $reponse]);
	}

	function certifierB($matricule,$projetId,$stepId,$dateB){
		global $bdd;
		$query = "UPDATE certification 
		SET niveauB = 1, dateB = '$dateB' WHERE matricule = '$matricule' AND projetId = '$projetId' AND stepId='$stepId'";
		try {
			$q = $bdd->query($query);
			$reponse = 'ok';
			write_mysql_log("Certification au niveau B du matricule = $matricule à la date $dateB, projet : $projetId step : $stepId","UPDATE", $bdd);
		} catch (Exception $e) {
			$reponse = print_r($e);
		}
		return json_encode(['reponse' => $reponse]);
	}

	function certifierC($matricule,$projetId,$stepId,$dateC){
		global $bdd;
		$query = "UPDATE certification 
		SET niveauC = 1, dateC = '$dateC' WHERE matricule = '$matricule' AND projetId = '$projetId' AND stepId='$stepId'";
		try {
			$q = $bdd->query($query);
			$reponse = 'ok';
			write_mysql_log("Certification au niveau C du matricule = $matricule à la date $dateC, projet : $projetId step : $stepId","UPDATE", $bdd);
		} catch (Exception $e) {
			$reponse = print_r($e);
		}
		
		return json_encode(['reponse' => $reponse]);
	}

	function certifierD($matricule,$projetId,$stepId,$dateD){
		global $bdd;
		$query = "UPDATE certification 
		SET niveauD = 1, dateD = '$dateD' WHERE matricule = '$matricule' AND projetId = '$projetId' AND stepId='$stepId'";
		try {
			$q = $bdd->query($query);
			$reponse = 'ok';
			write_mysql_log("Certification au niveau D du matricule = $matricule à la date $dateD, projet : $projetId step : $stepId","UPDATE", $bdd);
		} catch (Exception $e) {
			$reponse = print_r($e);
		}
		
		return json_encode(['reponse' => $reponse]);
	}

	function decertifier($matricule,$projetId,$stepId,$niveau){
		global $bdd;
		if ($niveau == 'B') {
			$query = "UPDATE certification 
			SET niveaub = NULL, dateB = NULL, niveauC = NULL, dateC = NULL, niveauD = NULL, dateD = NULL WHERE matricule = '$matricule' AND projetId = '$projetId' AND stepId='$stepId'";
		}elseif ($niveau == 'C') {
			$query = "UPDATE certification 
			SET niveauC = NULL, dateC = NULL, niveauD = NULL, dateD = NULL WHERE matricule = '$matricule' AND projetId = '$projetId' AND stepId='$stepId'";
		}elseif ($niveau == 'D') {
			$query = "UPDATE certification 
			SET niveauD = NULL, dateD = NULL WHERE matricule = '$matricule' AND projetId = '$projetId' AND stepId='$stepId'";
		}
		
		try {
			$q = $bdd->query($query);
			$reponse = 'ok';
			write_mysql_log("Décertification du niveau $niveau du matricule = $matricule, projet : $projetId step : $stepId","UPDATE", $bdd);
		} catch (Exception $e) {
			$reponse = print_r($e);
		}
		
		return json_encode(['reponse' => $reponse]);
	}

	function supprimerEmploye($matricule){
		global $bdd;
		$query = "DELETE FROM employe WHERE matricule=".$matricule;
		try {
			$q = $bdd->query($query);
			$reponse = 'ok';
			write_mysql_log("Suppression de l'employe dont le matricule = $matricule","DELETE", $bdd);
			write_mysql_log("desaffectation de l'employe dont le matricule = $matricule","DELETE", $bdd);
		} catch (Exception $e) {
			$reponse = 'Erreur lors de la suppression de l\'employé!';
		}
		
		return json_encode(['reponse' => $reponse]);
	}

	function modifierEmploye($matricule,$nom,$prenom,$niveauEtude,$email,$dateNaissance){
		global $bdd;
		$query = "UPDATE employe 
		SET nom = '$nom', prenom = '$prenom', niveauEtude = '$niveauEtude',
		email = '$email', dateNaissance = '$dateNaissance' WHERE matricule = '$matricule'";
		try {
			$q = $bdd->query($query);
			$reponse = 'ok';
			write_mysql_log("Mise à jour de l'employe dont le matricule = $matricule ","UPDATE", $bdd);
		} catch (Exception $e) {
			$reponse = 'Erreur lors de la modification des information de l\'employe '.$nom.' '.$prenom;
		}
		return json_encode(['reponse' => $reponse]);
	}


	// PARTIE RACHID 

	function getProjetByIdSingle($id){
		global $bdd;
		$query = "SELECT * FROM projet WHERE projetId = $id";
		$q = $bdd->query($query);
		return $q->fetch();
	}

	function AjouterStep($designation){
		global $bdd;
		$query = "INSERT INTO `step`(`designation`) VALUES (?)";
		$stmt = $bdd->prepare($query);
		$data = [$designation];
		try {
			$stmt->execute($data);
			return "success";
			write_mysql_log("Ajout Step : $designation ","INSERT", $bdd);
		} catch (Exception $e) {
			$reponse = "Erreur lors de l'enregistrement de l'employé";
			return $reponse;
		}
	}

	function AjouterProjet($designation,$zone,$clientId){
		global $bdd;
		$query = "INSERT INTO `projet`(`designation`, `zone`, `client`) VALUES (?,?,?)";
		$stmt = $bdd->prepare($query);
		$data = [$designation,$zone,$clientId];
		try {
			$stmt->execute($data);
			write_mysql_log("Ajout Projet : $designation | client : $clientId ","INSERT", $bdd);
		} catch (Exception $e) {
			$reponse = "Erreur lors de l'enregistrement de l'employé";
		}
	}

	function affecterProjetStep($idStep,$idProjet,$dateAffectation){
		
		global $bdd;
		$query = "INSERT INTO `affectation`(`projetId`, `stepId`,`dateAffectation`) VALUES (?,?,?)";
		$stmt = $bdd->prepare($query);
		$data = [$idProjet,$idStep,$dateAffectation];
		try {
			$stmt->execute($data);
			write_mysql_log("Affectation du Step dont l'id = $idStep au projet dont l'id=$idProjet ","INSERT", $bdd);
		} catch (Exception $e) {
			$reponse = "Erreur lors de l'enregistrement de l'employé";
		}
	}

	function supprimerProjet($idProjet){

		global $bdd;
		$query = "DELETE FROM `projet` WHERE projetId=".$idProjet;
		try {
			$q = $bdd->query($query);
			echo "success";
			write_mysql_log("Suppression du Projet dont l'id = $idProjet ","DELETE", $bdd);
		} catch (Exception $e) {
			echo "error";
		}
	}

	function updateProjet($idProjet,$designation,$zone,$client){
		global $bdd;
		$query = "UPDATE `projet` SET `designation`='$designation',`zone`='$zone',`client`='$client' WHERE projetId='$idProjet'";
		try {
			$q = $bdd->query($query);
			$reponse = 'ok';
		} catch (Exception $e) {
			$reponse = 'Erreur lors de la modification des information du projet ';
		}
		write_mysql_log("Mise à jour du projet  dont l'id = $idProjet ","UPDATE", $bdd);
		return json_encode(['reponse' => $reponse]);
	}

	function desaffecterProjetStep($idStep,$idProjet){
		
		global $bdd;
		$query = "DELETE FROM `affectation` WHERE projetId='$idProjet' and stepId='$idStep'";
		try {
				$q = $bdd->query($query);
				write_mysql_log("desaffectation du Step  dont le id = $idStep à projet dont id=$idProjet  ","DELETE", $bdd);
		
		} catch (Exception $e) {
			$reponse = "Erreur lors de deaffectation de step à projet ";
		}
	}

	function UpdateDateAffectation($projetId,$stepId,$dateAffectation){
		global $bdd;
		$query = "UPDATE `affectation` SET dateAffectation='$dateAffectation' WHERE projetId='$projetId' and stepId='$stepId'";
		try {
			$q = $bdd->query($query);
			$reponse = 'ok';
			write_mysql_log("Mise à jour la date d'affectation du Step dont id= $stepId au projet dont id=$projetId ","UPDATE", $bdd);
		} catch (Exception $e) {
			$reponse = 'Erreur lors de la modification des information du projet';
		}
		return json_encode(['reponse' => $reponse]);
	}

	function getNotAffectedSteps($projetId){
		global $bdd;
		$query = "SELECT * FROM `step` WHERE stepId not in ( select stepId from affectation where projetId='$projetId')";
		$q = $bdd->query($query);
		$r = $q->fetchall();
		return($r);
	}

	function supprimerStep($idStep){

		global $bdd;
		$query = "DELETE FROM `step` WHERE stepId=".$idStep;
		try {
			$q = $bdd->query($query);
			echo "success";
					write_mysql_log("Suppression du Step dont le id = $idStep ","DELETE", $bdd);
		} catch (Exception $e) {
			echo "error";
		}
	}

	function updateStep($idStep,$designation){
	  	global $bdd;
		$query = "UPDATE `step` SET `designation`='$designation' WHERE stepId='$idStep'";
		try {
			$q = $bdd->query($query);
			$reponse = 'ok';
			write_mysql_log("Mise à jour du step dont l'id = $idStep ","UPDATE", $bdd);
		} catch (Exception $e) {
			$reponse = 'Erreur lors de la modification des information du projet ';
		}
		
		return json_encode(['reponse' => $reponse]);
	}

	function getQuizByProjetIdAnsStepId($idProjet,$idStep){
		global $bdd;
		$query = "SELECT * FROM `quiz` WHERE projetId='$idProjet' and stepId='$idStep'";
		try {
			$q = $bdd->query($query);
		} catch (Exception $e) {
			return (print_r($e));
		}
		return $q->fetchall();
	}

	function getQuistionsbyQuizId($idQuiz){
		global $bdd;
		$query = "SELECT * FROM `questions` WHERE quizId='$idQuiz'";
		$q = $bdd->query($query);
		$r = $q->fetchall();
		return($r);
	}

	function getAnswersByQuestionId($idQuestion){
		global $bdd;
		$query = "SELECT * FROM `reponses` WHERE questionId='$idQuestion'";
		$q = $bdd->query($query);
		$r = $q->fetchall();
		return($r);
	}

	function getProjetStepByQuizId($idQuiz){
		global $bdd;
		$query = "SELECT p.designation as projetDesignation , s.designation as stepDesignation FROM quiz q,projet p,step s WHERE quizId='$idQuiz' and q.projetId=p.projetId and q.stepId=s.stepId ";
		$q = $bdd->query($query);
		$r = $q->fetchall();
		return($r);
	}



	function getStepsX($projectId){
		global $bdd;
		$query = "SELECT s.designation,a.StepId FROM affectation a,step s WHERE a.projetId='$projectId' and a.StepId=s.stepId ";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

	function getQuizX(){
		global $bdd;
		$query = "SELECT q.quizId,p.designation as nomProjet, s.designation as nomStep FROM quiz q, projet p, step s WHERE q.projetId=p.projetId and q.StepId= s.stepId";
		$q = $bdd->query($query);
		return $q->fetchall();
	}

?>


