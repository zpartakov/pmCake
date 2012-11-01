
<?
App::import('Lib', 'functions'); //imports app/libs/functions
$organization=normaliser($_GET['data']['organization']);
$owner=$_GET['data']['owner'];
$priority=$_GET['data']['priority'];
$status=$_GET['data']['status'];
$name=normaliser($_GET['data']['name']);
$description=normaliser($_GET['data']['description']);
$url_dev=$_GET['data']['url_dev'];
$url_prod=$_GET['data']['url_prod'];
$published=$_GET['data']['published'];
$upload_max=$_GET['data']['upload_max'];
$phase_set=$_GET['data']['phase_set'];
$type=$_GET['data']['type'];
$created=date("Y-m-d h:i:s");
$modified=$created;


$sql="
INSERT INTO `pm_projects` (`id`, `organization`, `owner`, `priority`, `status`, `name`, `description`, `url_dev`, `url_prod`, `created`, `modified`, `published`, `upload_max`, `phase_set`, `type`) VALUES (
NULL,
 '$organisation', '$owner', '$priority', '$status', '$name', '$description', '$url_dev', '$url_prod', '$created', '$modified', '$published', '$upload_max', '$phase_set', '$type')";

#echo $sql; exit;

#do and check sql
$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}
header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
