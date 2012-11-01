<div class="types index">
	
	<h2><?php ___('types');?></h2>
	 	
	<?php
	//echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>
				<?
		e($html->link($html->image('toolbar/add.png', array('alt' => 'Ajouter', 'title' => 'Ajouter')), array('action'=>'add'), array('escape' => false)));
				?>
	<?php
	echo $alaxosForm->create('Type', array('controller' => 'types', 'url' => $this->passedArgs));
	?>

    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('lib', true), 'Type.lib');?></th>
		<th><?php echo $this->Paginator->sort(__('version', true), 'Type.version');?></th>
		<th><?php echo $this->Paginator->sort(__('url', true), 'Type.url');?></th>
		
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	
	<tr class="searchHeader">
		<td></td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('lib');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('version');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('url');
			?>
		</td>
		<td class="searchHeader" style="width:80px">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));?>
    		</div>
    		
    		<?php
			echo $alaxosForm->create('Type', array('id' => 'chooseActionForm', 'url' => array('controller' => 'types', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($types as $type):
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
	<tr<?php echo $class;?>>
		<td>
		<?php
		echo $alaxosForm->checkBox('Type.' . $i . '.id', array('value' => $type['Type']['id']));
		?>
		</td>
		<td>
			<?php echo $type['Type']['lib']; ?>
		</td>
		<td>
			<?php echo $type['Type']['version']; ?>
		</td>
		<td>
			<?php echo $html->link($type['Type']['url']); ?>
		</td>
		<td class="actions">

		<?php $idaction=$type['Type']['id'];
			e($html->link($html->image('toolbar/loupe.png', array('alt' => 'Voir')), array('action'=>'view', $idaction), array('alt' => 'Voir', 'title' => 'Voir', 'escape' => false)));
			e($html->link($html->image('toolbar/editor.png', array('alt' => 'Modifier')), array('action'=>'edit', $idaction), array('alt' => 'Modifier', 'title' => 'Modifier', 'escape' => false)));
			$delete_text = isset($delete_text) ? $delete_text : ___d('alaxos', 'do you really want to delete this item ?', true);
			e($html->link($html->image('toolbar/drop.png', array('alt' => __d('alaxos', 'delete', true))), array('action' => 'delete', $idaction), array('alt' => ___d('alaxos', 'delete', true), 'title' => ___d('alaxos', 'delete', true), 'escape' => false), $delete_text));
?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 |
	 	<?php echo $this->Paginator->numbers();?>	 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	
	<?php
if($i > 0)
{
	echo '<div class="choose_action">';
	echo ___d('alaxos', 'action to perform on the selected items', true);
	echo '&nbsp;';
	echo $alaxosForm->input_actions_list();
	echo '&nbsp;';
	echo $alaxosForm->end(array('label' =>___d('alaxos', 'go', true), 'div' => false));
	echo '</div>';
}
?>
	
</div>
