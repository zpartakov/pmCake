<?php
App::import('Lib', 'functions'); //imports app/libs/functions
#cake title of the page
$this->pageTitle = 'Voir tâche: ' .$pmTask['PmTask']['name']; 
//print_r($pmTask); exit;
//print_r($pmTask[Tag]); exit;
?>
	
	
	<div class="pmTasks view">
	<h2><div class="imprimepas"><?php echo $this->pageTitle;?></div></h2>
	<a href="#Fichiers" class="imprimepas">Fichiers</a>
	 | 
	<a href="#tags">tags</a>

	 <div style="background-color:#FFFFB5 ;margin-top: 5px; width: 50%" class="imprimepas">
	 <?
	 statut_radio($pmTask['PmTask']['id'],$pmTask['PmTask']['status']);
	 ?>
	 </div>
<div class="zactions">
	<?
	$idaction=$pmTask['PmTask']['id'];
	e($html->link($html->image('toolbar/add.png', array('alt' => 'Ajouter', 'title' => 'Ajouter')), array('action'=>'add'), array('escape' => false)));
	e($html->link($html->image('toolbar/editor.png', array('alt' => 'Modifier')), array('action'=>'edit', $idaction), array('alt' => 'Modifier', 'title' => 'Modifier', 'escape' => false)));
	$delete_text = isset($delete_text) ? $delete_text : ___d('alaxos', 'do you really want to delete this item ?', true);
	e($html->link($html->image('toolbar/drop.png', array('alt' => __d('alaxos', 'delete', true))), array('action' => 'delete', $idaction), array('alt' => ___d('alaxos', 'delete', true), 'title' => ___d('alaxos', 'delete', true), 'escape' => false), $delete_text));
	e($html->link($html->image('toolbar/list.png', array('alt' => __d('alaxos', 'list', true))), array('action' => 'index'), array('alt' => ___d('alaxos', 'list', true), 'title' => ___d('alaxos', 'list', true), 'escape' => false)));
	?>
</div>
<div class="delays">
		<!-- ################ PUSH DELAYS  ################  -->
	<form action="repousser" method="GET" name="<? echo $pmTask['PmTask']['id'];?>">
	<input type="hidden" name="identifiant" value="<? echo $pmTask['PmTask']['id'];?>">
	<input type='image' src="/pmcake/img/icons/bullet_arrow.gif" alt="Déplacer à demain" title="Déplacer à demain" name="demain" value="demain">
        <select name="ajout" class="micro" size="1" onChange="task_goto_URL(<? echo $pmTask['PmTask']['id'];?>,this.value)">
<? delais(); ?>

        </select>
      <!-- ############ task ok ######### -->

      </form>
</div>
	<table>
		<tr>
			<td>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pm Project'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pmTask['PmProject']['name'], array('controller' => 'pm_projects', 'action' => 'view', $pmTask['PmProject']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Priorité'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php prioriteView($pmTask['PmTask']['priority']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php statut($pmTask['PmTask']['status']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pm Member'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pmTask['PmMember']['name'], array('controller' => 'pm_members', 'action' => 'view', $pmTask['PmMember']['id'])); ?>
			&nbsp;
		</dd>
	<!--	<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Assigned To'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['assigned_to']; ?>
			&nbsp;
		</dd>-->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo urlise($pmTask['PmTask']['description']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php dateSQL2fr( $pmTask['PmTask']['start_date']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Due Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php dateSQL2fr( $pmTask['PmTask']['due_date']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estimated Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['estimated_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Actual Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['actual_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comments'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo urlise($pmTask['PmTask']['comments']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Completion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['completion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php dateSQL2fr( $pmTask['PmTask']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php #dateSQL2fr( $pmTask['PmTask']['modified']); ?>
				<?php echo $pmTask['PmTask']['mod_date']; ?>

		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Assigned'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php dateSQL2fr( $pmTask['PmTask']['assigned']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['published']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Phase'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['parent_phase']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Complete Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['complete_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Service'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['service']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Milestone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['milestone']; ?>
			&nbsp;
		</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Heures'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<!-- ###################### HOURS #################### -->
		<?php
		total_hours_task($pmTask['PmTask']['id']);
		
		?>
		</dd>
	</dl>
</div>
</td>

		</tr>
		<tr>
		<td>&nbsp;</td>
		<td>

      </td>
      </tr>
      
      
       	<?php
 	parent_task($pmTask['PmTask']['id']);
 	children_tasks($pmTask['PmTask']['id']);
 	?>
	</table>
	
	<div class="add_time_view">
<form name="ajoutheure" action="/pmcake/pm_tasks_times/ajoutheure">
<input type="hidden" name="projectid" value="<? echo $pmTask['PmProject']['id'];?>">
<input type="hidden" name="idtache" value="<? echo $pmTask['PmTask']['id'];?>">
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
	<a href="/pmcake/zefiles/add?task_id=<? echo $pmTask['PmTask']['id'];?>">Nouveau fichier</a>
</h2>
<?
$sql="SELECT * FROM zefiles WHERE task_id=".$pmTask['PmTask']['id'];
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
$sql="SELECT * FROM pm_files WHERE task=".$pmTask['PmTask']['id'];
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
	$tags=$pmTask[Tag];
	
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
