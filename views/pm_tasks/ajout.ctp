<?
App::import('Lib', 'functions'); //imports app/libs/functions
if(strlen($_GET['data']['PmTask']['project'])<1) {
	echo "Bug on insertion - project required!"; exit;
}
/*http://129.194.18.217/pmcake/pm_tasks/ajout?
 * data[PmTask][project]=41
 * &data[PmTask][priority]=Vide
 * &data[PmTask][status]=3
 * &data[owner]=3&data[assigned_to]=3
 * &data[name]=%09installer+serveur+email&data[description]=&data[start_date]=2011-02-27&data[due_date]=2011-02-27&data[estimated_time]=&data[actual_time]=&data[comments]=&data[completion]=0&data[assigned]=3&data[published]=1&data[parent_phase]=0&data[complete_date]=&data[service]=0&data[milestone]=0&data[PmTasksTime]=0
 * */
$sql="			
INSERT INTO `pm_tasks` (
`id` ,
`project` ,
`priority` ,
`status` ,
`owner` ,
`assigned_to` ,
`name` ,
`description` ,
`start_date` ,
`due_date` ,
`estimated_time` ,
`actual_time` ,
`comments` ,
`completion` ,
`created` ,
`modified` ,
`assigned` ,
`published` ,
`parent_phase` ,
`complete_date` ,
`service` ,
`milestone`
)
VALUES (
NULL,
'" .$_GET['data']['PmTask']['project'] . "', '"
#.$_GET['data']['priority']  . "', '"
#.$_GET['priority']  . "', '"
.$_GET['data']['PmTask']['priority']  . "', '"
.$_GET['data']['PmTask']['status']  . "', '"
.$_GET['data']['owner'] . "', '"

.$_GET['data']['assigned_to'] . "', '"
.normaliser($_GET['data']['name']) . "', '"
.normaliser($_GET['data']['description']) . "', '"
.$_GET['data']['start_date'] . "', '"
.$_GET['data']['due_date'] . "', '"
.$_GET['data']['estimated_time'] . "', '"
.$_GET['data']['actual_time'] . "', '"
.normaliser($_GET['data']['comments']) . "', '"
.$_GET['data']['completion'] . "', '"
.date("Y-m-d h:i:s") . "', '"
.date("Y-m-d h:i:s") . "', '"
.date("Y-m-d h:i:s") . "', '1" //publsihed
. "', '0" //parent
 . "', '"
.$_GET['data']['complete_date'] . "', '"
.$_GET['data']['service'] . "', '"
.$_GET['data']['milestone'] . "'"
.")";

/*echo "<pre>" .nl2br($sql) ."</pre>"; 
exit;*/

#do and check sql
$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}
#header("Location: ".$_SERVER["HTTP_REFERER"]);
#echo "var: " .mysql_insert_id();
#				$var = $this->PmTask->lastInsertId();
#				$this->redirect(array('action' => 'view/'.mysql_insert_id()));
				header("Location: " .CHEMIN."pm_tasks/edit/" .mysql_insert_id());

?>
