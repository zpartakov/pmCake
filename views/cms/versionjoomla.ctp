<?php
/**
* @version        $Id: versionjoomla.ctp v1.0 18.08.2010 09:58:20 CEST $
* www.unige.ch
* webmaster@unige.ch

*/
#determine version courante
$versionc="SELECT version FROM types WHERE lib LIKE 'joomla'";

$sqlqv=mysql_query($versionc);
if(!$sqlqv) {
	echo "sql error: " .$sqlqv ."<br>" .mysql_error(); exit;
}
$newversion=mysql_result($sqlqv,0,'version');



$sql="SELECT * FROM cms WHERE type_id=1 LIMIT 0,7"; //select all joomlas
$sql="SELECT * FROM cms WHERE type_id=1 LIMIT 13,3"; //select all joomlas
$sql="SELECT * FROM cms WHERE type_id=1 AND server LIKE 'cms.unige.ch' ORDER BY version,path"; //select all joomlas
#$sql="SELECT * FROM cms WHERE type_id=1 ORDER BY version,path  LIMIT 0,3"; //select all joomlas
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); exit;}
$i=0;
$txt=""; 
echo "Total #: " .mysql_num_rows($sql)."<br>";
#exit;
while($i<mysql_num_rows($sql)){
	$release=0;//intialisation
	$path=mysql_result($sql,$i,'path');
	$version=mysql_result($sql,$i,'version');
		$server=mysql_result($sql,$i,'server');
	$path=ereg_replace("/administrator$","",$path);
	$path=ereg_replace("/administrator/$","",$path);
	$path=ereg_replace("/$","",$path);
	$server=mysql_result($sql,$i,'server');
	$txt.= "joomla site #" .$path ."<br>";
	$txt.= "server #" .$server ."<br>";

	if($version!=$newversion) {
		$txt.=" <span style=\"background-color: #FF6D6D\">";
	}
	$txt.= "db version #" .$version;
		if($version!=$newversion) {
		$txt.="</span>";
	}

		$YourFile=$path."/CHANGELOG.php";
		$handle = fopen($YourFile, 'r');

		if(!$handle){
			$txt.="<br><h1>Problem opening file " .$YourFile ."</h1>";
		}

			while (!feof($handle))
			{
			$Data = fgets($handle, 256);
				if(preg_match("/-----.*Release.*---/",$Data)){
				if($release==0){
					$Data=preg_replace("/--.* 1.5/","1.5",$Data);
					$Data=trim(preg_replace("/ Stable Release.*/","",$Data));
					
					$txt.= "<br>Current server version = " .$Data."<br>";
						if($Data!=$version) {
												$txt.= "<span style=\"background-color: #FF6D6D; font-size: x-large\">CORRIGER VERSION!</span><br>";

						}
					$release=1;
				}
				}

			}
			fclose($handle);
	



	$txt.= "<br><hr>";
	$i++;
	}


echo $txt;

?>    
