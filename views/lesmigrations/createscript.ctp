<?php
/**
* @version        $Id: createscript.ctp v1.0 18.11.2010 15:51:15 CET $
* www.unige.ch
* webmaster@unige.ch
a script to create bash scripts for a migration between 2 servers, made from a third server with ssh keys on both server
*/
#echo "id: " .$id;
#echo phpinfo();
$id=$_REQUEST["url"];
$id=preg_replace("/^.*\//","",$id);
$sql="SELECT * FROM lesmigrations WHERE id=" .$id;
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); }

$i=0;

$site=mysql_result($sql,$i,'urlsource');
$db=mysql_result($sql,$i,'mysql');
$db=explode("|",$db);
$db=$db[0];
$db=explode(" ",$db);

$pathsrc=preg_replace("/http:\/\/cms.unige.ch\//","/w3/",$site);
$racine=explode("/",$pathsrc);
$racinec=count($racine);
$zesite=basename($site);
$prodserver="lipari.unige.ch";
$targetserver="lipari2.unige.ch";
$lescript="migration.sh";
$lescriptf="migrationfinale.sh";

##### BEGIN PRINT #######

	echo "<pre><br>#migration " .mysql_result($sql,$i,'id') ." - " .$site;
#$racine=count($racine);
	echo "#a script for the migration of websites
clear
#echo " .$pathsrc;
#echo "<br>#parent: ";
$parent="";
for($i=1; $i < ($racinec-1); $i++){
	$parent.= "/" .$racine[$i] ."";
}




#echo $parent;
echo "#######
echo \"Copie site ".$site ." de " .$prodserver ." sur " .$targetserver ."\"";
echo "
echo \"commencé à\" &&date
echo \"******************************************************\"

#backup prod
echo \"Backup base MySQL serveur prod " .$prodserver ."\"
ssh radeff@" .$prodserver ." " .$pathsrc ."/" .$lescript
;
echo "

#make tarballs
echo \"Make tarballs on " .$prodserver ."\" 
ssh su@" .$prodserver ." tar -cf " .$parent ."/" .$zesite .".tar " .$pathsrc;

echo "
#copie locale
echo \"copie locale\"
scp su@".$prodserver.":".$parent ."/" .$zesite .".tar ./
";

echo "
#copie serveur cible
echo \"copie serveur cible\"
scp ./".$zesite.".tar su@".$targetserver.":".$parent;

echo "

#unzip serveur cible
echo \"unzip serveur cible\"
ssh su@".$targetserver." tar xf " .$parent ."/" .$zesite.".tar " .$targetpath;

echo "

#upgrade db
echo \"#upgrade db\"
ssh radeff@".$targetserver ." " .$targetpath."/".$lescriptf ."
echo \"******************************************************\"
";

echo "
echo \"Copie finie à\" &&date
exit";

/*



echo $db[0] ." - " .$db[1]; exit;
$racinec=count($racine);
for($i=1; $i < ($racinec-1); $i++){
	$parent.= "/" .$racine[$i] ."";
}



####### migration.sh #######
#to put on src server
#!/usr/bin/bash
#a script for the migration of websites
#db
db=cake_molbio
####
rm /w3/sciences/biologie/bimol/$db.sql
/usr/local/unige_pack/libs/bin/mysqldump --add-drop-table $db > /w3/sciences/biologie/bimol/$db.sql

db=handmade_bimolblog
####
rm /w3/sciences/biologie/bimol/$db.sql
/usr/local/unige_pack/libs/bin/mysqldump --add-drop-table $db > /w3/sciences/biologie/bimol/$db.sql


####### migrationfinale.sh #######
#to put on target server
#!/usr/bin/bash
#a script for the migration of websites
/usr/local/unige_pack/libs/bin/mysql cake_molbio < /w3/sciences/biologie/bimol/cake_molbio.sql
/usr/local/unige_pack/libs/bin/mysql handmade_bimolblog < /w3/sciences/biologie/bimol/handmade_bimolblog.sql

*
* */
?>
</pre>
