<?php
/**
* @version        $Id: mailjoomla.ctp v1.0 11.05.2010 09:31:14 CEST $
* www.unige.ch
* webmaster@unige.ch
* automatic mail for patch or migration joomla
* to send see line 74 ($to)
*
*/
echo "pliz activate!"; exit;
$version="1.5.2";
$newversion="1.5.24";
$mailtitle="Upgrade de votre site Joomla! ";
$txt=""; $texte=""; $emails="";
$from ="webmaster@unige.ch"; 
$reply2="Frederic.Radeff@unige.ch";



$text00="
Bonjour,

Pour information, j'ai effectué la mise à jour " .$newversion ." de votre site ";

$text01=" 

Meilleures salutations,


Frédéric Radeff
Uni-Dufour bur.340                    Université de Genève - DINF/NTICE
Tél. +41 22 379 75 30                          frederic.radeff@unige.ch
Taux d'activité:                                80% (du lundi au jeudi)
";


$sql="SELECT * FROM cms WHERE type_id=1 AND version LIKE '" .$version ."%'";
//echo $sql; exit; //tests
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); exit;}
$i=0;

while($i<mysql_num_rows($sql)){
	$server=mysql_result($sql,$i,'server');

	$url=mysql_result($sql,$i,'url');
	$url=ereg_replace("/administrator$","",$url);
	$url=ereg_replace("/administrator/$","",$url);	
	$email=mysql_result($sql,$i,'email').",";
	
	$emails.=mysql_result($sql,$i,'email').",";
	
	$txt.= "FOR:" .$email ."\n\n";
	$texte=$text00 .$url .$text01;
	$txt.= $texte;
		$txt.="<hr>";
		
			//sendingmail
	$bcc="Frederic.Radeff@unige.ch";
	$to="Frederic.Radeff@unige.ch"; //tests

	//$to=$email; //prod CHANGE HERE


	$obj=$mailtitle ." " .$url;
	$headers ='From: ' .$from ."\n";
	$headers .='Reply-To: ' .$reply2 ."\n";
	$headers.='Bcc: ' .$bcc ."\n";
	$headers .='Content-Type: text/plain; charset="utf-8"'.'\n';
 
		$couriel=mail($to, $obj , $texte, $headers);
 
		if($couriel) {
		echo "The mail has been sent from $from to $to<br>";
		#echo "Merci de votre message nous t&acirc;cherons de vous r&eacute;pondre le plus t&ocirc;t possible";
		} else {
		echo "Il y a eu un probl&egrave;me lors de l'envoi du mail, merci de contacter <a href=\"mailto:" .$to ."?subject=" .$obj ."\">" .$to ."</a>";
		}

		
	
	$i++;
	}

echo "<h2>Tests</h2>";

echo nl2br(ereg_replace("//","/", $txt));


echo "<hr>" .$emails;

?>    
