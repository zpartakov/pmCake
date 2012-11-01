<?
App::import('Lib', 'functions'); //imports app/libs/functions
/* push delay for a given task */
$ajout=$_GET['ajout'];
$identifiant=$_GET['identifiant'];

if($identifiant=="prof") {
	echo phpinfo(); exit;
}

#echo $_SERVER["REQUEST_URI"]; exit;
$demain=$_GET['demain'];

/* set delay to tomorrow */
#if($demain=="demain") {
if(preg_match("/&demain/", $_SERVER["REQUEST_URI"])) {
	
	$ajout=1;
	$demain=date("U")+24*3600;
	$demain=date("Y-m-d",$demain);
	$sql="UPDATE pm_tasks 
	SET due_date='".$demain ."' 
	WHERE id = " .$identifiant;
	#echo $sql; exit;
	$sql=mysql_query($sql);
	if(!$sql){
		echo "Erreur SQLx: " .mysql_error();
	} else {
		header("Location: " .$_SERVER["HTTP_REFERER"]);
	}
} else {
	#exit;
	/* set delay to N days*/
	$sql="
	UPDATE pm_tasks 
	SET due_date=ADDDATE(due_date, INTERVAL $ajout DAY)
	WHERE id = $identifiant
	";
	$sql=mysql_query($sql);
	if(!$sql){
		echo "Erreur SQL: " .mysql_error();
	} else {
		header("Location: " .$_SERVER["HTTP_REFERER"]."#".date("Ymd"));
	}
}
?>
