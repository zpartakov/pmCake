<?php

/* create an archive of current task + task time, then delete current task
 * */
$task_id=$_GET['tid'];
//echo $task_id;


/*
 * backup task time
 */
$sql2="INSERT INTO pm_tasks_time_archiv
		(SELECT * FROM pm_tasks_time
		WHERE task=" .$task_id .")";
//echo $sql2;
$sql2=mysql_query($sql2);

if(!$sql2){ 
	echo "mysql error: " .mysql_error(); 
	exit;
}

/*
 * delete task time
*/
$sql2="DELETE FROM pm_tasks_time
		WHERE task=" .$task_id;
//echo $sql2;
$sql2=mysql_query($sql2);

if(!$sql2){
	echo "mysql error: " .mysql_error();
	exit;
}

/*
 * archive task
 */

$sql2="INSERT INTO pm_tasks_archiv
		(SELECT * FROM pm_tasks
		WHERE id=" .$task_id .")";
//echo $sql2;
$sql2=mysql_query($sql2);

if(!$sql2){
	echo "mysql error: " .mysql_error();
	exit;
}

/*
 * delete task
*/
$sql2="DELETE FROM pm_tasks
		WHERE id=" .$task_id;
//echo $sql2;
$sql2=mysql_query($sql2);

if(!$sql2){
	echo "mysql error: " .mysql_error();
	exit;
}

/*
 * redirect to default page (task list for today
 */
header("Location: " .CHEMIN."/pm_tasks/onfield");
?>
