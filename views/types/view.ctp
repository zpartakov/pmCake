<div class="types view">
	
	<h2><?php ___('type');?></h2>
	
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $type['Type']['id'], 'delete_id' => $type['Type']['id'], 'delete_text' => ___('do you really want to delete this type ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('lib'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $type['Type']['lib']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('version'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $type['Type']['version']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('url'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $type['Type']['url']; ?>
		</td>
	</tr>
	</table>
</div>
