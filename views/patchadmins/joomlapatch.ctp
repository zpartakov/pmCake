<?php
#tool to automatically upgrade perso joomla
#new syntax
##################
#path depart
$pathdepart="/home/radeff/soft/joomla/patches/1.5/perso";
$lastpatch="/home/radeff/soft/joomla/patches/1.5/last";
$sql="SELECT *
FROM `patchadmins`
WHERE `type` LIKE 'joomla'";
$sql=mysql_query($sql);
$sqlN=mysql_num_rows($sql);
$i=0;
$separateur="<br>";
while($i<$sqlN){
	$leserveur=mysql_result($sql,$i,'server');
	$racine=mysql_result($sql,$i,'racine');
	$racine=ereg_replace("^/","",$racine);
	$racine=ereg_replace("/$","",$racine);
	echo "###" .$leserveur ."###";
		echo $separateur;

echo "leserveur=".$leserveur;
		echo $separateur;
echo "cp " .$pathdepart ."/.netrc." .$leserveur ." ~/.netrc";
			echo $separateur;
	
		#echo "cp " .$pathdepart ."/.netrc." .$leserveur ." ~/.netrc";
		echo "lftp -e \"open " .$leserveur ."; mirror -R " .$lastpatch ." " .$racine ."; exit\"";
		echo $separateur;
echo "lftp -e \"open " .$leserveur ."; cd " .$racine .";";
		echo $separateur;
echo nl2br("chmod 777 administrator/backups/;
chmod 777 administrator/cache/;
chmod 777 administrator/components/;
chmod 777 administrator/language/;
chmod 777 administrator/language/en-GB/;
chmod 777 administrator/language/fr-FR/;
chmod 777 administrator/modules/;
chmod 777 administrator/templates/;
chmod 777 components/;
chmod 777 images/;
chmod 777 images/banners/;
chmod 777 images/stories/;
chmod 777 language/;
chmod 777 language/en-GB/;
chmod 777 language/fr-FR/;
chmod 777 language/pdf_fonts/;
chmod 777 logs/;
chmod 777 media/;
chmod 777 modules/;
chmod 777 plugins/;
chmod 777 plugins/content/;
chmod 777 plugins/editors/;
chmod 777 plugins/editors-xtd/;
chmod 777 plugins/search/;
chmod 777 plugins/system/;
chmod 777 plugins/user/;
chmod 777 plugins/xmlrpc/;
chmod 777 tmp/;
chmod 777 templates/;
chmod 777 cache/;
exit\"");
	echo $separateur;

	echo "##############";
	echo $separateur;
	echo $separateur;

/*
 * "id";"server";"type";"db";"sqlserver";"contenu";"url";"login";"mdp";"loginmysql";"passwdmysql";"urladmin";"loginadmin";"passwdadmin";"version";"todos";"rem";"miseajour";"scriptpatch";"typetrans";"priv";"meladmin"
"1";"radeff.red";"0";"akademia";;;"http://radeff.red";"sys_akademia";"avdrdsfy";;;;;;;;;"2009-12-02 07:19:00";"1";"ftp";"1";"fradeff@gmail.com"


lftp -e "open $leserveur; cd $racine;
##################
* */


$i++;
}
?>
