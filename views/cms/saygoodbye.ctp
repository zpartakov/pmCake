<style>
td { border: thin solid;
padding: 10px;
text-align: right;
}
th {
background-color: lightgrey;
}
</style>
<h1>État des cms non-concrete5 NTICE, date: <?php echo date("d-m-Y");?></h1>
<table>
<tr>
	<th>cms</th>
	<th>server</th>
	<th>url</th>
	<th>email</th>
	<th>version</th>
	<th>status</th>
</tr>
<?php 

$status_undef=0;
$acr=0;
$status_c5=0;
$status_fai=0;
$status_stay=0;
$dangerversion=0;
$total=0;
foreach ($results as $cm):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	$total=$total+1;
?>
<tr<?php echo $class;?>>
	<td>
        <?php 
        $sql="SELECT lib,version FROM types WHERE id=".$cm['cms']['type_id'];
		$sqlq=mysql_query($sql);        
		echo mysql_result($sqlq,0,'lib');
		$version=mysql_result($sqlq,0,'version');
        ?>
	</td>
	<td>
		<?php echo preg_replace("/\.unige\.ch/","", $cm['cms']['server']); ?>
	</td>
		<td>
		<?php  
		echo "<a href=\"" .$cm['cms']['url'] ."\" target=\"_blank\" title=\"go2 website\">" .$cm['cms']['url'] ."</a>";
		
		?>
	</td>
		
	<td>
		<?php 
		echo "<a href=\"mailto:" .$cm['cms']['email'] ."\">" .$cm['cms']['email'] ."</a>"; 		
		?>
	</td>
	<td style="text-align: right">
		<?php 
		if($cm['cms']['version']==$version){
		$begin="<span style=\"background-color: lightgreen\">";
		$begintext="";			
		} else {
			$begin="<span style=\"background-color: orange\">";
			$dangerversion=$dangerversion+1;
				
		}
		echo $begin;
		echo $cm['cms']['version'];
		echo "</span>";
		
		?>
	</td>
	<td>
	<?php 
	//status
	if($cm['cms']['email']=="admin@sur-mesure.ch") { //sites ACR
		$status_fai=$status_fai+1;
		$acr=$acr+1;
		echo "<span style=\"background-color: lightblue\">change fai</span>";
	} elseif (preg_match("/migc5:fai/", $cm['cms']['rem'])) { //migc5: 1
		$status_fai=$status_fai+1;
		echo "<span style=\"background-color: lightblue\">change fai</span>";
	} elseif (preg_match("/migc5:oui/", $cm['cms']['rem'])) { //migc5: 1
		$status_c5=$status_c5+1;
		echo "<span style=\"background-color: lightgreen\">->c5</span>";
	} elseif (preg_match("/migc5:keep/", $cm['cms']['rem'])) { //migc5: 1
		echo "<h1>yoman</h1>";
		$status_stay=$status_stay+1;
		echo "<span style=\"background-color: lightgreen\">stay</span>";
	} else {
		$status_undef=$status_undef+1;
		echo "<span style=\"background-color: lightgrey\">undefined</span>";
	}
	?>
	</td>
</tr>
<?php endforeach; 
?>
</table>
<h1>Résumé</h1>
<p><strong>Versions pas à jour compromettant la sécurité du serveur: <?php echo $dangerversion;?></strong></p>
<p>CMS ACR qui migreront sur un FAI externe <?php echo $acr;?></p>
<table>
<tr>
	<th>Statut</th>
	<th>Nombre</th>
</tr>
<tr>
	<td>
		Migration concrete5 en cours
	</td>
	<td>
		<?php echo $status_c5;?>
	</td>
</tr>
<!-- 
<tr>
	<td>
		À garder (protégé)
	</td>
	<td>
		<?php echo $status_stay;?>
	</td>
</tr>
-->
<tr>
	<td>
		Nouvel hébergeur
	</td>
	<td>
		<?php echo $status_fai;?>
	</td>
</tr>
<tr>
	<td>
		Indéfini
	</td>
	<td>
		<?php echo $status_undef;?>
	</td>
</tr>
<tr>
	<td>
		<strong>Total</strong>
		<em style="font-size: smaller">(check: <?php echo $total;?>)</em>
	</td>
	<td>
		<?php echo $status_undef+$status_c5+$status_fai+$status_stay;?>
	</td>
</tr>

</table>
<?php 
/*
 * $status_undef=0;
$status_c5=0;
$status_fai=0;
$status_stay=0;
 */

?>