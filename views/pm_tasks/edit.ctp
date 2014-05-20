<?php
/*
 * edit a given task
 * */  
?>
<script>
/*
 * keyboard shortcuts
 */
var isCtrl = false;$(document).keyup(function (e) {
	if(e.which == 17) isCtrl=false;
	}).keydown(function (e) {
	    if(e.which == 17) isCtrl=true;
	    if(e.which == 83 && isCtrl == true) {
	        // Votre fonction à déclencher au Ctrl+S
	    	$.ajax({
	    	    url:'/intranet/pmcake/pm_tasks/sauver',
	    	    type:'POST',
	    	    data:data
	    	});
	   return true;
	 }
	});
</script>
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
			 | 
	<a href="#tags"><?php  __('Tags');?></a>
		
<div class="pmTasks form" style="margin-top: 10px;">

	<?php echo $this->AlaxosForm->create('PmTask', array("name"=>"etDForm"));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	
 	<h2><?php echo $this->pageTitle; ?>&nbsp;<input type="submit" value="modifier" style="font-size: small">
 	
 	 Parent: <?php 		parent_task_small($this->data['PmTask']['id']);?></h2>
 	
 	<?php echo "<a href=\"#Remarques\">Remarques</a> | <a href=\"#Fichiers\">Fichiers</a>"; ?>
 	
	 <div class="imprimepas" style="background-color:#FFFFB5 ;margin-top: 5px; width: 80%">
	 <strong>Statut:</strong> 
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


	?> 		
	<!-- 
	<a href="/webcalendar/<?php echo $webcal;?>" target="_blank"><? 
		echo $html->image("calendrier.jpg", array('alt' => 'WebCalendar', 'title' => 'WebCalendar', 'style'=>'width: 28px'));
		//, array('url' => 'http://www.bloglines.com/', 'alt' => 'Flux RSS', 'title' => 'Flux RSS', 'style'=>'width: 23px'));
		?>
	</a>
	 -->
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
echo "<br/>";
echo "web: " .$this->Html->link($this->data['PmProject']['url_prod'], $this->data['PmProject']['url_prod'], array('target'=>'_blank'));

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
			<?		
				prioriteViewSelCol($this->data['PmTask']['priority'], $this->data['PmTask']['id']);
			?>		
		</td>
		
			<td><?php __('Heures'); ?>: 
		<!-- ###################### HOURS #################### -->
		<?php
			total_hours_task($this->data['PmTask']['id']);		
		?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Libellé');?>

			<?php 
			$changer="'name','libelletache','".$this->data['PmTask']['id']."'";
			//echo $changer;
			echo $this->AlaxosForm->input('name', array('id'=>'libelletache', 'label' => false, "style"=>"width: 800px;", "onChange" => "libelle_change_status($changer)")); ?>
		</td>
		<td>
		Membre(s)
		<?php 
		ts_les_membres($this->data['PmTask']['id']);
		
				echo $this->Form->input('PmMember');
		?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Description') ?>
			<?php 
			echo $this->AlaxosForm->input('description', array('label' => false,  "cols"=>"80", "rows"=>"25")); ?>
		</td>
		<?
		$changer="'description','ladescription','".$this->data['PmTask']['id']."'";
		echo
		"<td class=\"imprimepas\" style=\"background-color: #FFFED8; padding: 0px;\"><div style=\"font-size: smaller\">";
		$description=$this->AlaxosForm->value('description', array('id'=>'ladescription', "onChange" => "libelle_change_status($changer)"));
		$chaine=extrait_titres($description);
		$chaine=urlise($chaine);
		$chaine=link_task($chaine);
		echo $chaine;
		echo "</div></td>";
		?>
	</tr>
	<tr>
		<td>
			<?php ___('Date de début') ?><em> (click pour enregistrer)</em>
			<br/>
			<?php 
			$idtask=$this->data['PmTask']['id'];
			$startdate=$this->Form->value('start_date');
			echo $this->AlaxosForm->input("start_date", array("label" => false,"onClick" => "change_date_debut($idtask,'$startdate')")); 
			//display a nice calendar
			$sd=$this->Form->value('start_date');
			echo "<div class=\"calendrierjs\">
			<script type=\"text/javascript\">
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
			<?php ___('Délai') ?><em> (click pour enregistrer)</em>
			<br/>
			<?php 
			$enddate=$this->Form->value('due_date');
			echo $this->AlaxosForm->input('due_date', array('label' => false,"onClick" => "change_date_fin($idtask,'$enddate')")); 
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

		 /*
		  * is the task a copy? if yes, change dates to current dates
		  *  */
		if($_GET['copy']=="yes") {
			?>
				<script language="JavaScript">
					current_mysql_date("#PmTaskStartDate");
					current_mysql_date("#PmTaskDueDate");
				</script>
			<?php
		}
		?>
		</td>
	</tr>
	<tr>
		<td colspan="2"><a name="Remarques"></a>
			<?php ___('Remarques') ?>
		<br/>
			<?php 
						$changer="'comments','commentstache','".$this->data['PmTask']['id']."'";
			
			echo $this->AlaxosForm->input('comments', array('label' => false,  "cols"=>"80", "rows"=>"15", 'id'=>'commentstache', "onChange" => "libelle_change_status($changer)")); ?>
			<!-- 			
						<?php 
			$qrcode='http://'.$_SERVER["REMOTE_ADDR"].$_SERVER["REQUEST_URI"];
			QRcode::png($qrcode, '/var/www/qrcode/pm.jpg'); // creates file
			 ?>
			  <img style="position: relative; left: 700px; top: -250px;" src="/qrcode/pm.jpg" />
			 -->			
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
 	/*
 	 * linked tasks
 	 */
 	parent_task($this->data['PmTask']['id']);
 	children_tasks($this->data['PmTask']['id']);
 	?> 	
	</table>
 	<span class="imprimepas"><?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $this->data['PmTask']['id']));
	?></span>
</div>
<div class="add_time">
	<form name="ajoutheure" action="/intranet/pmcake/pm_tasks_times/ajoutheure">
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
<h2><a name="tags"></a>Tags</h2>
	<?php
		$i = 0;
	foreach ($tags as $tag):
		$class = null;
		if ($i++ % 2 == 0)
		{
			$class = ' class="row"';
		}
		else
		{
			$class = ' class="altrow"';
		}
	?>
	<span<?php echo $class;?>>
			<?php echo $this->Html->link($tag['lib'], array('action' => '../tags/view', $tag['PmTasksTag']['id']), array('class' => 'to_detail', 'escape' => false)); ?>
	</span>&nbsp;|&nbsp;
<?php endforeach; ?>
<?php echo $this->AlaxosForm->create('PmTask');?>
<?php echo $this->AlaxosForm->input('id'); ?>
<?php 
	echo $this->AlaxosForm->input('PmTag', array('label' => false, 'multiple' => 'checkbox'));
?>
<?php echo $this->AlaxosForm->end(___('update', true)); ?>
