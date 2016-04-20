<form method="get">
<input type="text" name="version">
<input type="submit" value="old version">
</form>
<?php 
/* patchlime
//automatically upgrade limesurvey
*/

//nouvelle version
$sql="SELECT * FROM types WHERE id=3";
$sql=mysql_query($sql);
$newversion=mysql_result($sql,0,'version');
echo "<br>new version: " .$newversion."<br>";

//ANCIENNE version
if(!$_GET['version']){

$sql="SELECT version FROM cms WHERE type_id=3 ORDER BY version DESC";
echo $sql; //tests
$sql=mysql_query($sql);
$version=mysql_result($sql,0,'version');
//$version=141110; //special
$sql="SELECT * FROM cms WHERE type_id=3 AND version LIKE '" .$version ."' ORDER BY url";

}else{
	$version=$_GET['version'];
	$sql="SELECT * FROM cms WHERE type_id=3 AND version LIKE '" .$version ."' ORDER BY url";
	
}
echo "<br>old version: " .trim($version)."<br>";



echo $sql;
//exit;
$sql=mysql_query($sql);

while($i<mysql_num_rows($sql)){
	$maj="UPDATE cms SET version='".$newversion."' WHERE id=".mysql_result($sql,$i,'id');
	echo "<li>#" .($i+1) ." ".$maj."</li>";
		$maj=mysql_query($maj);
	$i++;
	}
?>