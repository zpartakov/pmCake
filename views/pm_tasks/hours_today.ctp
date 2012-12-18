<?php
App::import('Lib', 'functions'); //imports app/libs/functions

#cake title of the page
$this->pageTitle = "Récapitulatif Heures"; 

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
/* 
 * display form
 */
?>
<div style="position: relative; left: 250px; top: 20px">
<form methode="GET">
<input type="checkbox" value="1" name="psnext">&nbsp;Psnext?
<input type="text" name="S_EDATE2" value="<? echo $datenow; ?>">
<input type="submit">
</form>
</div>
<?
    task_resume($s_edate2);
    task_detail($s_edate2);
    
    /* recapitulatif psnext + hebdo
     * 
     * */
    if($_GET['psnext']=="1") {
			$nb_days_back=15;
		    $date_end = date("Y-m-d", mktime (0, 0, 0, date("m"), date("d"), date("Y")));
            if(!$s_edate2){
			    $date_beg=mktime (0, 0, 0, date("m"), date("d"), date("Y"));
            }else{
	           	$ladatetmp=explode("-",$datenow);
			    $date_beg=mktime (0, 0, 0, $ladatetmp[1], $ladatetmp[2], $ladatetmp[0]);    	
            }
//		    $date_beg=$date_beg-(3600*24*$nb_days_back); //add 15 days
		    $date_beg=$date_beg-(3600*12*$nb_days_back); //add 7 days

//print stats

for($i=0; $i<$nb_days_back; $i++){
	$d=$date_beg;
	$d=date("Y-m-d",$date_beg);
		    task_resume($d);
	$date_beg=$date_beg+(3600*24);
	}

}




?>




