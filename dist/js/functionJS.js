

  var i=1;
 function addQuestion() {
  $("#container").append('<div  style="margin-top:5em;"><div class="form-group"> <label class="control-label col-sm-2" >Question:</label> <div class="col-sm-8"><input class="form-control" type="text" name="question'+i+'" id="question'+i+'" placeholder="Question '+(i+1)+'" ></div></div> <div class="form-group row"><div class="radio col-md-5"><label > <input type="radio" id="one'+i+'" name="one'+i+'" onclick="sel('+i+')">Reponse Normale</label> </div><div class="radio col-md-5"><label><input type="radio" id="many'+i+'" name="many'+i+'" onclick="sel2('+i+')" > multiple choices</label> </div><select style="visibility:hidden;" class="form-control" id="num'+i+'" onchange="selectChange(this,'+i+')" ><option value="default" disabled selected="selected" >default</option> <option value="2">2</option>  <option value="3">3</option>  <option value="4">4</option> </select> <input type="hidden" value="" id="ansNumber'+i+'" name="ansNumber'+i+'" /> <div id="ans'+i+'"></div> </div>');
   $("#numOfFields").val(i);
  i++;
  };  
  function sel(id){
	  var many='many'+id;
	  var one='one'+id;
	  var num='num'+id;
	  document.getElementById(many).checked=false;

  if(document.getElementById(one).checked) {
	  var ans='ans'+id;
	  document.getElementById(num).style.visibility = "hidden";
	  document.getElementById(ans).innerHTML = "";
	  
  }
  }
    function sel2(id){
		var many='many'+id;
	  var one='one'+id;
	  var num='num'+id;
		document.getElementById(one).checked=false;
  if(document.getElementById(many).checked) {
	document.getElementById(num).style.visibility = "visible";
  }
  }
   //////
  function selectChange(element,id) {
	  
        var n =element.options[element.selectedIndex].value ;
		addFields(n,id);
		
    }
	///////
 function addFields(number,id){
            // Number of inputs to create
            var ans='ans'+id;
            // Container <div> where dynamic content will be placed
			document.getElementById(ans).innerHTML = "";
            var container = document.getElementById(ans);
            // Clear previous contents of the container
            //$(container).append('<br>');
            for (j=0;j<number;j++){
				var name = "answer"+id + j;
				
				$(container).append('<label class="control-label">Reponse '+ (j+1)+' :  </label><input class="form-control" type="text" name="'+name+'" > ');
               
            }
			document.getElementById('ansNumber'+id).value=number;
        }



function showSteps(str) {
              if (str=="") {
                  document.getElementById("Steps").innerHTML="";
                  return;
              }
              if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
              } else { // code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange=function() {
                  if (this.readyState==4 && this.status==200) {
                      document.getElementById("Steps").innerHTML=this.responseText;
                  }
              }
              xmlhttp.open("GET","get-step.php?ProjedtId="+str,true);
              xmlhttp.send();
          }
		  
		  function showQuestions(str,projectId) {
              if (str=="") {
                  document.getElementById("Questions").innerHTML="";
                  return;
              }
              if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
              } else { // code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange=function() {
                  if (this.readyState==4 && this.status==200) {
                      document.getElementById("Questions").innerHTML=this.responseText;
                  }
              }
              xmlhttp.open("GET","add.php?StepId="+str+"&projectId="+projectId,true);
              xmlhttp.send();
          }

