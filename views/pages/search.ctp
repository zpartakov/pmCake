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
$q=trim($q);
$q=preg_replace('/%25/','%', $q);

//$q=accents($q);
echo "<p style=\"font-size: 2em\">search: " .$q ."</p>";
$boolean=$_GET['boolean'];


echo "<h1 style=\"margin-bottom: 5px\">" .$this->pageTitle .": " .$q ."&nbsp;";
$qg=preg_replace("/ /","+",$q);
echo "</h1>";
echo "<div style=\"background-color: #FFCCB6; margin: 12px; padding: 7px; width: 300px\">";
echo "<a target=\"_blank\" href=\"http://google.com/?q=".$qg."#safe=off&q=".$qg."\">search on: google :-(</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| ";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<a target=\"_blank\" href=\"https://duckduckgo.com/?q=".$qg."\">duckduckgo :-)</a>";
echo "</div>";
?>
<div style="background-color: #FFFEB9">
<a href="#Projets">Projets</a> |
<a href="#tasks">Tâches</a> |
<a href="#hours">Tâches / heures</a> |
<a href="#dreams">Incubateur / Idées</a> |
<a href="#references">Références</a> |
<a href="#CMS">CMS</a> |
<a href="#obsoletes">Logins Obsolètes</a> |
<a href="#faqs">FAQs</a> |
<a href="#types">Types CMS</a> |
<a href="#patchadmins">CMS persos</a> |
<a href="#bookmarks">bookmarks</a> |
<a href="#fonctions">Fonctions</a> |
<a href="#contacts">Contacts</a>

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


$sql=wd_remove_accents($sql);

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
						echo  "<td><a href=\"" .CHEMIN ."pm_projects/view/" .mysql_result($sql,$i,'id') ."\">"
						.utf8_encode(mysql_result($sql,$i,'name')) ."</a></td>";

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
			$task .=  "<td>" .statutreturn(mysql_result($sql,$i,'status'))
			." <a href=\"" .CHEMIN ."pm_tasks/edit/" .mysql_result($sql,$i,'id') ."\">" .mysql_result($sql,$i,'name')
			."</a> <em>(" .utf8_decode(projet_nom_return(mysql_result($sql,$i,'project'))) ." - " .mysql_result($sql,$i,'due_date').")</em></td>";
			$task .=  "</tr>";
}elseif($tache==17) {
			$incub .=  "<tr " .$class .">";
			$incub .=  "<td>" ."<a href=\"" .CHEMIN ."pm_tasks/edit/" .mysql_result($sql,$i,'id') ."\">"
			.mysql_result($sql,$i,'name') ."</a></td>";
			$incub .=  "</tr>";
}elseif($tache==22) {
	//echo "id ref=".mysql_result($sql,$i,'id')."<br>";
			$ref .=  "<tr " .$class .">";
			$ref .=  "<td>" ."<a href=\"" .CHEMIN ."pm_tasks/edit/" .mysql_result($sql,$i,'id') ."\">"
			.mysql_result($sql,$i,'name') ."</a></td>";
			$ref .=  "</tr>";
	//echo $ref;
	//echo "len: " .strlen($ref);
}

			$i++;
			}
if($task=="") {
	$task="<em>Pas de r&eacute;sultats</em>";
}
if($incub=="") {
	$incub="<em>Pas de r&eacute;sultats</em>";
}
if(strlen($ref)<1) {
	//echo 'bla';
	$ref="<em>Pas de r&eacute;sultats</em>";
}
echo "<a name=\"tasks\" /><h1>Tâches</h1>";

?>

<table>
<?

#echo $task;
echo utf8_encode($task);
?>
</table>

<!-- ############## TASKS / HOURS  ############## -->
<?
//boolean

	//regular
		$sql="SELECT * FROM pm_tasks_time WHERE comments LIKE '%".$q."%'
		ORDER BY created";

		//echo $sql; //test
		$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
?>
<?
//$task=""; $incub=""; $ref="";

$i=0;
		while($i<mysql_num_rows($sql)){
					$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		}
		$tache=mysql_result($sql,$i,'comments');
			$task .=  "<tr " .$class .">";
			$task .=  "<td><a href=\"" .CHEMIN ."pm_tasks_times/edit/" .mysql_result($sql,$i,'id') ."\">" .$tache ."</a> <em>(" .projet_nom_return(mysql_result($sql,$i,'project')) ." - " .mysql_result($sql,$i,'created').")</em></td>";
			$task .=  "</tr>";

			$i++;
			}
if($task=="") {
	$task="<em>Pas de r&eacute;sultats</em>";
}
if($incub=="") {
	$incub="<em>Pas de r&eacute;sultats</em>";
}
if($ref=="") {
	$ref="<em>Pas de r&eacute;sultats</em>";
}
echo "<a name=\"hours\" /><h1>Tâches / heures</h1>";

?>

<table>
<?

echo utf8_encode($task);
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
	$task="<em>Pas de r&eacute;sultats</em>";
}
echo utf8_encode($task);echo "</table>";
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
	$task="<em>Pas de r&eacute;sultats</em>";
}
echo utf8_encode($task);?>
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
	$task="<em>Pas de r&eacute;sultats</em>";
}
echo utf8_encode($task);echo "</table>";
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
			 $task .=substr(mysql_result($sql,$i,'lib'),0,50);
			$task .="</a>";
			$task .=  "</td></tr>";
			$i++;
			}

if($task=="") {
	$task="<em>Pas de r&eacute;sultats</em>";
}
echo utf8_encode($task);echo "</table>";
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
			."<td><em>(" .substr(mysql_result($sql,$i,'rem'),0,50) ." - " .mysql_result($sql,$i,'miseajour').")</em></td>"
			."<td><a href=\"" .CHEMIN ."patchadmins/edit/" .mysql_result($sql,$i,'id') ."\">" .substr(mysql_result($sql,$i,'contenu'),0,50)
			."</a>";
			$task .=  "</td></tr>";
			$i++;
			}

if($task=="") {
	$task="<em>Pas de r&eacute;sultats</em>";
}
echo utf8_encode($task);echo "</table>";
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
			."<td><em>(" .substr(mysql_result($sql,$i,'description'),0,50) ." - " .mysql_result($sql,$i,'created').")</em></td>"
			."<td><a href=\"" .CHEMIN ."pm_bookmarks/edit/" .mysql_result($sql,$i,'id') ."\">modifier</a>";
			$task .=  "</td></tr>";
			$i++;
			}

if($task=="") {
	$task="<em>Pas de r&eacute;sultats</em>";
}
echo utf8_encode($task);echo "</table>";
?>

<?php
/* fonctions */
echo "<a name=\"fonctions\" /><h1>Fonctions</h1>
<table>";
/*
 * 		SQL error: The used table type doesn't support FULLTEXT
 *  --> no boolean search
 *  */
$sql="SELECT * FROM fonctions WHERE
		lib LIKE '%".$q."%'
		OR fonction LIKE '%".$q."%'
		OR note LIKE '%".$q."%'
		ORDER BY lib";


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
			."<td><em>(" .substr(mysql_result($sql,$i,'fonction'),0,50) ." - " .mysql_result($sql,$i,'note').")</em></td>"
			."<td><a href=\"" .CHEMIN ."fonctions/edit/" .mysql_result($sql,$i,'id') ."\">modifier</a>";
			$task .=  "</td></tr>";
			$i++;
			}

if($task=="") {
	$task="<em>Pas de r&eacute;sultats</em>";
}
echo utf8_encode($task);echo "</table>";
?>

<?php
/* contacts */
echo "<a name=\"contacts\" /><h1>Contacts</h1>
<table>";
 if($boolean=="on") {//boolean

/*
SELECT * FROM fonctions WHERE
		MATCH (lib) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
		OR MATCH (fonction) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
		OR MATCH (note) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
		ORDER BY lib";*/

$sql="
SELECT *
FROM `contacts`
WHERE
MATCH (FirstName) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (LastName) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (Notes) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (EmailAddress) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (Email2Address) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (Email3Address) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (PrimaryPhone) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (HomePhone) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (HomePhone2) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (MobilePhone) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (Fax) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (HomeAddress) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (Profession) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
OR MATCH (Category) AGAINST ('".$qboole."'  IN BOOLEAN MODE)
ORDER BY LastName, FirstName";

} else { //regular
$sql="
SELECT *
FROM `contacts`
WHERE `FirstName` LIKE '%".$q."%'
OR `LastName` LIKE '%".$q."%'
OR `Notes` LIKE '%".$q."%'
OR `EmailAddress` LIKE '%".$q."%'
OR `Email2Address` LIKE '%".$q."%'
OR `Email3Address` LIKE '%".$q."%'
OR `PrimaryPhone` LIKE '%".$q."%'
OR `HomePhone` LIKE '%".$q."%'
OR `HomePhone2` LIKE '%".$q."%'
OR `MobilePhone` LIKE '%".$q."%'
OR `Fax` LIKE '%".$q."%'
OR `HomeAddress` LIKE '%".$q."%'
OR `Profession` LIKE '%".$q."%'
OR `Category` LIKE '%".$q."%' ORDER BY LastName, FirstName";
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
			"<td><a href=\"mailto:" .mysql_result($sql,$i,'EmailAddress')."\">" .mysql_result($sql,$i,'LastName') ." " .mysql_result($sql,$i,'FirstName') ."</a></td>"
			."<td><a href=\"" .CHEMIN ."contacts/edit/" .mysql_result($sql,$i,'id') ."\">modifier</a>&nbsp;<a href=\"" .CHEMIN ."contacts/view/" .mysql_result($sql,$i,'id') ."\">voir</a>";
			$task .=  "</td></tr>";
			$i++;
			}

if($task=="") {
	$task="<em>Pas de r&eacute;sultats</em>";
}
echo utf8_encode($task);
echo "</table>";
?>
