

// Afficher PopUP
function setModalBox(title,content,footer){
  document.getElementById('modal-bodyku').innerHTML=content;
  document.getElementById('myModalLabel').innerHTML=title;
  document.getElementById('modal-footerq').innerHTML=footer;
  $('#myModal').attr('class', 'modal fade bs-example-modal-md').attr('aria-labelledby','myLargeModalLabel');
  $('.modal-dialog').attr('class','modal-dialog modal-md');
}


$(document).on('change', '#projet', function() {

  var projets = $('#projet').val();
  console.log(projets);
  if (projets =="") {
    $('#step').html('');
  }
  else{
    getStepById(projets);
  }
});

// RECUPERER LES STEPS EN FONCTION DU PROJET
function getStepById(projets){
  console.log(projets);
  $.ajax({
    url: 'ajax.php?action=getStepsById&projetId='+projets+'',
    type:'GET',
    dataType: 'json',
    success: function(data){
      console.log(data);

      var content="";
      var step = new Array();
      if (data.length == 0) {
        $('#step').html("<option class=\"text-uppercase\" value=\"null\"> </option>");
      }else{
        for (var i = data.length - 1; i >= 0; i--) {
          content=content+"<option class=\"text-uppercase\" value=\""+data[i]['stepId']+"\">"+data[i]['designation']+"</option>";
        }
        $('#step').html(content);
      }
    },
    error: function(err){
      console.log(err);
    },
  });
}

  // AJOUTER NOUVEAU EMPLOYE
  $(document.body).on('click', '#btn-submitForm',  function() {
    console.log("Submit-Test");
    var projet=document.getElementById("projet").value;
    var step=document.getElementById("step").value;

    var queryString = $("#formEmpoloye").serialize()+'&action=submitForm&step='+step+"&projet="+projet;

    console.log(queryString);

    if (confirm("Voulez vous ajouter cet employé ?")) {

    $.ajax({
      url: 'ajax.php?&'+queryString,
      type:'GET',
      success: function(data){
       console.log(data);

       var json =  $.parseJSON(data);

       if (json.reponse === 'ok') {

        new PNotify({
            title: 'Enregistrement réussi',
            text: "Employé enregistré avec succes !!",
            type: 'success',
            icon: 'fa fa-check',
            styling: "bootstrap3",
            delay: 3000
          });

        window.setTimeout(function(){

          window.location.replace('Gestion_Employe.php');
        }, 3050);
      } else {
        new PNotify({
            title: 'Echec d\'Enregistrement',
            text: "Erreur d'enregistrement : "+json.reponse+"",
            type: 'error',
            icon: 'fa fa-exclamation-circle',
            styling: "bootstrap3",
            delay: 3000
          });
      }
    },
    error: function(err){
      console.log(err);
    }
  });
  }
    return false; // to not refresh the page
  });


// MODIFICATION EMPLOYE
    $(document.body).on('click', '#btn-submitFormMod',  function() {
    console.log("Submit-Test");

    var queryString = $("#formEmploye").serialize()+'&action=submitFormMod';


    console.log(queryString);

    if (confirm("Voulez vous modifier cet employé ?")) {

    $.ajax({
      url: 'ajax.php?'+queryString,
      type:'GET',
      success: function(data){
       console.log(data);

       var json = $.parseJSON(data);
       console.log(json);
       if (json.reponse === 'ok') {

        new PNotify({
            title: 'Modification réussie',
            text: "Modification enregistrée avec succès !!",
            type: 'success',
            icon: 'fa fa-check',
            styling: "bootstrap3",
            delay: 3000
          });

        window.setTimeout(function(){

          window.location.replace("Gestion_Employe.php");
        }, 3050);
      } else {
        new PNotify({
            title: 'Echec de modification',
            text: "Erreur de modification : "+json.reponse+"",
            type: 'error',
            icon: 'fa fa-exclamation-circle',
            styling: "bootstrap3",
            delay: 3000
          });
      }
    },
    error: function(err){
      console.log(err);
    }
  });
  }
    return false; // to not refresh the page
  });


// SUPPRESSION EMPLOYE
  function supprimerEmploye(matricule){
    if (confirm("Voulez vous supprimer cet employé ?")) {
        var location = 'ajax.php?&action=supprimerEmploye&matricule='+matricule;

    $.ajax({
      url: location,
      type:'GET',
      success: function(data){
       console.log(data);
       var json = $.parseJSON(data);
       console.log(json);
       if (json.reponse === 'ok') {

        new PNotify({
            title: 'Supression réussie',
            text: "Employé supprimé avec succès !!",
            type: 'success',
            icon: 'fa fa-check',
            styling: "bootstrap3",
            delay: 3000
          });

        window.setTimeout(function(){
          window.location.href = "Gestion_Employe.php";
        }, 3050);
      } else {
        new PNotify({
            title: 'Echec de suppression',
            text: "Erreur de supression : "+json.reponse+"",
            type: 'error',
            icon: 'fa fa-exclamation-circle',
            styling: "bootstrap3",
            delay: 3000
          });
      }
    },
    error: function(err){
      console.log(err);
    }
  })
    }
  }

// AFFECTATION EMPLOYE
  $(document.body).on('click', '#btn-submitFormAffect',  function() {
    console.log("Submit-affect");
    var projet=document.getElementById("projet").value;
    var step=document.getElementById("step").value;
    var matricule=document.getElementById("matricule").value;
    var date=document.getElementById("date").value;

    var queryString = 'action=submitFormAff&stepId='+step+"&projetId="+projet+"&matricule="+matricule+"&date="+date;


    console.log(queryString);

    if (confirm("Voulez vous affecter cet employé ?")) {

    $.ajax({
      url: 'ajax.php?&'+queryString,
      type:'GET',
      success: function(data){
       console.log(data);

       var json = $.parseJSON(data);
       console.log(json);
       if (json.reponse === 'ok') {
          new PNotify({
            title: 'Affectation réussi',
            text: "Employé affecté avec succès !!",
            type: 'success',
            icon: 'fa fa-check',
            styling: "bootstrap3",
            delay: 3000
          });

        window.setTimeout(function(){
          window.location.replace('Affecter_Employe.php');
        }, 3050);
      } else {

          new PNotify({
            title: 'Echec d\'affectation',
            text: "Erreur d'affectation : "+json.reponse+"",
            type: 'error',
            icon: 'fa fa-exclamation-circle',
            styling: "bootstrap3",
            delay: 3000
          });
      }
    },
    error: function(err){
      console.log(err);
    }
  });
  }
    return false; // to not refresh the page
  });

// DESAFECTATION EMPLOYE
  function desaffecterEmploye(matricule,projetId,stepId){
    if (confirm("Voulez vous confirmer la désaffectation de cet employé du step choisi ?")) {
        var location = 'ajax.php?&action=desAff&matricule='+matricule+'&projetId='+projetId+'&stepId='+stepId;

        console.log(location);
    $.ajax({
      url: location,
      type:'GET',
      success: function(data){
       console.log(data);
       var json = $.parseJSON(data);
       console.log(json);
       if (json.reponse === 'ok') {

        new PNotify({
            title: 'Desafectation réussie',
            text: "Employé desaffecté avec succes !!",
            type: 'success',
            icon: 'fa fa-check',
            styling: "bootstrap3",
            delay: 3000
          });

        window.setTimeout(function(){

          window.location.replace('Affectation.php?matricule='+matricule);
        }, 3050);
      } else {
        new PNotify({
            title: 'Echec de desafectation',
            text: "Erreur de desafectation : "+json.reponse+"",
            type: 'error',
            icon: 'fa fa-exclamation-circle',
            styling: "bootstrap3",
            delay: 3000
          });
      }
    },
    error: function(err){
      console.log(err);
    }
  })
    }
  }

// ANNULER AJOUTER NOUVEAU EMPLOYE
  $(document.body).on('click', '#btn-annulerForm',  function() {
    console.log("Annuler Form");

    if (confirm("Voulez vous annuler et quitter le formulaire ?")) {
        window.location.replace('Gestion_Employe.php');
    }
    return false; // to not refresh the page
  });

 // ANNULER AFFECTATION EMPLOYE
  $(document.body).on('click', '#btn-annulerFormAffect',  function() {
    console.log("Annuler Form");

    if (confirm("Voulez vous annuler et quitter le formulaire ?")) {
        window.location.replace('Affecter_Employe.php');
    }
    return false; // to not refresh the page
  }); 

// REDIRECTION VERS L'AJOUT D'UN NOUVEAU EMPLOYE
  $(document.body).on('click', '#btn-ajouterEmploye',  function() {
    console.log("redirection vers la page d'ajout");
        window.location.href= 'Ajouter_Employe.php';
    return false; // to not refresh the page
  });

// CERTIFICATION
     $(document.body).on('click', '#confirmCertif',  function() {
    console.log("Submit-certification");

    var queryString = $("#certifier").serialize()+'&action=submitCertif';


    console.log(queryString);

    if (confirm("Voulez vous certifier cet employé ?")) {

    $.ajax({
      url: 'ajax.php?'+queryString,
      type:'GET',
      success: function(data){
       console.log(data);

       var json = $.parseJSON(data);
       console.log(json);
       if (json.reponse === 'ok') {

        new PNotify({
            title: 'Certification réussie',
            text: "Certification enregistrée avec succès !!",
            type: 'success',
            icon: 'fa fa-check',
            styling: "bootstrap3",
            delay: 3000
          });

        window.setTimeout(function(){

          window.location.reload();
        }, 3050);
      } else {
        new PNotify({
            title: 'Echec de certification',
            text: "Erreur de certification : "+json.reponse+"",
            type: 'error',
            icon: 'fa fa-exclamation-circle',
            styling: "bootstrap3",
            delay: 3000
          });
      }
    },
    error: function(err){
      console.log(err);
    }
  });
  }
    return false; // to not refresh the page
  });

// DECERTIFICATION
  function decertifierEmploye(matricule,projetId,stepId,niveau){
    if (confirm("Voulez vous décertifier cet employé au niveau précédent?")) {
        var location = 'ajax.php?&action=decertifierEmploye&matricule='+matricule+'&projetId='+projetId+'&stepId='+stepId+'&niveau='+niveau;
        
        console.log(location);
    $.ajax({
      url: location,
      type:'GET',
      success: function(data){
       console.log(data);
       var json = $.parseJSON(data);
       console.log(json);
       if (json.reponse === 'ok') {

        new PNotify({
            title: 'Decertification réussie',
            text: "Employé decertifié avec succès !!",
            type: 'success',
            icon: 'fa fa-check',
            styling: "bootstrap3",
            delay: 3000
          });

        window.setTimeout(function(){

          window.location.replace('Certifier.php?matricule='+matricule+'&projetId='+projetId+'&stepId='+stepId);
        }, 3050);
      } else {
        new PNotify({
            title: 'Echec de decertification',
            text: "Erreur de decertification : "+json.reponse+"",
            type: 'error',
            icon: 'fa fa-exclamation-circle',
            styling: "bootstrap3",
            delay: 3000
          });
      }
    },
    error: function(err){
      console.log(err);
    }
  })
    }
  }



function modifierEmploye(matricule){
    console.log("redirection vers la page de modification");
    var location = 'modifierEmploye.php?matricule='+matricule;
        window.location.href = location;
}

function affecterEmploye(matricule){
    console.log("redirection vers la page d'affectation'");
    var location = 'Affectation.php?matricule='+matricule;
        window.location.href = location;
}

function certifier(matricule,projetId,stepId){
    console.log("redirection vers la page de certification");
    var location = 'Certifier.php?matricule='+matricule+'&projetId='+projetId+'&stepId='+stepId;
        window.location.href = location;
  }

function certificationPage(projet){
    console.log("redirection vers la page de CErtificationStep");
    var location = 'CertificationSteps.php?projetId='+projet;
        window.location.href = location;
}

function matriceProjetPage(projet){
    console.log("redirection vers la page de matrice");
    var location = 'Matrice1.php?projetId='+projet;
        window.location.href = location;  
}

function matriceEmployePage(matricule) {
    console.log("redirection vers la page de matrice 2");
    var location = 'Matrice2.php?matricule='+matricule;
        window.location.href = location; 
}

function certification(projet,step){
    console.log("redirection vers la page de CErtification");
    var location = 'CertificationEmploye.php?projetId='+projet+'&stepId='+step;
        window.location.href = location;
}


  

