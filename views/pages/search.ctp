<?php
/*
 * Global search on pmcake
 */

#Configure::write('debug', 2);
	App::import('Lib', 'functions'); //imports app/libs/functions

	$this->pageTitle="Moteur de recherche";

/* 
 * retrieve GET datas
 */	
$q=$_GET['q'];
$boolean=$_GET['boolean'];

				
echo "<h1>" .$this->pageTitle .": " .$q ."</h1>";
echo "boolean: " .$boolean;
?>
<div style="background-color: #FFFEB9">
<a href="#Projets">Projets</a> | 
<a href="#tasks">Tâches</a> | 
<a href="#dreams">Incubateur / Idées</a> | 
<a href="#references">Références</a> | 
<a href="#CMS">CMS</a> | 
<a href="#obsoletes">Logins Obsolètes</a> | 
<a href="#faqs">FAQs</a> | 
<a href="#types">Types CMS</a> | 
<a href="#patchadmins">CMS persos</a> | 
<a href="#bookmarks">bookmarks</a> | 
<a href="#fonctions">Fonctions</a>

</div>
<?php 
########## PROJECTS ###########

echo "<a name=\"Projets\" /><h1>Projets</h1>";

$db=connect_db();
$db_name=db_name();
mysql_select_db($db_name,$db);

$qboole=preg_replace("/ /","* +",$q);
$qboole="+".$qboole."*";
//echo $qboole; exit;

$q=preg_replace("/'/","%", $q);
$q=preg_replace("/\"/","%", $q);
		
		
if($boolean=="on") {//boolean		
		$sql="SELECT * FROM pm_projects WHERE 
		MATCH (name) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (description) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (url_dev) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (url_prod) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		";	
} else { //regular
		$sql="SELECT * FROM pm_projects WHERE 
		name LIKE '%".$q."%' 
		OR description LIKE '%".$q."%' 
		OR url_dev LIKE '%".$q."%' 
		OR url_prod LIKE '%".$q."%' ";
}		



//echo $sql;
		$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
echo "hits # " .mysql_num_rows($sql);
?>
<table>
<?		
$i=0;
for($i=0;$i<mysql_num_rows($sql);$i++){
		$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		}
		echo "<tr " .$class .">";
						echo  "<td><a href=\"" .CHEMIN ."pm_projects/view/" .mysql_result($sql,$i,'id') ."\">" .utf8_encode(mysql_result($sql,$i,'name')) ."</a></td>";

			echo "</tr>";
}
		

?>
</table>	
<!-- ############## TASKS  ############## -->
<?
//boolean		
if($boolean=="on") {
	$sql="SELECT * FROM pm_tasks WHERE 
		MATCH (name) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (description) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		ORDER BY status DESC, due_date";
		} else {
	//regular
		$sql="SELECT * FROM pm_tasks WHERE name LIKE '%".$q."%' 
		OR description LIKE '%".$q."%' ORDER BY status DESC, due_date";
			
		}
		//echo $sql; //test
		$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
?>
<?		
$task=""; $incub=""; $ref="";

$i=0;
		while($i<mysql_num_rows($sql)){
					$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		}
		#	echo $html->link($taskToday['Task']['name'], '/tasks/edit/'.$taskToday['Task']['id'],  
		$tache=mysql_result($sql,$i,'status');
if($tache<17) {
			$task .=  "<tr " .$class .">";
#			$task .=  "<td>" .$html->link(mysql_result($sql,$i,'name'),'/pmcake/pm_tasks/edit/'.mysql_result($sql,$i,'id')) ."</td>";
			$task .=  "<td>" .statutreturn(mysql_result($sql,$i,'status'))." <a href=\"" .CHEMIN ."pm_tasks/edit/" .mysql_result($sql,$i,'id') ."\">" .utf8_encode(mysql_result($sql,$i,'name')) ."</a> <em>(" .projet_nom_return(mysql_result($sql,$i,'project')) ." - " .mysql_result($sql,$i,'due_date').")</em></td>";
			$task .=  "</tr>";
}elseif($tache==17) {
			$incub .=  "<tr " .$class .">";
			$incub .=  "<td>" ."<a href=\"" .CHEMIN ."pm_tasks/edit/" .mysql_result($sql,$i,'id') ."\">" .utf8_encode(mysql_result($sql,$i,'name')) ."</a></td>";
			$incub .=  "</tr>";
}elseif($tache==22) {
			$ref .=  "<tr " .$class .">";
			$ref .=  "<td>" ."<a href=\"" .CHEMIN ."pm_tasks/edit/" .mysql_result($sql,$i,'id') ."\">" .utf8_encode(mysql_result($sql,$i,'name')) ."</a></td>";
			$ref .=  "</tr>";
}			
			
			$i++;
			}
if($task=="") {
	$task="<em>Pas de résultats</em>";
}
if($incub=="") {
	$incub="<em>Pas de résultats</em>";
}
if($ref=="") {
	$ref="<em>Pas de résultats</em>";
}
echo "<a name=\"tasks\" /><h1>Tâches</h1>";

?>

<table>
<? 

echo $task;

?>
</table>	


<a name="dreams" /><h1>Incubateur / Idées</h1>
<table>
<? echo $incub;?>
</table>	

<a name="references" />
<h1>Références</h1>
<table>
<? echo $ref;?>
</table>	




<?php 
/* cms */
echo "<a name=\"CMS\" /><h1>CMS</h1>
<table>";

if($boolean=="on") {//boolean		
	$sql="SELECT * FROM cms WHERE 
		MATCH (login) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (email) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (url) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (version) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (rem) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		ORDER BY url";
	} else { //regular
		$sql="SELECT * FROM cms WHERE 
		login LIKE '%".$q."%'  
		OR email LIKE '%".$q."%'  
		OR url  LIKE '%".$q."%' 
		OR version  LIKE '%".$q."%' 
		OR rem  LIKE '%".$q."%' 
		ORDER BY url";
	}
		
		//echo $sql;
		$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
		$task=""; $i=0;
		while($i<mysql_num_rows($sql)){
					$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		}
			$task .=  "<tr " .$class .">";
			$task .=  "<td><a href=\"mailto:" .mysql_result($sql,$i,'email') ."\">" .mysql_result($sql,$i,'email') ."</a> "
			."<a href=\"" .mysql_result($sql,$i,'url') ."\">" .mysql_result($sql,$i,'url') ."</a> "
			." <em>(" .mysql_result($sql,$i,'path') .")</em>"
			." <a href=\"" .CHEMIN ."cms/edit/" .mysql_result($sql,$i,'id') ."\">" .mysql_result($sql,$i,'login') 
			."</a>";
			$task .=  "</td></tr>";
			$i++;
			}
			
if($task=="") {
	$task="<em>Pas de résultats</em>";
}
echo $task;
echo "</table>";
?>


<!-- ######### obsoletelogins ########### -->
<?php echo "<a name=\"obsoletes\" /><h1>Logins Obsolètes</h1>";?>
<table>
<?php 
 if($boolean=="on") {//boolean		
$sql="SELECT * FROM obsoletelogins WHERE 
		MATCH (login) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (mail) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (path) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (garant) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (remarques) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		ORDER BY mail";
 } else { //regular
$sql="SELECT * FROM obsoletelogins WHERE 
		login LIKE '%".$q."%'  
		OR mail LIKE '%".$q."%'  
		OR path LIKE '%".$q."%'  
		OR garant LIKE '%".$q."%'  
		OR remarques LIKE '%".$q."%'  
		ORDER BY mail";
 }		
		//echo $sql;
		$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
?>
<?		
$task="";

$i=0;
		while($i<mysql_num_rows($sql)){
					$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		}
		$tache=mysql_result($sql,$i,'status');
			$task .=  "<tr " .$class .">";
			$task .=  "<td><a href=\"mailto:" .mysql_result($sql,$i,'mail') ."\">" .mysql_result($sql,$i,'mail') ."</a> "
			." <em>(" .mysql_result($sql,$i,'path') ." - " .mysql_result($sql,$i,'lastmodif').")</em>"
			." <a href=\"" .CHEMIN ."obsoletelogins/edit/" .mysql_result($sql,$i,'id') ."\">" .mysql_result($sql,$i,'login') 
			."</a>";
			$task .=  "</td></tr>";
			
			$i++;
			}
			
if($task=="") {
	$task="<em>Pas de résultats</em>";
}
echo $task;
?>
</table>

<?php 
/* types */
echo "<a name=\"types\" /><h1>Types CMS</h1>
<table>";
 if($boolean=="on") {//boolean		
	$sql="SELECT * FROM types WHERE 
		MATCH (lib) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (version) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (url) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		ORDER BY lib";
} else { //regular
	$sql="SELECT * FROM types WHERE 
		lib LIKE '%".$q."%'  
		OR version LIKE '%".$q."%'  
		OR url LIKE '%".$q."%'  
		ORDER BY lib";
}
	
		//echo $sql;
		$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
		$task=""; $i=0;
		while($i<mysql_num_rows($sql)){
					$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		}
		$tache=mysql_result($sql,$i,'status');
			$task .=  "<tr " .$class ."><td>"
			."<a href=\"" .mysql_result($sql,$i,'url') ."\">" .mysql_result($sql,$i,'url') ."</a>"
			."</td><td>"
			." <em>(" .mysql_result($sql,$i,'version') .")</em>"
			."</td><td>"
			." <a href=\"" .CHEMIN ."cms/edit/" .mysql_result($sql,$i,'id') ."\">" .mysql_result($sql,$i,'lib') 
			."</a>";
			$task .=  "</td></tr>";
			$i++;
			}
			
if($task=="") {
	$task="<em>Pas de résultats</em>";
}
echo $task;
echo "</table>";
?>

<?php 
/* faqs */
echo "<a name=\"faqs\" /><h1>FAQs</h1>
<table>";
if($boolean=="on") {//boolean		
$sql="SELECT * FROM faqs WHERE
		MATCH (lib) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (short_answer) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (answer) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (rem) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		ORDER BY lib";
} else { //regular
$sql="SELECT * FROM faqs WHERE
		lib LIKE '%".$q."%'  
		OR short_answer LIKE '%".$q."%'  
		OR answer LIKE '%".$q."%'  
		OR rem LIKE '%".$q."%'  
		ORDER BY lib";
}
//echo $sql; //tests
		$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
		$task=""; $i=0;
		while($i<mysql_num_rows($sql)){
					$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		}
			$task .=  "<tr " .$class .">";
			$task .="<td><a href=\"" .CHEMIN ."faqs/edit/" .mysql_result($sql,$i,'id') ."\">";
			 $task .=utf8_encode(substr(mysql_result($sql,$i,'lib'),0,50));
			$task .="</a>";
			$task .=  "</td></tr>";
			$i++;
			}
			
if($task=="") {
	$task="<em>Pas de résultats</em>";
}
echo $task;
echo "</table>";
?>

<?php 
/* patchadmins */
echo "<a name=\"patchadmins\" /><h1>CMS persos</h1>
<table>";
 if($boolean=="on") {//boolean		
$sql="SELECT * FROM patchadmins WHERE 
		MATCH (server) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (type) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (url) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (contenu) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (version) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (rem) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (meladmin) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 		
		ORDER BY url";
 } else { //regular
$sql="SELECT * FROM patchadmins WHERE 
		server LIKE '%".$q."%'  
		OR type LIKE '%".$q."%'  
		OR url LIKE '%".$q."%'  
		OR contenu LIKE '%".$q."%'  
		OR version LIKE '%".$q."%'  
		OR rem LIKE '%".$q."%'  
		OR meladmin LIKE '%".$q."%'  		
		ORDER BY url";
 }
		//echo $sql;
		$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
		$task=""; $i=0;
		while($i<mysql_num_rows($sql)){
					$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		}
		$tache=mysql_result($sql,$i,'status');
			$task .=  "<tr " .$class .">";
			$task .=  "<td><a href=\"mailto:" .mysql_result($sql,$i,'meladmin') ."\">" .mysql_result($sql,$i,'meladmin') ."</a></td>"
			."<td><a href=\"" .mysql_result($sql,$i,'url') ."\">" .mysql_result($sql,$i,'url') ."</a></td>"
			."<td><em>(" .utf8_encode(substr(mysql_result($sql,$i,'rem'),0,50)) ." - " .mysql_result($sql,$i,'miseajour').")</em></td>"
			."<td><a href=\"" .CHEMIN ."patchadmins/edit/" .mysql_result($sql,$i,'id') ."\">" .utf8_encode(substr(mysql_result($sql,$i,'contenu'),0,50)) 
			."</a>";
			$task .=  "</td></tr>";
			$i++;
			}
			
if($task=="") {
	$task="<em>Pas de résultats</em>";
}
echo $task;
echo "</table>";
?>

<?php 
/* patchadmins */
echo "<a name=\"bookmarks\" /><h1>Bookmarks</h1>
<table>";
 if($boolean=="on") {//boolean		
$sql="SELECT * FROM pm_bookmarks WHERE 
		MATCH (name) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (url) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (description) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (comments) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		ORDER BY url";
} else { //regular
$sql="SELECT * FROM pm_bookmarks WHERE 
		name LIKE '%".$q."%'  
		OR url LIKE '%".$q."%'  
		OR description LIKE '%".$q."%'  
		OR comments LIKE '%".$q."%'  
		ORDER BY url";
}

	
	//	echo $sql;
		$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
		$task=""; $i=0;
		while($i<mysql_num_rows($sql)){
					$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		}
		$tache=mysql_result($sql,$i,'status');
			$task .=  "<tr " .$class .">";
			$task .=
			"<td><a href=\"" .mysql_result($sql,$i,'url') ."\">" .mysql_result($sql,$i,'name') ."</a></td>"
			."<td><em>(" .utf8_encode(substr(mysql_result($sql,$i,'description'),0,50)) ." - " .mysql_result($sql,$i,'created').")</em></td>"
			."<td><a href=\"" .CHEMIN ."pm_bookmarks/edit/" .mysql_result($sql,$i,'id') ."\">modifier</a>";
			$task .=  "</td></tr>";
			$i++;
			}
			
if($task=="") {
	$task="<em>Pas de résultats</em>";
}
echo $task;
echo "</table>";
?>

<?php 
/* fonctions */
echo "<a name=\"fonctions\" /><h1>Fonctions</h1>
<table>";
 if($boolean=="on") {//boolean		
$sql="SELECT * FROM fonctions WHERE 
		MATCH (lib) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (fonction) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		OR MATCH (note) AGAINST ('".$qboole."'  IN BOOLEAN MODE) 
		ORDER BY lib";
} else { //regular
$sql="SELECT * FROM fonctions WHERE 
		lib LIKE '%".$q."%'  
		OR fonction LIKE '%".$q."%'  
		OR note LIKE '%".$q."%'  
		ORDER BY lib";
}

	
	//	echo $sql;
		$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
		$task=""; $i=0;
		while($i<mysql_num_rows($sql)){
					$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		}
		$tache=mysql_result($sql,$i,'status');
			$task .=  "<tr " .$class .">";
			$task .=
			"<td>" .mysql_result($sql,$i,'lib') ."</td>"
			."<td><em>(" .utf8_encode(substr(mysql_result($sql,$i,'fonction'),0,50)) ." - " .mysql_result($sql,$i,'note').")</em></td>"
			."<td><a href=\"" .CHEMIN ."fonctions/edit/" .mysql_result($sql,$i,'id') ."\">modifier</a>";
			$task .=  "</td></tr>";
			$i++;
			}
			
if($task=="") {
	$task="<em>Pas de résultats</em>";
}
echo $task;
echo "</table>";
?>