<?php
header('Content-type: text/x-csv');
header('Content-Disposition: attachment; filename="cms.csv"');
/**
* @version        $Id: export.ctp v1.0 15.11.2010 18:02:55 CET $
* www.unige.ch
* webmaster@unige.ch

script to export all cms datas in a dokuwiki text style
*/

$sql="SELECT * FROM cms,types WHERE cms.type_id = types.id ORDER BY type_id";
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); }

$i=0;
$export=""; $separator=";";
while($i<mysql_num_rows($sql)){
	$export .=  $separator .mysql_result($sql,$i,'url') ; //titre H1
	$export .=  $separator .mysql_result($sql,$i,'types.lib');
	$export .=  $separator .mysql_result($sql,$i,'email'); //lien sur email
	$export.=$separator;
	$export.="\n";
	$i++;
	}
echo $export;

?>    
