<?php

/* create an archive of current task + task time, then delete current task
 * */
echo $task_id;
exit;
$numberofyears=3;

$migrosdata=date("Y")-$numberofyears;
$migrosdata=$migrosdata ."-01-01";
//echo $migrosdata; exit;

/*
 * do a backup of ellapsed time spended on past tasks
 * */
/*
#do and check sql
$sql="
SELECT * FROM `pm_tasks_time`
WHERE task NOT IN (
SELECT id
FROM pm_tasks
) 
AND date < '" .$migrosdata ."' 
ORDER BY `pm_tasks_time`.`date` DESC
";
echo $sql;
$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}
echo "Il y a " .mysql_num_rows($sql) ." temps de travail notés sans tâche correspondante<br>";
$i=0;
while($i<mysql_num_rows($sql)){
	echo "<br>" .mysql_result($sql,$i,'id') ." task: <a href=\"/intranet/pmcake/pm_tasks/view/" .mysql_result($sql,$i,'task')."\">View task</a>";
	$i++;
	}
exit;
*/
/*
 * do a backup of old done tasks and erase them
 * */
$table='pm_tasks'.date("Ymd");
#echo $table; exit;
$sql="
DROP TABLE IF EXISTS `" .$table ."`;";
#echo $sql; #exit;

$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}
$sql="
 CREATE  TABLE  `" .$table ."` (  `id` mediumint( 8  )  unsigned NOT  NULL  AUTO_INCREMENT ,
 `parent_id` mediumint( 8  )  NOT  NULL  COMMENT  'parent task id, 0 if none',
 `project` mediumint( 8  )  unsigned NOT  NULL DEFAULT  '0',
 `priority` mediumint( 8  )  unsigned NOT  NULL DEFAULT  '0',
 `status` mediumint( 8  )  unsigned NOT  NULL DEFAULT  '0',
 `owner` mediumint( 8  )  unsigned NOT  NULL DEFAULT  '0',
 `assigned_to` mediumint( 8  )  unsigned NOT  NULL DEFAULT  '0',
 `name` varchar( 155  )  DEFAULT NULL ,
 `description` text,
 `start_date` varchar( 10  )  DEFAULT NULL ,
 `due_date` varchar( 10  )  DEFAULT NULL ,
 `estimated_time` varchar( 10  )  DEFAULT NULL ,
 `actual_time` varchar( 10  )  DEFAULT NULL ,
 `comments` text,
 `completion` mediumint( 8  )  unsigned NOT  NULL DEFAULT  '0',
 `created` varchar( 16  )  DEFAULT NULL ,
 `modified` varchar( 16  )  DEFAULT NULL ,
 `assigned` varchar( 16  )  DEFAULT NULL ,
 `published` char( 1  )  NOT  NULL DEFAULT  '',
 `parent_phase` int( 10  )  unsigned NOT  NULL DEFAULT  '0',
 `complete_date` varchar( 10  )  DEFAULT NULL ,
 `service` mediumint( 8  )  unsigned NOT  NULL DEFAULT  '0',
 `milestone` char( 1  )  NOT  NULL DEFAULT  '',
 `mod_date` timestamp NOT  NULL DEFAULT  '0000-00-00 00:00:00' ON  UPDATE  CURRENT_TIMESTAMP ,
 PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = utf8;";

#do and check sql
#echo $sql; #exit;

$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}

#do and check sql
//extract all done tasks Complet
$sql="SELECT * FROM pm_tasks WHERE status=1 AND start_date < '" .$migrosdata ."'";
$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}
echo "<h1>Les " .mysql_num_rows($sql) ." tâches suivantes ont été archivées dans la table <strong>" .$table ."</strong></h1><br/>";
$i=0;
while($i<mysql_num_rows($sql)){
	echo "<br>" .mysql_result($sql,$i,'id');
	echo "&nbsp;" .mysql_result($sql,$i,'name');
	$i++;
	}

$sql="INSERT INTO " .$table ." (SELECT * FROM pm_tasks WHERE status=1 AND start_date < '" .$migrosdata ."-01-01')";
$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}
//exit;
$sql="DELETE FROM pm_tasks WHERE status=1 AND start_date < '" .$migrosdata ."-01-01'";
$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}

?>
