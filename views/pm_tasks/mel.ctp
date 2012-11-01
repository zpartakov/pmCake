<?
App::import('Lib', 'functions'); //imports app/libs/functions
/* a utility to send mail */
function envoie_mel($id) {
	
	$Message="";
	#do and check sql
	$sql="SELECT * FROM pm_tasks AS tas, pm_projects as proj WHERE 
	tas.project=proj.id AND  
	tas.id=".$id;
	#echo $sql; exit;

	$sql=mysql_query($sql);
	if(!$sql) {
		echo "SQL error: " .mysql_error(); exit;
	}
	
	$Sujet=mysql_result($sql,0,'proj.name');
	
	$i=0;
	while($i<mysql_num_rows($sql)){
		$Message.= mysql_result($sql,$i,'name') ."\n";
		$i++;
	}
	
	
$Destinataire = MYMAIL;
 
$From  = "From: frederic.radeff@unige.ch\n";
$From .= "MIME-version: 1.0\n";
$From .= "Content-type: text/html; charset= UTF-8\n";
 
 
$envoie=mail($Destinataire,$Sujet,$Message,$From);
if(!$envoie) { echo "Problem sending email!"; }
	echo '<meta http-equiv="refresh" content="0;URL='.$_SERVER["HTTP_REFERER"].'">';	
	}
	
	#echo phpinfo(); exit;
envoie_mel($_GET['id']);	
	?>
