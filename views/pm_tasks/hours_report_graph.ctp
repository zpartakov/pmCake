
<?php
App::import('Lib', 'functions'); //imports app/libs/functions

#cake title of the page
$this->pageTitle = 'Rapport grapique Heures'; 

/* currents tasks */
#do and check sql
$datenow = date("Y-m-d");
        $date_beg = $_GET['date_beg'];

 if ($_GET['date_end']) {
	# header('Content-type: text/x-csv');
	#header('Content-Disposition: attachment; filename="hoursFRA.csv"');
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
SELECT sum(hours) AS hours, COUNT(pm_tasks_time.hours) AS n FROM pm_tasks_time WHERE pm_tasks_time.date > '" .$date_beg ."' 
AND pm_tasks_time.date <= '" .$date_end ."'";
#echo $sql; exit;
$sql=mysql_query($sql);

if(!$sql) { echo "SQL error: " .mysql_error(); }
$totaln=mysql_result($sql,0,'hours');
#echo "Total : " .$totaln;
$totalitems=mysql_result($sql,0,'n');


$sql="
SELECT pm_projects.name AS pmn, sum(pm_tasks_time.hours) AS hours, COUNT(pm_tasks_time.hours) AS n FROM pm_tasks_time,pm_projects,pm_tasks
WHERE pm_tasks_time.date > '" .$date_beg ."' 
AND pm_tasks_time.date <= '" .$date_end ."' 
AND pm_tasks_time.project=pm_projects.id
AND pm_tasks.id=pm_tasks_time.task 
AND pm_projects.type NOT LIKE 'p' 
GROUP BY pmn 
ORDER BY hours DESC
";
#echo $sql ."<br>";

$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); }
$i=0;
$total=0; $totalhours=""; $total100="";
echo "<table><tr><th>Task</th><th>N</th><th>Hours</th><th>%</th></tr>";
while($i<mysql_num_rows($sql)){
if(!preg_match("/^perso/", 	mysql_result($sql,$i,'pmn'))) {
	$txt.= '<tr><td>' .mysql_result($sql,$i,'pmn');
	$txt.= '</td><td style="text-align: right">';
	$txt.= mysql_result($sql,$i,'n');	
	$txt.= '</td><td style="text-align: right">';
	$txt.= mysql_result($sql,$i,'hours');
	$txt.= '</td><td style="text-align: right">';
	$ratio=intval(100*(mysql_result($sql,$i,'hours')/$totaln));
	if($ratio=="0"&&mysql_result($sql,$i,'hours')>2) {
		$ratio=1;
	}
$txt.=$ratio ." %";	
$total100=$total100+$ratio;
$totalhours=$totalhours+mysql_result($sql,$i,'hours');
#$txt.=mysql_result($sql,$i,'hours') ."/" .$totaln;	
	
	
	$txt.="</td></tr>\n";
}
$i++;

}
#echo nl2br($txt); //test html formated
echo trim($txt); //prod
echo "<tr><td><strong>Total</strong></td><td style=\"text-align: right\">".$totalitems."</td><td style=\"text-align: right\">" .$totaln ."</td><td style=\"text-align: right\">" .$total100 ." %</td></tr>";
echo "	  </table>";
?>




