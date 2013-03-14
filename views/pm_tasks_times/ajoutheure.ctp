<?		
#echo phpinfo();
App::import('Lib', 'functions'); //imports app/libs/functions

$projectid=$_GET['projectid'];
		$idtache=$_GET['idtache'];
		$addtime=$_GET['addtime'];
		$addtime=$_GET['addtime'];
		$comments=$_GET['comments'];
		//echo $projectid . " - " .$idtache . " - " .$addtime."<hr>"; 

$date=date("Y-m-d h:i:s");
$sdate=date("Y-m-d");
		$sql="
		INSERT INTO `pm_tasks_time` 
		(`id`, `project`, `task`, `owner`, `date`, `hours`, `comments`, `created`, `modified`) 
		VALUES 
		('', $projectid, $idtache, 3, '".$sdate."', " .$addtime .", '".$comments."', '" .$date ."', '" .$date ."')
		";
		//echo nl2br($sql); exit;
		$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
		
		
		header("Location: " .$_SERVER["HTTP_REFERER"]);
		?>
