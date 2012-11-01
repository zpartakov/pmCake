<?
$ancienneversion="1.5.23"; //to change
$version=$_GET['version'];

#determine version courante
$versionc="SELECT version FROM types WHERE lib LIKE 'joomla'";

$sqlqv=mysql_query($versionc);
if(!$sqlqv) {
	echo "sql error: " .$sqlqv ."<br>" .mysql_error(); exit;
}
$newversion=mysql_result($sqlqv,0,'version');

#$newversion="1.5.18";
?>
<form>
version : <input name="version" value="<? echo $ancienneversion;?>">
<input type="submit">
</form>
<?
if(isset($version)) {
	?>
<pre>
cd ~/soft/joomla/patches/1.5/last
chmod 777 administrator/backups/
chmod 777 administrator/cache/
chmod 777 administrator/components/
chmod 777 administrator/language/
chmod 777 administrator/language/en-GB/
chmod 777 administrator/language/fr-FR/
chmod 777 administrator/modules/
chmod 777 administrator/templates/
chmod 777 components/
chmod 777 images/
chmod 777 images/banners/
chmod 777 images/stories/
chmod 777 language/
chmod 777 language/en-GB/
chmod 777 language/fr-FR/
chmod 777 language/pdf_fonts/
chmod 777 media/
chmod 777 modules/
chmod 777 plugins/
chmod 777 plugins/content/
chmod 777 plugins/editors/
chmod 777 plugins/editors-xtd/
chmod 777 plugins/search/
chmod 777 plugins/system/
chmod 777 plugins/user/
chmod 777 plugins/xmlrpc/
chmod 777 tmp/
chmod 777 templates/
chmod 777 cache/
chmod 777 logs/
</pre>
<?php
/**
* @version        $Id: patchjoomla.ctp v1.0 27.04.2010 10:05:03 CEST $
* www.unige.ch
* webmaster@unige.ch
//automatically patch joomla 1.5
*/
$sql="SELECT * FROM cms WHERE type_id=1 AND version='" .$version ."'";
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); exit;}
$i=0;
$txt=""; $emails="";
while($i<mysql_num_rows($sql)){
	$path=mysql_result($sql,$i,'path');
	$path=ereg_replace("/administrator$","",$path);
	$path=ereg_replace("/administrator/$","",$path);
	$server=mysql_result($sql,$i,'server');
	$txt.= "#" .$path ."<br>";
	$txt.=  "rsync -az /home/radeff/soft/joomla/patches/1.5/last/* su@" .$server .":".$path ."<br>";
	$emails.=mysql_result($sql,$i,'email').",";
	$i++;
	}

echo ereg_replace("//","/", $txt);
}

echo "<hr>" .$emails;

echo "<hr><a href=?maj=yes&version=" .$version ."&newversion=" .$newversion .">mettre &agrave; jour les versions " .$version ." pour la " .$newversion ."</a> ?";

if($_GET['maj']=="yes") {
	if(!isset($version)) {
		echo "<br>Sorry, no version choosed!"; exit;
	}else {
$sql="UPDATE cms SET version = '" .$newversion ."' WHERE type_id=1 AND version='" .$version ."'";
echo $sql;
$sql=mysql_query($sql);
		if(!$sql) { echo "SQL error: " .mysql_error(); }
}
}
		/*
		
		
	}
}/*	 

* */
?>    
<br><a href="mailjoomla">@ (CHECK BEFORE!!!)</a>
