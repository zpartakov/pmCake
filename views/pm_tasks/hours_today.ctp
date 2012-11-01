<?php
App::import('Lib', 'functions'); //imports app/libs/functions


#cake title of the page
$this->pageTitle = 'Heures aujourd\'hui'; 

/* currents tasks */

#do and check sql
$datenow = date("Y-m-d");
 if ($_GET['S_EDATE2']) {
        $s_edate2 = $_GET['S_EDATE2'];
		$datenow=$s_edate2;        
    } else {
        $s_edate2 = date("Y-m-d",
            mktime (0, 0, 0, date("m"), date("d"), date("Y")));
    } 
######################################## PRINT #################################    
?>
<div style="position: relative; left: 250px; top: 20px">
<form methode="GET">
<input type="text" name="S_EDATE2" value="<? echo $datenow; ?>">
<input type="submit">
</form>
</div>
<?
    task_resume($s_edate2);
    task_detail($s_edate2);
    
    /* recapitulatif psnext */
    if($_GET['psnext']=="1") {
		$nb_days_back=15;
		    $date_end = date("Y-m-d", mktime (0, 0, 0, date("m"), date("d"), date("Y")));
            $date_beg=mktime (0, 0, 0, date("m"), date("d"), date("Y"));
            $date_beg=$date_beg-(3600*24*$nb_days_back); //add 15 days
            #$date_beg= date("Y-m-d",$date_beg);

for($i=0; $i<$nb_days_back; $i++){
	echo $date_beg ."<br>";
	$d=$date_beg;
	$d=date("Y-m-d",$date_beg);
		echo $d ."<hr>";
		echo "<h1>Heures " .date("D, d-m-y",$date_beg) ."</h1>";
		    task_resume($d);

	$date_beg=$date_beg+(3600*24);
}

}




?>




