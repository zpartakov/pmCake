<?php 
App::import('Lib', 'functions'); //imports app/libs/functions
#Configure::write('debug', 2);
/* presents tasks on a monthly calendar
 * */
?> 
<SCRIPT LANGUAGE="JavaScript">
<!--
function goto_URL(id,value) {
/*alert(id+","+value);*/
window.location.href = "repousser?identifiant="+id+"&ajout="+value;
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

$this->pageTitle = "Calendrier mensuel: " .$mois_selectionne ." / " .$annee_selectionne; 
/* ################# PRINT ################# */ 

?>
	<div class="pmTasks index">
	<h2><?php echo $this->pageTitle;?></h2>
<!-- ##################################### CALENDAR NAVIGATION #################################### -->

<table style="width: 600px;">
<tr><th>Mois</th><th>Année</th></tr>
<tr>
<th width="20%">
	<!-- ##################################### MONTH #################################### -->
	<table align="center" style="width: 200px;">
	<tr>
		<?php if ($mois_selectionne==1) { ?>
		<td style="background-color: transparent;text-align: right"><form action="<?php echo CHEMIN ."/pm_tasks/calendrier";?>" method="GET"><input type="hidden" name="mois" value="12" /><input type="hidden" name="annee" value="<?php echo $annee_selectionne-1;?>" /><button type="submit" name="bt_month_less" title="-" class="im">&laquo;</button></form></td>
		<?php }else{ ?>
		<td style="background-color: transparent;text-align: right"><form action="<?php echo CHEMIN ."/pm_tasks/calendrier";?>" method="GET"><input type="hidden" name="mois" value="<?php echo ($mois_selectionne=="1") ? $mois_selectionne : $mois_selectionne-1;?>" /><input type="hidden" name="annee" value="<?php echo $annee_selectionne;?>" /><button type="submit" name="bt_month_less" title="-" class="im">&laquo;</button></form></td>
		<?php } ?>
	<td style="background-color: transparent;">
	<form name="form_mois" action="<?php echo CHEMIN ."/pm_tasks/calendrier";?>" method="GET"><input type="hidden" name="annee" value="<?php echo $annee_selectionne;?>" />
	<select name="mois" onchange="form_mois.submit()">
	<?php


	$i=0;
	foreach ($mois_full as $value){
	$i++;
	?>
	<option value="<?php echo $i;?>"<?php echo ($mois_selectionne==$i) ? (" selected=\"selected\""):("");?>><?php echo $value;?></option>
	<?php
	}
	?>
	</select>
	</form>
	</td>
	<?php if ($mois_selectionne==12) {/* permettre d'augmenter d'une année vers année n+1 et mois==1 */ ?>
	<td style="background-color: transparent;text-align: left"><form action="<?php echo CHEMIN ."/pm_tasks/calendrier";?>" method="GET"><input type="hidden" name="mois" value="1" /><input type="hidden" name="annee" value="<?php echo $annee_selectionne+1;?>" /><button type="submit" name="bt_month_plus" title="+" class="im">&raquo;</button></form></td>
	<?php }else{ ?>
	<td style="background-color: transparent;text-align: left"><form action="<?php echo CHEMIN ."/pm_tasks/calendrier";?>" method="GET"><input type="hidden" name="mois" value="<?php echo ($mois_selectionne==12) ? $mois_selectionne : $mois_selectionne+1;?>" /><input type="hidden" name="annee" value="<?php echo $annee_selectionne;?>" /><button type="submit" name="bt_month_plus" title="+" class="im">&raquo;</button></form></td>
	<?php } ?>
	</tr>
	</table>
</th>
	<th width="20%">
	<!-- ##################################### YEAR #################################### -->
	<table align="center" style="width: 200px;">

	<tr>
	<td style="background-color: transparent;text-align: right"><form action="<?php echo CHEMIN ."/pm_tasks/calendrier";?>" method="GET"><input type="hidden" name="mois" value="<?php echo $mois_selectionne;?>" /><input type="hidden" name="annee" value="<?php echo ($annee_selectionne>1920) ? $annee_selectionne-1 : $annee_selectionne;?>" /><button type="submit" name="bt_year_less" title="-" class="im">&laquo;</button></form></td>
	<td style="background-color: transparent;">
	<form name="form_annee" action="<?php echo CHEMIN ."/pm_tasks/calendrier";?>" method="GET">
	<input type="hidden" name="mois" value="<?php echo $mois_selectionne;?>" />
	<select name="annee" onchange="form_annee.submit()">
	<?php
	$annee_depart = 1920;
	$annee_max = date("Y")+2;
	$j=0;
	for($j=$annee_max;$j>=$annee_depart;$j--){
	?>
	<option value="<?php echo $j;?>"<?php echo ($annee_selectionne==$j) ? (" selected=\"selected\""):("");?>><?php echo $j;?></option>
	<?php
	}
	?>
	</select>
	</form>
	</td>
	<td style="background-color: transparent;text-align: left"><form action="<?php echo CHEMIN ."/pm_tasks/calendrier";?>" method="GET"><input type="hidden" name="mois" value="<?php echo $mois_selectionne;?>" /><input type="hidden" name="annee" value="<?php echo ($annee_selectionne<(date("Y")+1)) ? $annee_selectionne+1 : $annee_selectionne;?>" /><button type="submit" name="bt_year_plus" title="+" class="im">&raquo;</button></form></td>
	</tr>
	</table>
</th>
</tr>
</table>
<!-- ##################################### PRINT CALENDAR #################################### -->
<table class="calendar" align="center" border="1">
<tr>
<?php
$nombre_jours_mois = cal_days_in_month(CAL_GREGORIAN,$mois_selectionne,$annee_selectionne);
$premier_jour_mois = jddayofweek(cal_to_jd(CAL_GREGORIAN,$mois_selectionne,1,$annee_selectionne),0);
//echo $premier_jour_mois;
$premier_jour_mois = ($premier_jour_mois==0)? 7 : ($premier_jour_mois);
#
foreach ($semaine_abrege as $value){
?>
<th><?php echo $value; ?></th>
<?php
}
?>
</tr>

<?php
$num_col=0;
$bg=0;
for($k=-$premier_jour_mois+2;$k<=$nombre_jours_mois;$k++){
if ($num_col==0) {
$tdbg=(($bg%2)==0)?"two":"one";?>
<tr>
<?php
}
if ($k<10) {$jour_aff="0".$k;}
else{$jour_aff=$k;}
if (($k>=$premier_jour_mois) AND ($k<=$nombre_jours_mois)) {
echo "<td class=\"selected\"><a name=\"jour".$annee_selectionne.$mois_aff.$jour_aff."\" />";
//add an anchor for each day
	if($mois_aff<10) {
		$mois_aff1="0".$mois_aff;
	}
//echo "<a name=\"" .$annee_selectionne.$mois_aff1.$jour_aff ."\" />";
extrait_donnees($annee_selectionne,$mois_aff,$jour_aff);
echo "</td>";
}
else{
if ($k<$premier_jour_mois AND $k>0) {
echo "<td class=\"selected\">";
extrait_donnees($annee_selectionne,$mois_aff,$jour_aff);
echo "</td>\n";
}
else{
echo "\t\t<td class=\"$tdbg\">&nbsp;";
echo "</td>\n";
}
}
#
if ($num_col==6) {echo "\t</tr>\n\t\t";}
#
$num_col=($num_col+1)%7;
$bg++;
}
?>
</table> 
</div>
<?
echo "mois_selectionne: " .$mois_selectionne ." - mois_aff" .$mois_aff;
?>
