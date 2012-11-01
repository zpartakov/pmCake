<?php
App::import('Lib', 'functions'); //imports app/libs/functions

#cake title of the page

/*clean tasks times*/
$sql="
SELECT * FROM pm_tasks_time 
WHERE pm_tasks_time.modified NOT LIKE '20%' OR pm_tasks_time.created NOT LIKE '20%' 
ORDER BY pm_tasks_time.date
";
$sql=mysql_query($sql);
if(!$sql) { $txt.= "SQL error: " .mysql_error(); }


$i=0;
#$txt.= "Total: " .mysql_num_rows($sql) ."<hr>";
while($i<mysql_num_rows($sql)){
#	$txt.= "<br>" .mysql_result($sql,$i,'modified');
#	$txt.= " " .date("Y-m-d", mysql_result($sql,$i,'modified'));
	
	$sql2="UPDATE pm_tasks_time SET pm_tasks_time.modified = '" .date("Y-m-d", mysql_result($sql,$i,'modified')) ."' WHERE id=" .mysql_result($sql,$i,'id');
	$sql2=mysql_query($sql2);
	if(!$sql2) { $txt.= "SQL error: " .mysql_error(); }
	$sql2="UPDATE pm_tasks_time SET pm_tasks_time.created = '" .date("Y-m-d", mysql_result($sql,$i,'created')) ."' WHERE id=" .mysql_result($sql,$i,'id');
	$sql2=mysql_query($sql2);
	if(!$sql2) { $txt.= "SQL error: " .mysql_error(); }	
#	$txt.= "<br>";
	$i++;
	}
#exit;

/* currents tasks */
#do and check sql
$datenow = date("Y-m-d");
        $date_beg = $_GET['date_beg'];

 if ($_GET['date_end']) {
	header('Content-type: text/x-csv');
	header('Content-Disposition: attachment; filename="hoursFRA.csv"');
        $date_end = $_GET['date_end'];
		$datenow=$date_end;        
    } else {
        $date_end = date("Y-m-d",
            mktime (0, 0, 0, date("m"), date("d"), date("Y")));
            $date_beg=mktime (0, 0, 0, date("m"), date("d"), date("Y"));
            $date_beg=$date_beg-(3600*24*62); //add min 2 months
            $date_beg= date("Y-m-d",$date_beg);
echo '            <div style="position: relative; left: 250px; top: 20px">
<h1>Rapport heures Fred Radeff</h1>
<form methode="GET">
Date début: <input type="text" name="date_beg" value="'.$date_beg .'">
Date fin: <input type="text" name="date_end" value="'.$datenow. '">
<input type="submit">
</form>
<hr />
</div>';
exit;
    } 
    
?>

<?

######### DETAIL #########
$sql="
SELECT * FROM pm_tasks_time,pm_projects,pm_tasks
WHERE pm_tasks_time.date > '" .$date_beg ."' 
AND pm_tasks_time.date <= '" .$date_end ."' 
AND pm_tasks_time.project=pm_projects.id
AND pm_tasks.id=pm_tasks_time.task 
AND pm_projects.type NOT LIKE 'p' 
ORDER BY pm_tasks_time.date
";
$txt= "project;task;date;comments;hours\n";
$sql=mysql_query($sql);
$i=0;
$total=0;
while($i<mysql_num_rows($sql)){
if(!preg_match("/^perso/", 	mysql_result($sql,$i,'pm_projects.name'))) {
	$txt.= '"' .mysql_result($sql,$i,'pm_projects.name');
	$txt.= '";"';
	$txt.= mysql_result($sql,$i,'pm_tasks.name');
	$txt.= '";"';
	//$txt.= preg_replace("/ [0-9][0-9]:[0-9][0-9]/", "", mysql_result($sql,$i,'pm_tasks_time.modified'));
	$txt.= mysql_result($sql,$i,'pm_tasks_time.date');
	
	$txt.= '";"';
	$txt.= preg_replace("/;/"," " ,substr(mysql_result($sql,$i,'pm_tasks_time.comments'), 0,100));
	$txt.= '";';
	$txt.= mysql_result($sql,$i,'pm_tasks_time.hours');
	$txt.="\n";
}
$i++;

}
#echo nl2br($txt); //test html formated
echo trim($txt); //prod
?>




