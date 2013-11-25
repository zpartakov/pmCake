<?php
/*App::import('Lib', 'functions'); //imports app/libs/functions
connect_db();
use_database();*/
/* set status to done */
$identifiant=$_GET['identifiant'];
$priorite=$_GET['priorite'];
if(!$priorite) {
	$priorite=1;
}

	/* set delay to N days*/
	$sql="
	UPDATE pm_tasks 
	SET priority='" .$priorite ."' 
	WHERE id = '" .$identifiant ."'";
//echo $sql; exit;
	$sql=mysql_query($sql);
	if(!$sql){
		echo "Erreur SQL: " .mysql_error();
	} 
	
	/*else {
		#echo '<meta http-equiv="refresh" content="0;URL=overdue.php?typeReports=custom">';'
		#if($_SERVER["HTTP_REFERER"]==""
		header("Location: " .$_SERVER["HTTP_REFERER"]);
	}*/


?>
