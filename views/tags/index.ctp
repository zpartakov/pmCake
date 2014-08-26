<div class="tags index">
	
	<h2><?php ___('tags');?>
	<?php
	$image="icons/pm/tags.png";
	echo $html->image($image, array('style'=>'vertical-align: top; width: 100px'));
?></h2>
	 	
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('Tag', array('url' => $this->passedArgs)); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('cdu', true), 'Tag.cdu');?></th>
		<th><?php echo $this->Paginator->sort(__('lib', true), 'Tag.lib');?></th>
		<th><?php echo $this->Paginator->sort(__('last_update', true), 'Tag.last_update');?></th>
		<th><?php echo $this->Paginator->sort(__('rem1', true), 'Tag.rem1');?></th>
		<th><?php echo $this->Paginator->sort(__('rem2', true), 'Tag.rem2');?></th>
		<th><?php echo $this->Paginator->sort(__('rem3', true), 'Tag.rem3');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td></td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('cdu');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('lib');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('last_update');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('rem1');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('rem2');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('rem3');
			?>
		</td>
		<td class="searchHeader" style="width:80px">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('Tag', array('id' => 'chooseActionForm', 'url' => array('controller' => 'tags', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
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
	<tr<?php echo $class;?>>
		<td>
		<?php
		echo $this->AlaxosForm->checkBox('Tag.' . $i . '.id', array('value' => $tag['Tag']['id']));
		?>
		</td>
		<td>
			<?php echo $tag['Tag']['cdu']; ?>
		</td>
		<td>
			<?php echo $tag['Tag']['lib']; ?>
		</td>
		<td>
			<?php echo $tag['Tag']['last_update']; ?>
		</td>
		<td>
			<?php echo $tag['Tag']['rem1']; ?>
		</td>
		<td>
			<?php echo $tag['Tag']['rem2']; ?>
		</td>
		<td>
			<?php echo $tag['Tag']['rem3']; ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $tag['Tag']['id']), array('class' => 'to_detail', 'escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $tag['Tag']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $tag['Tag']['id']), array('escape' => false), sprintf(___("are you sure you want to delete '%s' ?", true), $tag['Tag']['lib'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 |
	 	<?php echo $this->Paginator->numbers(array('modulus' => 5, 'first' => 2, 'last' => 2, 'after' => ' ', 'before' => ' '));?>	 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	
	<?php
if($i > 0)
{
	echo '<div class="choose_action">';
	echo ___d('alaxos', 'action to perform on the selected items', true);
	echo '&nbsp;';
	echo $this->AlaxosForm->input_actions_list();
	echo '&nbsp;';
	echo $this->AlaxosForm->end(array('label' =>___d('alaxos', 'go', true), 'div' => false));
	echo '</div>';
}
?>
	
</div>
