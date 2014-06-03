<?php
App::import('Lib', 'functions'); //imports app/libs/functions
#cake title of the page
$this->pageTitle = 'Liste des projets'; 

?>

<div class="pmProjects index">
	<h2><?php echo $this->pageTitle;
	
	echo $html->image('icons/pm/project-plan-icon.png ', array('style'=>'vertical-align: top; width: 100px'));
	?></h2>
				<?
				e($html->link($html->image('toolbar/add.png', array('alt' => 'Ajouter', 'title' => 'Ajouter')), array('action'=>'add'), array('escape' => false)));
				?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('organization');?></th>
			<!--<th><?php echo $this->Paginator->sort('owner');?></th>-->
			<th><?php echo $this->Paginator->sort('priority');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pmProjects as $pmProject):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
		
		/*
		 * echo $pmProject['PmProject']['id'];
		 * 
		 * */
	?>
	<tr<?php echo $class;?>>
		<td>
		<?php 
		clients($pmProject['PmProject']['pm_organization_id']);
		#echo $pmProject['PmProject']['pm_organization_id']; ?>&nbsp;</td>
		<!--<td><?php membres($pmProject['PmProject']['owner']); ?>&nbsp;</td>-->
		<td><?php prioriteView($pmProject['PmProject']['priority']); ?></td>
		<td><?php 
		
#		echo $pmProject['PmProject']['status']; 
		statut($pmProject['PmProject']['status']);
		#echo $html->image("gfx_status/" .$pmProject['PmProject']['status'] .".gif", array('alt' => 'Nouvelle tâche', 'title' => 'Nouvelle tâche'));
		
		?>&nbsp;</td>
		
		<td>
		&nbsp;
		
		<?php 
		/* display an icon to show project = private */
		if($pmProject['PmProject']['type']=="p") {
			perso_list();
		}


		echo $this->Html->link($pmProject['PmProject']['name'], array('controller' => 'pm_projects', 'action' => 'view/'.$pmProject['PmProject']['id'])); 
		?>
		</td>
		<td><?php 
		if(preg_match("/^20.*-/",$pmProject['PmProject']['modified'])) {
			#dateSQL2fr($pmProject['PmProject']['modified']);
		}else{
			echo date("d-m-Y h:i", $pmProject['PmProject']['modified']);
		}
		#echo $pmProject['PmProject']['modified'];
		?>&nbsp;</td>
		<td><?php echo $pmProject['PmProject']['type']; ?>&nbsp;</td>
		<td class="actions">

			
			
						<?
			$idaction=$pmProject['PmProject']['id'];
			e($html->link($html->image('toolbar/loupe.png', array('alt' => 'Voir')), array('action'=>'view', $idaction), array('alt' => 'Voir', 'title' => 'Voir', 'escape' => false)));
			e($html->link($html->image('toolbar/editor.png', array('alt' => 'Modifier')), array('action'=>'edit', $idaction), array('alt' => 'Modifier', 'title' => 'Modifier', 'escape' => false)));
			$delete_text = isset($delete_text) ? $delete_text : ___d('alaxos', 'do you really want to delete this item ?', true);
			e($html->link($html->image('toolbar/drop.png', array('alt' => __d('alaxos', 'delete', true))), array('action' => 'delete', $idaction), array('alt' => ___d('alaxos', 'delete', true), 'title' => ___d('alaxos', 'delete', true), 'escape' => false), $delete_text));
			?>	
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

