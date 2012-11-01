<?
App::import('Lib', 'functions'); //imports app/libs/functions
$sql="SELECT * FROM pm_projects WHERE id=".$_GET['pid'];
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); }
	echo "<h1>Projet: " .mysql_result($sql,0,'name') ."</h1>";
?>
<div class="pmTasks index">
	<h2><?php __('Pm Tasks');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>tâche</th>
			<th>priorité</th>
			<th>délai</th>
			<th>milestone</th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
<?
$sql="SELECT * FROM pm_tasks WHERE project=".$_GET['pid'];

if(!$_GET['statut']) {
	$statut = " AND status=3"; //show open tasks by default
} else { 
	$statut = " AND status=" .$_GET['statut'];
}
$sql.=$statut;
$sql.= " ORDER BY due_date";
#echo $sql;
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); }

$i=0;
while($i<mysql_num_rows($sql)){
			$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	#echo "<br>" .mysql_result($sql,$i,'id');
	?>
			<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link(mysql_result($sql,$i,'name'), array('controller' => 'pm_projects', 'action' => 'view', mysql_result($sql,$i,'id'))); ?>
		</td>
		<td><?php echo mysql_result($sql,$i,'priority'); ?>&nbsp;</td>
		
		<td><?php echo mysql_result($sql,$i,'due_date'); ?>&nbsp;</td>
		<td><?php echo mysql_result($sql,$i,'milestone'); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', mysql_result($sql,$i,'id'))); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', mysql_result($sql,$i,'id'))); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', mysql_result($sql,$i,'id'), null, sprintf(__('Are you sure you want to delete # %s?', true), mysql_result($sql,$i,'id')))); ?>
		</td>
	</tr>
<?
	$i++;
	}
?>

	</table>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Members', true), array('controller' => 'pm_members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Member', true), array('controller' => 'pm_members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks Times', true), array('controller' => 'pm_tasks_times', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Tasks Time', true), array('controller' => 'pm_tasks_times', 'action' => 'add')); ?> </li>
	</ul>
</div>

