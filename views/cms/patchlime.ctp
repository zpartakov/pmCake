<h1>Mises à jour du journal des applications LimeSurvey LTS unige.ch</h1>
<?php 
/* patchlime
//automatically upgrade limesurvey
*/

//ancienne version
if(!$_GET['oldversion']){
$version="2.06lts";
$sql="SELECT * FROM cms WHERE type_id=3 AND version LIKE '".$version ."%' LIMIT 0,1";
$sql=mysql_query($sql);
$oldversion=mysql_result($sql,0,'version');
echo "<br>old versionb: " .$oldversion."<br>";


//nouvelle version
$sql="SELECT * FROM types WHERE id=3";
$sql=mysql_query($sql);
$newversion=mysql_result($sql,0,'version');
echo "<br>new version: " .$newversion."<br>";

if ($oldversion==$newversion){
	echo "<p>les versions sont les mêmes! soit il n'y a rien à changer, soit il faut <a target=\"_blank\" href=\"/intranet/pmcake/types/edit/3\">mettre à jour le type avec la nouvelle version</a>";
	exit;	
}
?>
<form method="get">
<input type="hidden" name="oldversion" value="<?php echo $oldversion?>">
<input type="hidden" name="newversion" value="<?php echo $newversion?>">
<input type="submit" value="upgrade">
</form>
<?php
//ANCIENNE version
}else {
	$maj="UPDATE cms SET version='".$_GET['newversion']."' WHERE (version LIKE '" .$_GET['oldversion'] ."' AND type_id=3)";
	echo "<p>$maj</p>";
	$maj=mysql_query($maj);
}
?>