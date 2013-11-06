/* local pmcake js */
function task_goto_URL(id,value) {
window.location.href = "/intranet/pmcake/pm_tasks/repousser?identifiant="+id+"&ajout="+value;
}

function move_menu(id,value) {
window.location.href = "/intranet/pmcake/pm_menus/deplacer?id="+id+"&deplacer="+value;
}


/* #################### NEW AJAX JQUERY #################### */

/* one click task completed */
function task_ok(id,value) {
	$.ajax({
	   type: "GET",
	   url: "/intranet/pmcake/pm_tasks/ok?identifiant="+id+"&ajout="+value,
	   error:function(msg){
		 alert( "Error !: " + msg );
	   },
	   success:function(data){
		   lid="#tr"+id;
		   /*cache la tache déplacée*/
		   $(lid).fadeOut();
		}
	});
}

/* one click change priority */
function change_priorite(id,priorite) {
	 var prioritecolor=new Array("white", "#00FF00", "#90EE90" ,"#FFA500" ,"#FFC0CB","#FF6C7F");

	$.ajax({
	   type: "GET",
	   url: "/intranet/pmcake/pm_tasks/changepriorite?identifiant="+id+"&priorite="+priorite,
	   error:function(msg){
		 alert( "Error !: " + msg );
	   },
	   success:function(data){
		   lid="#priorite"+id;
		   $(lid).css("background-color",prioritecolor[priorite]);
		}
	});
}

/*
 * fonction changer date de debut
 */
function change_date_debut(idtask,startdate){
	$.ajax({
		   type: "GET",
		   url: "/intranet/pmcake/pm_tasks/changedatedebut?identifiant="+idtask+"&startdate="+startdate,
		   error:function(msg){
			 alert( "Error !: " + msg );
		   },
		   success:function(data){
			}
		});
}

/*
 * fonction changer date de fin
 */
function change_date_fin(idtask,enddate){
	$.ajax({
		   type: "GET",
		   url: "/intranet/pmcake/pm_tasks/changedatefin?identifiant="+idtask+"&enddate="+enddate,
		   error:function(msg){
			 alert( "Error !: " + msg );
		   },
		   success:function(data){
			}
		});
}
/* ajout_heure: ajax add time for a given task  
 * 
 * */
function ajout_heure(champ,pid,taskid) {
	task=document.getElementById(champ).value;
	heure=document.getElementById('heuretask').value;
	if(isNaN(Number(heure))||Number(heure)<0.05){
		alert("Préciser le temps!");
	} else if(task.length<1) {
		alert("Mettre un commentaire");
	} else {
		/*alert("/intranet/pmcake/pm_tasks_times/ajoutheure?projectid="+pid+"&idtache="+taskid+"&addtime="+heure+"&comments="+task);*/ 
	$.ajax({
		   type: "GET",
		   url: "/intranet/pmcake/pm_tasks_times/ajoutheure?projectid="+pid+"&idtache="+taskid+"&addtime="+heure+"&comments="+task,
		   error:function(msg){
			 alert( "Error !: " + msg );
		   },
		   success:function(data){
			   /*alert("OK, time added");*/
		   }
		});
		
	}
}

/* edit task: change content of a text or textarea field */
function libelle_change_status(champ,libelle,id) {
	modif=document.getElementById(libelle).value;
	$.ajax({
		   type: "GET",
		   url: "/intranet/pmcake/pm_tasks/changelibelle?identifiant="+id+"&champ="+libelle+"&ajout="+modif,
		   error:function(msg){
			   /*
			    * todo fixme: makes a bug, so deactivated
			    */
			 //alert( "Error !: " + msg );
		   },
		   success:function(data){
			   lid="#tr"+id;
			   /*cache la tache déplacée*/
			   $(lid).fadeOut();
			}
		});
}


/* change task status */
function task_change_status(id,status) {
	/*alert(id,status);*/
	$.ajax({
	   type: "GET",
	   url: "/intranet/pmcake/pm_tasks/ok?identifiant="+id+"&status="+status,
	   error:function(msg){
		 alert( "Error !: " + msg );
	   },
	   success:function(data){
			/*alert("Status changed to: "+status);*/
		}
	});
}

/* push delay for a given task to tommorow */
	function demain(id) {
	$.ajax({
	   type: "GET",
	   url: "repousser?identifiant=" + id + "&demain=demain",
	   error:function(msg){
		 alert( "Error !: " + msg );
	   },
	   success:function(data){
		   lid="#tr"+id;
		   /*cache la tache déplacée*/
		   $(lid).fadeOut();
		}
	});
	}

/* push delay for a given task to a given date */

	function repousser(id) {
		   var ajout = document.getElementById('sel'+id).value;
			var queryString = "?identifiant=" + id + "&ajout="+ajout;

	$.ajax({
	   type: "GET",
	   url: "repousser"+ queryString,
	   error:function(msg){
		 alert( "Error !: " + msg );
	   },
	   success:function(data){
		   lid="#tr"+id;
		   /*cache la tache déplacée*/
		   $(lid).fadeOut();
		}
	});
	}

/*
 * hide - show DIV element
 */

function showdetailtaskhours() {
	if(document.getElementById("showdetailtaskhours").style.display=="none"){
		document.getElementById("showdetailtaskhours").style.display="block";		
		} else {
		document.getElementById("showdetailtaskhours").style.display="none";		
	}
}
/*
 * keyboard shortcuts
 */


var isCtrl = false;$(document).keyup(function (e) {

	if(e.which == 225) isCtrl=false;

	}).keydown(function (e) {

	    if(e.which == 225) isCtrl=true;

	    if(e.which == 72 && isCtrl == true) {
	    	/*
	    	 * new helpdesk time add: ALTgr+h
	    	 */
	    	window.location = "/intranet/pmcake/pm_tasks_times/add?projectid=38&idtache=227";
	   return true;
	 } else if(e.which == 32 && isCtrl == true) {
		 /*
		  * home: ALT+SPACE
		 */	    
		 window.location = "/intranet/pmcake/";

		   return true;

	 } else if(e.which == 78 && isCtrl == true) {
			 /*
			  * new task: ALT+N
			 */	    
			 window.location = "/intranet/pmcake/pm_tasks/add";

			   return true;

	 }


	    
	});

/*
 * some fonction for homepage
 * 
 */
function montrecache1() {
	if(document.getElementById("tomorrowContainer").style.display=="none"){
		document.getElementById("tomorrowContainer").style.display="block";		
	} else {
		document.getElementById("tomorrowContainer").style.display="none";		
	}
}

function montrecache2() {
	if(document.getElementById("futureContainer").style.display=="none"){
		document.getElementById("futureContainer").style.display="block";		
		} else {
		document.getElementById("futureContainer").style.display="none";		
	}
}

function task_detail(id) {
	id='detail'+id;
				document.getElementById(id).style.display="block";		

}