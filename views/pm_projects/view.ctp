<script language="JavaScript" type="text/javascript">

	
	function finished(){
		if(document.getElementById("closedtasks").style.display=="none"){
			/*
			 display completed tasks and jump to completed tasks 
			*/
			
		document.getElementById("closedtasks").style.display="block";		
		window.location = "#finished";
		} else {
			/*
			 hide completed tasks and jump to home
			*/
			document.getElementById("closedtasks").style.display=="none";
			window.location = "#home";
			
		}
	}



</script>

<?php
App::import('Lib', 'functions'); //imports app/libs/functions
//Configure::write('debug', 2);
#cake title of the page
$this->pageTitle = 'Détail projet: ' .$pmProject['PmProject']['name']; 
?>
	<a name="home"></a>
	<div class="pmProjects view">
<h2><?php echo $this->pageTitle;?></h2>
<div class="project_view_actions">
<a href="#taches">Tâches</a> | <a href="#dreams">Incubateur</a> | <a href="#wait">En Attente</a> | 
<a href="#delegated">Tâches déléguées</a>
 | <a href="#suspended">Suspendues</a> 
 | <a href="#references">Références</a> 
 | <a href="javascript:finished();">Terminé</a>
  | <a href="#notes">Notes</a> <? e($html->link($html->image('toolbar/editor.png', array('alt' => 'Modifier')), array('action'=>'edit', $pmProject['PmProject']['id']), array('alt' => 'Modifier', 'title' => 'Modifier', 'escape' => false)));?>
</div>
<div class="zactions">
	<?
	$idaction=$pmProject['PmProject']['id'];
	les_actions($idaction);
	?>
</div>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
<table>
	<tr>
		<td>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Qui?'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php clients( $pmProject['PmProject']['organization']); ?>
			&nbsp;
		</dd>
<!--		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Owner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmProject['PmProject']['owner']; ?>
			&nbsp;
		</dd>-->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Priority'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php prioriteView($pmProject['PmProject']['priority']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php statut( $pmProject['PmProject']['status']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<div style="padding: 5px;">
			<?php echo urlise($pmProject['PmProject']['description']); ?>
		</div>	
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url Dev'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php urlise2($pmProject['PmProject']['url_dev']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url Prod'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php urlise2($pmProject['PmProject']['url_prod']); 
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php dateSQL2fr($pmProject['PmProject']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			#dateSQL2fr( $pmProject['PmProject']['modified']); 
			if(preg_match("/^20.*-/",$pmProject['PmProject']['modified'])) {
				dateSQL2fr($pmProject['PmProject']['modified']);
			}else{
				echo date("d-m-Y h:i", $pmProject['PmProject']['modified']);
			}				
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmProject['PmProject']['published']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Upload Max'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmProject['PmProject']['upload_max']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phase Set'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmProject['PmProject']['phase_set']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmProject['PmProject']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total heures'); ?></dt>
				<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?
			Total_heures($pmProject['PmProject']['id']);
			?>
			</dd>

	</dl>
</div>
</td>
	</tr>
</table>

<hr>
<? 
/* ################### ACTIVE TASKS ########################
 * 
 * */
$plib="Tâches à faire"; $pid=$pmProject['PmProject']['id']; $order="due_date"; $status=3; $operator="=";$anchor="taches";
project_tasks_show($plib,$pid,$order,$status,$operator, $anchor);
/* ################### ACTIVE TASKS ########################
 * 
 * */
$plib="Tâches déléguées"; $pid=$pmProject['PmProject']['id']; $order="due_date"; $status=6; $operator="=";$anchor="delegated";
project_tasks_show($plib,$pid,$order,$status,$operator, $anchor);
/* ################### WAIT ########################
 * */
$plib="En attente"; $pid=$pmProject['PmProject']['id']; $order="due_date"; $status=5; $operator="=";$anchor="wait";
project_tasks_show($plib,$pid,$order,$status,$operator, $anchor);
/* ################### DREAMS / INCUBATEUR ########################
 * */
$plib="Incubateur"; $pid=$pmProject['PmProject']['id']; $order="priority DESC,status,due_date"; $status=17; $operator="="; $anchor="dreams";
project_tasks_show($plib,$pid,$order,$status,$operator, $anchor);

/* ################### REFERENCES ########################
 * */
$plib="Références"; $pid=$pmProject['PmProject']['id']; $order="priority DESC,status,due_date"; $status=22; $operator="="; $anchor="references";
project_tasks_show($plib,$pid,$order,$status,$operator, $anchor);

/* ################### SUSPENDED ########################
 * */
$plib="Suspendues"; $pid=$pmProject['PmProject']['id']; $order="due_date"; $status=4; $operator="=";$anchor="suspended";
project_tasks_show($plib,$pid,$order,$status,$operator, $anchor);
/* ################### DREAMS / INCUBATEUR ########################
 * 
 */
/* ################### CLOSED TASKS ########################
 * */
echo "<div id=\"closedtasks\" style=\"display: none;\">";
echo "<a href=\"javascript:finished();\">Cacher tâches terminées</a>";
$plib="Tâches terminées"; $pid=$pmProject['PmProject']['id']; $order="priority DESC,status,due_date"; $status="1";  $operator="="; $anchor="finished"; 
project_tasks_show($plib,$pid,$order,$status,$operator, $anchor);
?>
</div>
	<!-- ##################### NOTES ##################### -->
<div class="pmNotes index">
<a name="notes"></a>

	<h2><?php __('Notes');?> > <?php echo $this->Html->link(__('Nouvelle note', true), array('controller' => 'pm_notes', 'action' => 'add')); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>suject</th>
			<th>description</th>
			<th>date</th>
<!--			<th>publié</th>-->
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$sql="SELECT * FROM pm_notes WHERE project=".$pmProject['PmProject']['id'];

$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); }

$i=0;
while($i<mysql_num_rows($sql)){
		$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>

		<td><?php echo mysql_result($sql,$i,'subject'); ?>&nbsp;</td>
		<td><?php urlise( mysql_result($sql,$i,'description')); ?>&nbsp;</td>
		<td><?php echo mysql_result($sql,$i,'date'); ?>&nbsp;</td>
		<!--<td><?php echo mysql_result($sql,$i,'published'); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('Voir', true), array('action' => '../pm_notes/view', mysql_result($sql,$i,'id'))); ?>
			<?php echo $this->Html->link(__('Modifier', true), array('action' => '../pm_notes/edit', mysql_result($sql,$i,'id'))); ?>
			<?php echo $this->Html->link(__('Supprimer', true), array('action' => '../pm_notes/delete', mysql_result($sql,$i,'id')), null, sprintf(__('Are you sure you want to delete # %s?', true), mysql_result($sql,$i,'id'))); ?>
		</td>

<?php 
$i++;
}
 ?>	</tr>
	</table>

</div>
