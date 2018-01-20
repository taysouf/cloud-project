<?php 

include 'functions.php';

// loginEtudiant
if ($_GET['action'] == 'getStepsById' && !empty($_GET['projetId'])) {
	echo getStepsById($_GET['projetId']);

}
else if ($_GET['action'] == 'submitForm' && !empty($_GET['matricule']) && !empty($_GET['cardId']) && !empty($_GET['dateEntree']) && !empty($_GET['nom']) && !empty($_GET['prenom']) && !empty($_GET['dateNaissance']) && !empty($_GET['email']) && !empty($_GET['niveauEtude']) && !empty($_GET['projet']) && !empty($_GET['step'])) {
	
	echo ajouterEmploye($_GET['matricule'], $_GET['cardId'], $_GET['dateEntree'], $_GET['nom'], $_GET['prenom'], $_GET['dateNaissance'], $_GET['email'], $_GET['niveauEtude'], $_GET['projet'], $_GET['step']);

}else if ($_GET['action'] == 'submitForm' && !(!empty($_GET['matricule']) && !empty($_GET['cardId']) && !empty($_GET['dateEntree']) && !empty($_GET['nom']) && !empty($_GET['prenom']) && !empty($_GET['dateNaissance']) && !empty($_GET['email']) && !empty($_GET['niveauEtude']) && !empty($_GET['projet']) && !empty($_GET['step']) ) ) {
	$reponse='Veuillez remplir tous les champs'.$_GET['dateEntree'];
	echo json_encode(['reponse' => $reponse]);

}else if ($_GET['action'] == 'supprimerEmploye' && !empty($_GET['matricule'])) {
	echo supprimerEmploye($_GET['matricule']);

}else if ($_GET['action'] == 'submitFormMod' && !empty($_GET['matricule']) && !empty($_GET['nom']) && !empty($_GET['prenom']) && !empty($_GET['dateNaissance']) && !empty($_GET['email']) && !empty($_GET['niveauEtude'])) {
	
	echo modifierEmploye($_GET['matricule'], $_GET['nom'], $_GET['prenom'], $_GET['niveauEtude'], $_GET['email'], $_GET['dateNaissance']);

}else if ($_GET['action'] == 'submitFormMod' && !(!empty($_GET['matricule']) && !empty($_GET['cardId']) && !empty($_GET['dateEntree']) && !empty($_GET['nom']) && !empty($_GET['prenom']) && !empty($_GET['dateNaissance']) && !empty($_GET['email']) && !empty($_GET['niveauEtude']) )) {
	$reponse='Veuillez remplir tous les champs';
	echo json_encode(['reponse' => $reponse]);

}else if ($_GET['action'] == 'submitCertif' && !empty($_GET['matricule']) && !empty($_GET['projetId']) && !empty($_GET['stepId']) && !empty($_GET['dateCertif']) && !empty($_GET['niveau']) ){
	$matricule = $_GET['matricule'];
	$projetId = $_GET['projetId'];
	$stepId = $_GET['stepId'];
	$niveau = $_GET['niveau'];
	$date = $_GET['dateCertif'];
	if ($niveau == 'D') {
		echo certifierD($matricule,$projetId,$stepId,$date);
	}elseif ($niveau == 'C') {
		echo certifierC($matricule,$projetId,$stepId,$date);
	}elseif ($niveau == 'B') {
		echo certifierB($matricule,$projetId,$stepId,$date);
	}

}elseif ($_GET['action'] == 'submitCertif' && !empty($_GET['matricule']) && !empty($_GET['projetId']) && !empty($_GET['stepId']) && !(!empty($_GET['dateCertif'])) && !empty($_GET['niveau'])){
	$reponse='Veuillez renseigner la date de certification';
	echo json_encode(['reponse' => $reponse]);

}elseif ($_GET['action'] == 'decertifierEmploye' && !empty($_GET['matricule']) && !empty($_GET['projetId']) && !empty($_GET['stepId']) && !empty($_GET['niveau'])) {
	echo decertifier($_GET['matricule'],$_GET['projetId'],$_GET['stepId'],$_GET['niveau']);

}elseif ($_GET['action']== 'submitFormAff' && !empty($_GET['matricule']) && !empty($_GET['projetId']) && !empty($_GET['date']) && !empty($_GET['stepId'])) {
	echo affectationEmploye($_GET['matricule'],$_GET['projetId'],$_GET['stepId'],$_GET['date']);

}elseif ($_GET['action']== 'submitFormAff' && !(!empty($_GET['matricule']) && !empty($_GET['projetId']) && !empty($_GET['date']) && !empty($_GET['stepId']))) {

	$reponse='Veuillez renseigner tous les champs';
	echo json_encode(['reponse' => $reponse]);
}elseif ($_GET['action']== 'desAff' && !empty($_GET['matricule']) && !empty($_GET['projetId']) && !empty($_GET['stepId'])) {

	echo desaffecterById($_GET['matricule'],$_GET['projetId'],$_GET['stepId']);
}

?>