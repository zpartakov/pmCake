<form method="get">
Nombre de jours à repousser:
<select name="ajout">
<?php
for($i=1;$i<30;$i++) {
	echo "<option>".$i."</option>";
}
?>
</select>
statut
<select name="statut">
<option value="all">tous</option>
<option value="cours">en cours seulement</option>
<option value="wait">en attente seulement</option>
</select>


<select name="type">
<option value="all">all</option>
<option value="0">prof</option>
<option value="p">priv</option>
</select>
 
<input type="submit" onclick="return confirm('Confirmer le déplacement?')">
</form>
<?php

if($_GET['ajout']) { 
	
	/*
	 * pm_tasks.project
	 * pm_projects.type=p
	 */
$ajout=$_GET['ajout'];
/*
 *  
	3 	ouvert
	5 	en attente
 */
$statut=$_GET['statut'];
if($statut=="all"){
	$statut="status=3 OR status=5";
}elseif($statut=="cours"){
	$statut="status=3";
}elseif($statut=="wait"){
	$statut="status=5";
}

$due_date=date("Y-m-d");
	$pousser=date("U")+$ajout*(24*3600);
	$pousser=date("Y-m-d",$pousser);

	
	$sql="UPDATE pm_tasks 
	SET due_date=DATE_ADD(due_date, INTERVAL ".$ajout ." DAY)  
	WHERE (" .
			"due_date <= '" .$due_date ."' " .
					"AND (".$statut .")" .
					")" 
			;

			if($_GET['type'] && $_GET['type']!="all"){
$sql="UPDATE pm_tasks
	SET due_date=DATE_ADD(due_date, INTERVAL ".$ajout ." DAY)
	WHERE (" .
	"due_date <= '" .$due_date ."' " .
	"AND (".$statut .")" .
	") JOIN pm_projects
       ON pm_tasks.project = pm_projects.id WHERE (pm_projects.type LIKE '".$_GET['type']."')"
			;
			
$sql="SELECT * FROM pm_tasks
	WHERE (" .
	"due_date <= '" .$due_date ."' " .
	"AND (".$statut .")" .
	") JOIN pm_projects
       ON pm_tasks.project = pm_projects.id WHERE (pm_projects.type LIKE '".$_GET['type']."')"
			;
			
			echo nl2br($sql);
				exit;
			}
				
//DATE_ADD(OrderDate,INTERVAL 45 DAY)			
//	echo $sql; exit;
	$sql=mysql_query($sql);
	if(!$sql){
		echo "Erreur SQLx: " .mysql_error();
	} else {
		header("Location: " .CHEMIN);
	}

}
?>
