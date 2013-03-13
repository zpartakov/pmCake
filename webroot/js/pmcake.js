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

/* change task name */
function libelle_change_status(champ,libelle,id) {
	//alert("lib: "+libelle +" id: " +id);
	
	modif=document.getElementById(libelle).value;
	//alert("yo: "+champ +" id: " +id);
	
	$.ajax({
		   type: "GET",
		   url: "/intranet/pmcake/pm_tasks/changelibelle?identifiant="+id+"&champ="+libelle+"&ajout="+modif,
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

function checkAll(theForm, cName, status) {
for (i=0,n=theForm.elements.length;i<n;i++)
if (theForm.elements[i].className.indexOf(cName) !=-1) {
theForm.elements[i].checked = status;
}
}




