<?php
/*
 * https://radeff.red/intranet/pmcake/pm_tasks/push_all_currents?ajout=4&statut=wait&type=0
 * UPDATE pm_tasks
SET due_date=DATE_ADD(due_date, INTERVAL 4 DAY)
WHERE (due_date <= '2015-11-05' AND status=5 AND priority=0)
 * 
//bug on private

 * https://radeff.red/intranet/pmcake/pm_tasks/push_all_currents?ajout=4&statut=wait&type=p
 * 
 * UPDATE pm_tasks
SET due_date=DATE_ADD(due_date, INTERVAL 4 DAY)
WHERE (due_date <= '2015-11-05' AND (status=5)) JOIN pm_projects
ON pm_tasks.project = pm_projects.id WHERE (pm_projects.type LIKE 'p')
 * */
?>
<style>
select {
vertical-align: top
}
</style>
<?php 
if(!$_GET['ajout']) { 
?>
<form method="get">
Nombre de jours à repousser:
<select name="ajout" size="60" style="">
<?php
for($i=1;$i<60;$i++) {
	echo "<option>".$i."</option>";
}
?>
</select>
statut
<select name="statut" size="4">
<option value="all">tous</option>
<option value="cours">en cours seulement</option>
<option value="wait">en attente seulement</option>
</select>


<select name="type" size="4">
<option value="all">all</option>
<option value="0">prof</option>
<option value="p">priv</option>
</select>

<?php
	$prioritelib=array("Vide","Très faible","Faible","Moyenne","Elevée","Très élevée");
	$prioritecolor=array(  "white", "#00FF00", "#90EE90" ,"#FFA500" ,"#FFC0CB","#FF6C7F");
	echo "<select name=\"priority\" ";
	//echo "size=\"6\"";
	//echo " onchange=\"change_priorite(".$idtask .",this.value)\">";
	echo ">";
	echo "<option value=\"\">*** priorité *** </option>";
	for($i=0;$i<6;$i++) {	
		echo "<option value=\"" .$i ."\"";

			echo " style=\"background-color: "  .$prioritecolor[$i] ."\"";
			if($i==$priorite) {
			echo " selected";
			}		echo ">";
		
		echo $prioritelib[$i] ."</option>";
	}
	echo "</select>";
	
?>


 
<input type="submit" onclick="return confirm('Confirmer le déplacement?')">
</form>
<?php 
}
?>

<?php
//push_all_currents?ajout=7&statut=all&type=p
if($_GET['ajout']) { 
$ajout=$_GET['ajout'];
$statut=$_GET['statut'];
$priority=$_GET['priority'];

if($statut=="all"){
	$statut="t.status=3 OR t.status=5";	
}elseif($statut=="cours"){
	$statut="t.status=3";
}elseif($statut=="wait"){
	$statut="t.status=5";
}

if($priority){
	$priority="AND t.priority=".$priority;
} else {
	$priority="";
}


$due_date=date("Y-m-d");
	$pousser=date("U")+$ajout*(24*3600);
	$pousser=date("Y-m-d",$pousser);

	$sql="SELECT * FROM pm_tasks as t, pm_projects as p
	WHERE (" .
	"t.due_date <= '" .$due_date ."' " .
	"AND ".$statut ." " .$priority ."
	AND t.project=p.id)"
	;
	
//	echo "<br><pre>".nl2br($sql)."</pre></br>";
	
	$sql=mysql_query($sql);
	
	if(!$sql){
		echo "Erreur SQLx: " .mysql_error();
	}
	echo "<br>il y a: #".mysql_num_rows($sql)." résultats</br>";
	
	$i=0;
	while($i<mysql_num_rows($sql)){
		
		echo "<br>task id: " .mysql_result($sql,$i,'t.id');
		echo "<br>type: " .mysql_result($sql,$i,'p.type');
		echo "<br>status: " .mysql_result($sql,$i,'t.status');
		echo "<br>statusSel: " .mysql_result($sql,$i,'t.status');
		$type=$_GET['type'];
		if($type==0||$type=="p") {//type of project selected
		if($type==mysql_result($sql,$i,'p.type')) {
				$sql3="UPDATE pm_tasks 
				SET due_date=DATE_ADD(due_date, INTERVAL ".$ajout ." DAY)  
				WHERE id=" . mysql_result($sql,$i,'t.id') .";";
				echo "<br>".$sql3."</br>";
				$sql3=mysql_query($sql3);
				if(!$sql3){
					echo "Erreur SQL3: " .mysql_error();
				} else {
					header("Location: " .CHEMIN);
				}
		}
		}else {
			$sql2="UPDATE pm_tasks
			SET due_date=DATE_ADD(due_date, INTERVAL ".$ajout ." DAY)
			WHERE (" .
			"due_date <= '" .$due_date ."' " .
			"AND ".$statut ." " .$priority .")"
			;
				
			$sql2=mysql_query($sql2);
			if(!$sql2){
				echo "Erreur SQL2: " .mysql_error();
			} else {
				header("Location: " .CHEMIN);
			}
		}
		echo "<br>";
		/*PmProject.type')=="0" prof
		 PmProject.type')=="p" perso
		* 
		 */	
			
		$i++;
	}
	
	exit;
	

			/*if($_GET['type'] && $_GET['type']!="all"){
$sql="UPDATE pm_tasks
	SET due_date=DATE_ADD(due_date, INTERVAL ".$ajout ." DAY)
	WHERE (" .
	"due_date <= '" .$due_date ."' " .
	"AND (".$statut .")" .
	") JOIN pm_projects
       ON pm_tasks.project = pm_projects.id WHERE (pm_projects.type LIKE '".$_GET['type']."')"
			;
*/
/*			
$sql="SELECT * FROM pm_tasks
	WHERE (" .
	"due_date <= '" .$due_date ."' " .
	"AND (".$statut .")" .
	") JOIN pm_projects
       ON pm_tasks.project = pm_projects.id WHERE (pm_projects.type LIKE '".$_GET['type']."')"
			;
	*/		

			//}
			
			//echo nl2br($sql);exit; //tests sql
				
//DATE_ADD(OrderDate,INTERVAL 45 DAY)			
//	echo $sql; exit;


}
?>
