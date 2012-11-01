<div class="lesmigrations index">
	
	<h2><?php ___('lesmigrations');?></h2>
	 	
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $alaxosForm->create('Lesmigration', array('controller' => 'lesmigrations', 'url' => $this->passedArgs));
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('serveursource', true), 'Lesmigration.serveursource');?></th>
		<th><?php echo $this->Paginator->sort(__('serveurcible', true), 'Lesmigration.serveurcible');?></th>
		<th><?php echo $this->Paginator->sort(__('type_id', true), 'Lesmigration.type_id');?></th>
		<th><?php echo $this->Paginator->sort(__('urlsource', true), 'Lesmigration.urlsource');?></th>
		<th><?php echo $this->Paginator->sort(__('urlcible', true), 'Lesmigration.urlcible');?></th>
		<th><?php echo $this->Paginator->sort(__('pathsrc', true), 'Lesmigration.pathsrc');?></th>
		<th><?php echo $this->Paginator->sort(__('pathcible', true), 'Lesmigration.pathcible');?></th>
		<th><?php echo $this->Paginator->sort(__('datedebut', true), 'Lesmigration.datedebut');?></th>
		<th><?php echo $this->Paginator->sort(__('datefin', true), 'Lesmigration.datefin');?></th>
		<th><?php echo $this->Paginator->sort(__('user_id', true), 'Lesmigration.user_id');?></th>
		<th><?php echo $this->Paginator->sort(__('loginresp', true), 'Lesmigration.loginresp');?></th>
		<th><?php echo $this->Paginator->sort(__('emailscc', true), 'Lesmigration.emailscc');?></th>
		<th><?php echo $this->Paginator->sort(__('loginscc', true), 'Lesmigration.loginscc');?></th>
		<th><?php echo $this->Paginator->sort(__('ticket', true), 'Lesmigration.ticket');?></th>
		<th><?php echo $this->Paginator->sort(__('vhost', true), 'Lesmigration.vhost');?></th>
		<th><?php echo $this->Paginator->sort(__('unix', true), 'Lesmigration.unix');?></th>
		<th><?php echo $this->Paginator->sort(__('mysql', true), 'Lesmigration.mysql');?></th>
		<th><?php echo $this->Paginator->sort(__('limesurvey', true), 'Lesmigration.limesurvey');?></th>
		<th><?php echo $this->Paginator->sort(__('limesrc', true), 'Lesmigration.limesrc');?></th>
		<th><?php echo $this->Paginator->sort(__('limecible', true), 'Lesmigration.limecible');?></th>
		<th><?php echo $this->Paginator->sort(__('cms', true), 'Lesmigration.cms');?></th>
		<th><?php echo $this->Paginator->sort(__('statut_id', true), 'Lesmigration.statut_id');?></th>
		<th><?php echo $this->Paginator->sort(__('temps_prevu', true), 'Lesmigration.temps_prevu');?></th>
		<th><?php echo $this->Paginator->sort(__('temps_reel', true), 'Lesmigration.temps_reel');?></th>
		<th><?php echo $this->Paginator->sort(__('parent', true), 'Lesmigration.parent');?></th>
		<th><?php echo $this->Paginator->sort(__('difficulte', true), 'Lesmigration.difficulte');?></th>
		
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	
	<tr class="searchHeader">
		<td></td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('serveursource');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('serveurcible');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('type_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('urlsource');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('urlcible');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('pathsrc');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('pathcible');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('datedebut');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('datefin');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('user_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loginresp');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('emailscc');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loginscc');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ticket');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('vhost');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('unix');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('mysql');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('limesurvey');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('limesrc');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('limecible');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('cms');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('statut_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('temps_prevu');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('temps_reel');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('parent');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('difficulte');
			?>
		</td>
		<td class="searchHeader" style="width:80px">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));?>
    		</div>
    		
    		<?php
			echo $alaxosForm->create('Lesmigration', array('id' => 'chooseActionForm', 'url' => array('controller' => 'lesmigrations', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($lesmigrations as $lesmigration):
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
		echo $alaxosForm->checkBox('Lesmigration.' . $i . '.id', array('value' => $lesmigration['Lesmigration']['id']));
		?>
		</td>
		<td>
			<?php 
			echo $lesmigration['Lesmigration']['serveursource']; 
			echo $lesmigration['Server']['canonical']; 
			echo $lesmigration['Server']['name']; 
			
			?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['serveurcible']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['type_id']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['urlsource']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['urlcible']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['pathsrc']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['pathcible']; ?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($lesmigration['Lesmigration']['datedebut']); ?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($lesmigration['Lesmigration']['datefin']); ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['user_id']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['loginresp']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['emailscc']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['loginscc']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['ticket']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['vhost']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['unix']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['mysql']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['limesurvey']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['limesrc']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['limecible']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['cms']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['statut_id']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['temps_prevu']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['temps_reel']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['parent']; ?>
		</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['difficulte']; ?>
		</td>
		<td class="actions">

			<?php echo $html->link($html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $lesmigration['Lesmigration']['id']), array('id' => 'detail', 'escape' => false)); ?>
			<?php echo $html->link($html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $lesmigration['Lesmigration']['id']), array('escape' => false)); ?>
			<?php echo $html->link($html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $lesmigration['Lesmigration']['id']), array('escape' => false), sprintf(___("are you sure you want to delete '%s' ?", true), $lesmigration['Lesmigration']['id'])); ?>

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
