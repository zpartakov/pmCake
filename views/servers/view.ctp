<div class="servers view">
	
	<h2><?php ___('server');?></h2>
	
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $server['Server']['id'], 'delete_id' => $server['Server']['id'], 'delete_text' => ___('do you really want to delete this server ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('canonical'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $server['Server']['canonical']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $server['Server']['name']; ?>
		</td>
	</tr>
	</table>
</div>
