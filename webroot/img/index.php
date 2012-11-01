<?
#written radeff, 02.2002, you can use that code freely 
#erase next line if you dont want ordered bullets
#CALL THAT FILE index.php OR welcome.php OR WHATEVER php file
# YOUR WEB SERVER UNDERSTAND AS A REPERTORY
#set the number of columns you like
$nbcol=4;
$letexte= "<table border=1><tr>";
#path (MODIFY)
$path="./";
$fd=dir($path);
#create array
while($v = $fd->read()) {
$arr[]=$v;
}
$fd->close();
#sort array, reverse sort would be function arsort()
sort($arr);
#make a loop with filename
$t=0;
foreach ($arr as $elem)  {
#count item/columns

$fichier="$elem";
# exclusion of the "." and ".."(and you could exclude much more if needed, eg. ".gif")
if ($fichier!=".." && $fichier!="." && !eregi("~$",$fichier) && !eregi("jpg$",$fichier) && !eregi("bak$",$fichier) && !eregi("zip$",$fichier) && !eregi(".phps",$fichier)) {
$text=$fichier;
#another way to to exclude eg extensions html or doc or file(s), eg index.php you can do it here also*
$text=eregi_replace("index.php.*","",$text);
$text=eregi_replace("^\(.*\)/$","<font color=red>\1</font>",$text);
$text=eregi_replace(".doc$","",$text);
$text=eregi_replace(".*#.*","",$text);
$text=eregi_replace(".phps","",$text);
#execute only if $text is not empty
if ($text!="") {
#if directory add / and a special CSS class
if(is_dir($fichier)) {
$text.="/";
 $repertoire=1;
$laclasse="titrenoir";
} else {
$laclasse="";
 $repertoire=0;
}
#uncomment if you like ordered bullets with # items

$t++;
$test=($t/$nbcol)-intval($t/$nbcol);
#if($test=="0"&&$t>$nbcol) {
if($test=="0") {
#break
$ligF="</tr>\n<tr>";
} else {
$ligD="";
$ligF="";
}

$letexte.=  "<td><a href='$fichier' class='$laclasse' style='background-color: #ffffcc'>$text</a>";
 if( $repertoire!=1 && file_exists($fichier ."s")) {
$letexte.= " [<a href='" .$fichier ."s' class='$laclasse' style='font-size: 8px'>source</a>]";

}
$letexte.="<br /><img src='$fichier'>";	 

$letexte.= "\n</td>$ligF";
}


}
}

$letexte.=  "</table>";
echo $letexte;
?>
