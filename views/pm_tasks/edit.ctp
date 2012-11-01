

<?php


/* include a calendar */
	$datenow = date("Y-m-d");
	echo $html->script('tigra_calendar/calendar_db');
	echo $html->css('calendar');
/* voir comment marche echo "\t\t\techo \$alaxosForm->create('{$modelClass}', array('id' => 'chooseActionForm', 'url' => array('controller' => '{$pluralVar}', 'action' => 'actionAll')));\n";
dans /pm/plugins/alaxos/vendors/shells/templates/alaxos/views/index.ctp
* 
* copier les headers de NicO
 * 
 * */
App::import('Lib', 'functions'); //imports app/libs/functions
$this->pageTitle = '' .$this->data['PmTask']['name'] ." | " .$this->data['PmProject']['name']; 
$pid=$this->data['PmProject']['id'];
?>
			Date de la dernière modification: 
					<?php 
			dateSQLlong2fr( $this->data['PmTask']['mod_date']); 
		?>
<div class="pmTasks form" style="margin-top: 10px;">

	<?php echo $this->AlaxosForm->create('PmTask', array("name"=>"etDForm"));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	
 	<h2><?php echo $this->pageTitle; ?>&nbsp;<input type="submit" value="modifier" style="font-size: small"></h2>
 	<?php echo "<a href=\"#Remarques\">Remarques</a> | <a href=\"#Fichiers\">Fichiers</a>"; ?>
 	
	 <div class="imprimepas" style="background-color:#FFFFB5 ;margin-top: 5px; width: 80%">
	 <?
#	 echo $this->data['PmTask']['id'] ."-" .$this->data['PmTask']['status']; exit;
	 statut_radio($this->data['PmTask']['id'],$this->data['PmTask']['status']);
	 ?>
	 </div>
<div class="zactions" style="position: relative; top: -46px">
	<?
	$idaction=$this->data['PmTask']['id'];
	e($html->link($html->image('toolbar/loupe.png', array('alt' => 'Voir', 'title' => 'Voir')), array('action'=>'view/'.$idaction), array('escape' => false)));
	e($html->link($html->image('toolbar/edit-copy.png', array('alt' => 'Copier', 'title' => 'Copier')), array('action'=>'copier',$idaction), array('escape' => false)));
	e($html->link($html->image('toolbar/add.png', array('alt' => 'Ajouter', 'title' => 'Ajouter')), array('action'=>'add'), array('escape' => false)));
	e($html->link($html->image('toolbar/editor.png', array('alt' => 'Modifier')), array('action'=>'edit', $idaction), array('alt' => 'Modifier', 'title' => 'Modifier', 'escape' => false)));
	$delete_text = isset($delete_text) ? $delete_text : ___d('alaxos', 'do you really want to delete this item ?', true);
	e($html->link($html->image('toolbar/drop.png', array('alt' => __d('alaxos', 'delete', true))), array('action' => 'delete', $idaction), array('alt' => ___d('alaxos', 'delete', true), 'title' => ___d('alaxos', 'delete', true), 'escape' => false), $delete_text));
	e($html->link($html->image('toolbar/list.png', array('alt' => __d('alaxos', 'list', true))), array('action' => 'index'), array('alt' => ___d('alaxos', 'list', true), 'title' => ___d('alaxos', 'list', true), 'escape' => false)));
	
$datewebcal=explode("-",$this->Form->value('start_date'));
//print_r($datewebcal); 
//echo $datewebcal[0]."&month=".$datewebcal[1]."&day=".$datewebcal[2] ; exit;
$webcal="edit_entry.php?year=".$datewebcal[0] ."&month=" .$datewebcal[1] ."&day=".$datewebcal[2] ."&name=" .$this->Form->value('name') ."&id=".$this->data['PmTask']['id'];


	?> 		<a href="/webcalendar/<?php echo $webcal;?>" target="_blank"><? 
		echo $html->image("calendrier.jpg", array('alt' => 'WebCalendar', 'title' => 'WebCalendar', 'style'=>'width: 28px'));
		//, array('url' => 'http://www.bloglines.com/', 'alt' => 'Flux RSS', 'title' => 'Flux RSS', 'style'=>'width: 23px'));
		?>
	</a>

</div>	

 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit" style="position: relative; top: -50px">
	<tr>
		<td>
			<?php ___('Projet') ?>
<br/>
			<?php 
			echo "<select id=\"PmTaskProject\" name=\"data[PmTask][project]\">";
projets_sel($this->data['PmProject']['id']);
echo "</select>";
echo "&nbsp;";
#echo " " .$this->Html->link(__('View', true), array('action' => '../pm_projects/view/'. $this->data['PmProject']['id']));
	e($html->link($html->image('toolbar/loupe.png', array('alt' => 'Voir le projet', 'title' => 'Voir le projet')), 
	array('action'=>'../pm_projects/view/'. $this->data['PmProject']['id']), array('escape' => false)));

			?>
		</td>
		<td>	
		Parent<br/>
		<?php 
		echo "<select name=\"data[PmTask][parent_id]\" id=\"parent_id\">";
		 parent_tasks($this->data['PmProject']['id'],$this->data['PmTask']['parent_id']);
		echo "</select>";
		?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Priorité') ?>
		<br/>
			<select name="data[PmTask][priority]" id="PmTaskPriority" />
<?		
priorite($this->data['PmTask']['priority']);
?>		
</select>	
		</td>
		<td>
			<?php ___('Statut') ?>
<br/>
			<?php #echo $this->AlaxosForm->input('status', array('label' => false));
					echo "<select name=\"status\" id=\"status\" />";
		statut_sel($this->data['PmTask']['status']);
		echo "</select>";
		 
		 echo $this->Form->input('owner', array("type"=>"hidden", "value"=>$this->data['PmTask']['owner']));
		echo $this->Form->input('assigned_to', array("type"=>"hidden", "value"=>$this->data['PmTask']['assigned_to']));?>
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total heures: <?php total_hours_task($this->data['PmTask']['id']);?>
		</td>
	</tr>
	
	<tr>
		<td colspan="2">
			<?php ___('Libellé') ?>

			<?php echo $this->AlaxosForm->input('name', array('label' => false, "style"=>"width: 800px;")); ?>
</td>
	</tr>
	<tr>
		<td>
			<?php ___('Description') ?>
			<?php 
			echo $this->AlaxosForm->input('description', array('label' => false,  "cols"=>"80", "rows"=>"25")); ?>
		</td>
		<?
		echo
		"<td class=\"imprimepas\" style=\"background-color: #FFFED8; padding: 0px;\"><div style=\"font-size: smaller\">";
		$description=$this->AlaxosForm->value('description');
		//$description=extrait_titres($description);
		$chaine=extrait_titres($description);
		//$chaine=$text;
//		global $chaine;
		$chaine=urlise($chaine);
		
		//global $text;
		$chaine=link_task($chaine);
		
		
		
		echo $chaine;
		echo "</div></td>";
		?>
	</tr>
	<tr>
		<td>
			<?php ___('Date de début') ?>
<br/>
			<?php echo $this->AlaxosForm->input('start_date', array('label' => false)); 
			//display a nice calendar
		$sd=$this->Form->value('start_date');
echo "<div class=\"calendrierjs\"><script type=\"text/javascript\">
Calendar.setup({ inputField:\"sel1\", button:\"trigger_a\" });
</script>
<script language=\"JavaScript\">
	new tcal ({
		// form name
		'formname': 'etDForm',
		// input name
		'controlname': 'data[PmTask][start_date]',
		'selected': '" .$sd ."',
		'today' : '" .$sd ."'
	});
	</script></div>
";	
			?>

		</td>

		<td>
			<?php ___('Délai') ?>
<br/>
			<?php 
			echo $this->AlaxosForm->input('due_date', array('label' => false)); 
			//display a nice calendar
		$sd=$this->Form->value('due_date');
echo "<div class=\"calendrierjs\"><script type=\"text/javascript\">
Calendar.setup({ inputField:\"sel1\", button:\"trigger_a\" });
</script>
<script language=\"JavaScript\">
	new tcal ({
		// form name
		'formname': 'etDForm',
		// input name
		'controlname': 'data[PmTask][due_date]',
		'selected': '" .$sd ."',
		'today' : '" .$sd ."'
	});
	</script></div>
";
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2"><a name="Remarques"></a>
			<?php ___('Remarques') ?>
		<br/>
			<?php echo $this->AlaxosForm->input('comments', array('label' => false,  "cols"=>"80", "rows"=>"15")); ?>
			
			<?php 
$qrcode='http://'.$_SERVER["REMOTE_ADDR"].$_SERVER["REQUEST_URI"];
/*
 * ne marche pas bien: le formatage est moche... à revoir!
 */
/*$qrcode.="\n\n";
$qrcode.="Project: " .$this->data['PmProject']['name'];
$qrcode.="\n\n";
$qrcode.="Libellé " .$this->data['PmTask']['name'];
$qrcode.="\n\n";
$qrcode.="Description: " .$this->data['PmTask']['description'];
$qrcode.="\n\n";
$qrcode.="Délai: " .$this->data['PmTask']['due_date'];
echo $qrcode;
echo "<br><br>length: " .strlen($qrcode);
*/
QRcode::png($qrcode, '/var/www/qrcode/pm.jpg'); // creates file
 ?>
  <img style="position: relative; left: 700px; top: -250px;" src="/qrcode/pm.jpg" />
			
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Réalisé') ?>
		</td>
		<td>
			<?php 
			echo "<select id=\"completion\" name=\"data[completion]\">";
				completion($this->AlaxosForm->value('completion'));
			echo "</select>";	
			?>
		</td>
	</tr>
	<tr class="imprimepas">
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('Modifier', true)); ?> 		</td>
 	</tr>
 	
 	<?php
 	parent_task($this->data['PmTask']['id']);
 	children_tasks($this->data['PmTask']['id']);
 	?>
 	
	</table>
 	<span class="imprimepas"><?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $this->data['PmTask']['id']));
	?></span>
</div>
	<div class="add_time">
<form name="ajoutheure" action="/pmcake/pm_tasks_times/ajoutheure">
<input type="hidden" name="projectid" value="<? echo $this->data['PmProject']['id'];?>">
<input type="hidden" name="idtache" value="<? echo $this->data['PmTask']['id'];?>">
<select name="addtime" onChange="Javascript:document.ajoutheure.submit()"><option value==""> *** Temps travail *** </option>
<?
ajoutheure();
?>
</select>
		<? 
		echo $html->image("icons/chronometre.png", array('alt' => 'Ajout temps travail', 'style'=>'width: 30px'));
		?>
</form>



</div>
<!-- ###################### FILES #################### -->
<div class="fichiers">
	<a name="Fichiers"></a><h2>Fichiers > 
	<a href="/pmcake/zefiles/add?task_id=<? echo $this->data['PmTask']['id'];?>">Nouveau fichier</a>
</h2>
<?
$sql="SELECT * FROM zefiles WHERE task_id=".$this->data['PmTask']['id'];
#do and check sql
$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}

$i=0;

echo "<table>";
while($i<mysql_num_rows($sql)){
	echo "<tr><td>#" .mysql_result($sql,$i,'id') ."</td><td><a href=\"" .CHEMIN ."files/" .mysql_result($sql,$i,'task_id') ."/" .mysql_result($sql,$i,'name') ."\">".mysql_result($sql,$i,'name') ."</a></td><td>";
	dateSQL2fr(mysql_result($sql,$i,'created'));
	#http://129.194.18.217/pmcake/files/1946/maisonpotterCapture-Google%20Earth.png
	echo "</td><td>";
	$extension=preg_replace("/^.*\./","",mysql_result($sql,$i,'name'));
	typefichier($extension);
	echo "</td>";
	$i++;
	echo "</tr>";
	}
echo "</table>";

/*OLD FILES FROM netoffice*/
$sql="SELECT * FROM pm_files WHERE task=".$this->data['PmTask']['id'];
#do and check sql
$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}

$i=0;

echo "<table>";
while($i<mysql_num_rows($sql)){
	#echo "<tr><td>#" .mysql_result($sql,$i,'id') ."</td><td>".mysql_result($sql,$i,'comments') ."</td><td>";

	
		echo "<tr><td>#" .mysql_result($sql,$i,'id') ."</td><td><a href=\"/pm.old/pm/files/" .mysql_result($sql,$i,'id') ."/" .mysql_result($sql,$i,'comments') ."\">".mysql_result($sql,$i,'name') ."</a></td><td>";

		dateSQL2fr(mysql_result($sql,$i,'date'));
	echo "</td><td>";
	
	typefichier(mysql_result($sql,$i,'extension'));
	echo "</td>";
	$i++;
	echo "</tr>";
	}
echo "</table>";
?>
</div>
