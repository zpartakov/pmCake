<?php 
/*
 * a script to upgrade a software instance 
 */
$cms_id=$_GET['cms_id'];
//echo $cms_id;
$type_id=$_GET['type_id'];
//echo $type_id;

$sql="SELECT * FROM types WHERE id=".$type_id;
$sqlq=mysql_query($sql);
if(!$sqlq) {
	echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
}
$sqlq=mysql_query($sql);
//echo "<br>" .mysql_result($sqlq,$i,'version');

$sql="UPDATE cms SET version='".mysql_result($sqlq,$i,'version') ."' WHERE id=".$cms_id;
//echo "<br>" .$sql;

$sql=mysql_query($sql);
if(!$sql){
	echo "error SQL: " .mysql_error();
} else {
	header("Location: /intranet/pmcake/cms/search?letype=".$type_id."#".$cms_id);
}

/*
 * 3
 *  header("Location: http://www.google.com/");
 *   ...meta http-equiv="refresh" content="1;URL=erreur500.php"...
 */
?>