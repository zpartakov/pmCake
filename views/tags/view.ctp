<div class="tags view">
	
	<h2><?php ___('tag');?></h2>
<a href="#tasks"><?php __('Tasks');?></a>	
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $tag['Tag']['id'], 'copy_id' => $tag['Tag']['id'], 'delete_id' => $tag['Tag']['id'], 'delete_text' => ___('do you really want to delete this tag ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('cdu'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tag['Tag']['cdu']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('lib'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tag['Tag']['lib']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('last update'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tag['Tag']['last_update']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('rem1'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tag['Tag']['rem1']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('rem2'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tag['Tag']['rem2']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('rem3'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tag['Tag']['rem3']; ?>
		</td>
	</tr>
	</table>
</div>
<?php 
/*
 * todo: print linked tags
 */
//print_r($pmTasks);
#echo "<br>tagxxx<br>" .print_r($tag); exit;
//print_r($tag['PmTask']); exit;
#print_r($tag[PmTasksTag]); exit; //rien
#print_r($pmTasks); exit; //renvoie toutes les taches
?>
<h2><a name="tasks"></a><?php __('Tâches liées');?></h2>
	<?php
	$tags=$tag['PmTask'];
	
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
	<?php 
	/*echo $tag['name'];
	echo " ";
	echo $tag['id'];*/
	echo $this->Html->link($tag['name'], array('action' => '../pm_tasks/view', $tag['id']), array('class' => 'to_detail', 'escape' => false)); 
	?>
	</span>&nbsp;
<?php endforeach; ?>