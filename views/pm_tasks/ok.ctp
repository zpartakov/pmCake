<?
App::import('Lib', 'functions'); //imports app/libs/functions
/* set status to done */
$identifiant=$_GET['identifiant'];
$status=$_GET['status'];
if(!$status) {
	$status=1;
}

	/* set delay to N days*/
	$sql="
	UPDATE pm_tasks 
	SET status=" .$status ." 
	WHERE id = " .$identifiant;

	$sql=mysql_query($sql);
	if(!$sql){
		echo "Erreur SQL: " .mysql_error();
	} else {
		#echo '<meta http-equiv="refresh" content="0;URL=overdue.php?typeReports=custom">';'
		#if($_SERVER["HTTP_REFERER"]==""
		header("Location: " .$_SERVER["HTTP_REFERER"]);
	}


?>
