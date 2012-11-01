<?php 
App::import('Lib', 'functions'); //imports app/libs/functions
#Configure::write('debug', 2);
/* presents events on a weekly calendar
 * */
 $year=date("Y");
 $semaineORI=$_GET['semaineORI'];
 $semaineORI=$_GET['semaine'];
if($semaineORI) {
if($_GET['bt_week_less'])
	$week=$semaineORI-1;
	echo "semaine less";
}elseif($_GET['bt_week_plus']){
	$week=$semaineORI+1;
	echo "semaine plus";
}else {	
	
 $week=date("W");
 	echo "semaine curr";

}
echo "semaine: " .$week;
/*

*/
//exit;
?> 
<SCRIPT LANGUAGE="JavaScript">
<!--
function goto_URL(id,value) {
/*alert(id+","+value);*/
window.location.href = "repoussercal?identifiant="+id+"&ajout="+value;
}
//-->
</SCRIPT>

<?
/* ################# get vars ################# */ 
$mois_selectionne=$_GET['mois'];
$annee_selectionne=$_GET['annee'];
if(!$mois_selectionne) {
	$mois_selectionne=date("m");
}
if(!$annee_selectionne) {
	$annee_selectionne=date("Y");
}
if(!$semaine_selectionne) {
	$semaine_selectionne=date("W");
}

$mois_aff=$mois_selectionne; 
 $t_calendar_months_full=array(1=>"Janvier","F&eacute;vrier","Mars","Avril","Mai","Juin","Juillet","Ao&ucirc;t","Septembre","Octobre","Novembre","D&eacute;cembre");
 $t_calendar_days_abreviate=array(1=>"Lu","Ma","Me","Je","Ve","Sa","Di");
 $mois_chiffre=array(1=>"01","02","03","04","05","06","07","08","09","10","11","12");
 $mois_chiffre=array("01","02","03","04","05","06","07","08","09","10","11","12");
 $mois_chiffre=$mois_aff;
 $mois_full=$t_calendar_months_full;
$mois_abrege=array(1=>"Jan","F&eacute;v","Mar","Avr","Mai","Jun","Jul","Ao&ucirc;","Sep","Oct","Nov","D&eacute;c");
$semaine_full=array(1=>"Lundi","Mardi","Mercredi","Jeudi","Venredi","Samedi","Dimanche");
 $semaine_abrege=$t_calendar_days_abreviate; 
#semainier();

$this->pageTitle = "Calendrier hebdomadaire: " .$semaine_selectionne ." / " .$mois_selectionne ." / " .$annee_selectionne; 
/* ################# PRINT ################# */ 

?>
	<div class="events index">
	<h2><?php echo $this->pageTitle;?></h2>
	 			<li><?php echo $this->Html->link(__('New Event', true), array('action' => 'add')); ?></li>

<!-- ##################################### CALENDAR NAVIGATION #################################### -->

<table style="width: 600px;">
<tr><th>Semaine</th></tr>
<tr>
	<!-- ##################################### WEEK #################################### -->
<th width="20%">
	<table align="center" style="width: 200px;">

	<tr>
	<td style="background-color: transparent;text-align: right">
	<form action="<?php echo CHEMIN ."/events/week";?>" method="GET">
	<input type="hidden" name="semaine" value="<?php echo $semaine_selectionne;?>" />
	<button type="submit" name="bt_week_less" title="-" class="im">&laquo;</button></form>
	</td>
	<td style="background-color: transparent;">
	<form name="form_annee" action="<?php echo CHEMIN ."/events/week";?>" method="GET">
	<input type="hidden" name="semaine" value="<?php echo $semaine_selectionne;?>" />
	<select name="semaine" onchange="form_semaine.submit()">
	<?php
	$semaine_depart = 1;
	$semaine_max = 52;
	$j=0;
	for($j=$semaine_max;$j>=$semaine_depart;$j--){
	?>
	<option value="<?php echo $j;?>"<?php echo ($semaine_selectionne==$j) ? (" selected=\"selected\""):("");?>><?php echo $j;?></option>
	<?php
	}
	?>
	</select>
	</form>
	</td>
	<td style="background-color: transparent;text-align: left">
	<form action="<?php echo CHEMIN ."/events/week";?>" method="GET">
	<input type="hidden" name="semaine" value="<?php echo $semaine_selectionne;?>" />
	<input type="hidden" name="annee" value="<?php echo ($semaine_selectionne<(date("W")+1)) ? $semaine_selectionne+1 : $semaine_selectionne;?>" />
	<button type="submit" name="bt_week_plus" title="+" class="im">&raquo;</button></form></td>
	</tr>
	</table>
</th>


</tr>
</table>
<?
$firstMonday = getFirstMonday($week, $year);
$firstMondayInfo = getdate($firstMonday);
?>
<!-- ##################################### PRINT CALENDAR #################################### -->
<table class="calendar" align="center" border="1">
<tr>
<?php
$nombre_jours_mois = cal_days_in_month(CAL_GREGORIAN,$mois_selectionne,$annee_selectionne);
$premier_jour_mois = jddayofweek(cal_to_jd(CAL_GREGORIAN,$mois_selectionne,1,$annee_selectionne),0);
$premier_jour_mois = ($premier_jour_mois==0)? 7 : ($premier_jour_mois);
$jour2lasemaine=date("w");
$i=0;
foreach ($semaine_abrege as $value){
		if(intval($i/2)==($i/2)) {
		$color="white";
	} else {
		$color="#F4F7DF";
		}
?>
<th style="vertical-align: top; border: thin solid; background-color: <?php echo $color;?>"><?php echo $value ." - ";
echo date('d/m/Y', $firstMonday);
$sql=date('Y-m-d', $firstMonday);
#echo "<br>$sql";
extraitjour($sql);
$firstMonday=$firstMonday+(24*3600);
 ?>
 </th>
<?php
$i++;
}
?>
</tr>

</table> 
</div>
 			<?php echo $this->Html->link(__('New Event', true), array('action' => 'add')); ?>
