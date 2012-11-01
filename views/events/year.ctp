<?php
$jahr=$_GET['annee'];

if(!$jahr) {
	$jahr=date("Y");
}

$monat=date('n');
$heute=date('d');
//$monate=array('January','February','March','April','May','June','July','August','September','October','November','December');
$monate=array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
	?>
	<form name="form_annee" action="<?php echo CHEMIN ."events/year";?>" method="GET">
	<select name="annee" onchange="form_annee.submit()">
	<?php  
	$annee_depart = 2010;
	$annee_max = date("Y")+4;
	$j=0;
	for($j=$annee_max;$j>=$annee_depart;$j--){
	?>
	<option value="<?php echo $j;?>"<?php echo ($jahr==$j) ? (" selected=\"selected\""):("");?>><?php echo $j;?></option>
	<?php
	}
	?>
	</select>
	</form>
<?php 

echo '<table border=0 width=700>';
echo '<th colspan=4 align=center style="font-family:Verdana; font-size:18pt; color:#ff9900;">'.$jahr.'</th>';
for($reihe=1;$reihe<=3;$reihe++)
{
echo '<tr>';
for ($spalte=1;$spalte<=4;$spalte++)
{
$this_month=($reihe-1)*4+$spalte;
$erster=date('w',mktime(0,0,0,$this_month,1,$jahr));
$insgesamt=date('t',mktime(0,0,0,$this_month,1,$jahr));
if($erster==0){$erster=7;}
echo '<td width="25%" valign=top>';
echo '<table border=0 align=center style="font-size:8pt; font-family:Verdana">';
echo '<th colspan=7 align=center style="font-size:12pt; font-family:Arial; color:#666699;">'.$monate[$this_month-1].'</th>';
echo '<tr><td style="color:#666666"><b>Lun</b></td><td style="color:#666666"><b>Mar</b></td>';
echo '<td style="color:#666666"><b>Mer</b></td><td style="color:#666666"><b>Jeu</b></td>';
echo '<td style="color:#666666"><b>Ven</b></td><td style="color:#0000cc"><b>Sam</b></td>';
echo '<td style="color:#cc0000"><b>Dim</b></td></tr>';
echo '<tr><br>';
$i=1;
while($i<$erster){echo '<td> </td>'; $i++;}
$i=1;
while($i<=$insgesamt)
{
$rest=($i+$erster-1)%7;
if($i==$heute && $this_month==$monat){echo '<td style="font-size:8pt; font-family:Verdana; background:#ff0000;" align=center>';}
else{echo '<td style="font-size:8pt; font-family:Verdana" align=center>';}
if ($i==$heute && $this_month==$monat){echo '<span style="color:#ffffff;">'.$i.'</span>';}
else if($rest==6){echo '<span style="color:#0000cc">'.$i.'</span>';}
else if($rest==0){echo '<span style="color:#cc0000">'.$i.'</span>';}
else{echo $i;}

echo "<br/>".$i."-".$this_month ."-" .$jahr;

echo "</td>\n";
if($rest==0){echo "</tr>\n<tr>\n";}
$i++;
}
echo '</tr>';
echo '</table>';
echo '</td>';
}
echo '</tr>';
}
echo '</table>';
?> 
