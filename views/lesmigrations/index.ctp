<?php
App::import('Lib', 'functions'); //imports app/libs/functions

$this->pageTitle="Migrations";
?>
<div class="lesmigrations index">
	
	<h2><?php ___('lesmigrations');?></h2>
	 		<h3><a href="/migrations/lesmigrations/indexdetail">Détail</h3>

	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	#echo $alaxosForm->create('Lesmigration', array('controller' => 'lesmigrations', 'url' => $this->passedArgs, 'type' => 'get'));
	echo $alaxosForm->create('Lesmigration', array('controller' => 'lesmigrations', 'url' => $this->passedArgs));
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>

		<th><?php echo $this->Paginator->sort(__('type_id', true), 'Lesmigration.type_id');?></th>
		<th>serveursource / <?php echo $this->Paginator->sort(__('urlcible', true), 'Lesmigration.urlcible');?></th>
		<th><?php echo $this->Paginator->sort(__('datelastmod', true), 'Lesmigration.datefin');?></th>
		<th><?php echo $this->Paginator->sort(__('user_id', true), 'Lesmigration.user_id');?></th>
			<th><?php echo $this->Paginator->sort(__('vhost', true), 'Lesmigration.vhost');?></th>
			<th><?php echo $this->Paginator->sort(__('statut', true), 'Lesmigration.statut_id');?></th>
					<th><?php echo $this->Paginator->sort(__('ticket', true), 'Lesmigration.ticket');?></th>


			
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	
	<tr class="searchHeader">
			<td></td>

		<td>
			<?php
				echo $this->AlaxosForm->filter_field('type_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('serveursource');
				echo $this->AlaxosForm->filter_field('urlcible');
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
				echo $this->AlaxosForm->filter_field('vhost');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('statut_id');
			?>
		</td>
	<td>
			<?php
				echo $this->AlaxosForm->filter_field('ticket');
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
			<?php #echo $lesmigration['Lesmigration']['type_id']; ?>
						<?php echo $this->Html->link($lesmigration['Type']['lib'], array('controller' => 'types', 'action' => 'view', $lesmigration['Type']['id'])); ?>
		</td>

		<td>
			<?php #echo $lesmigration['Lesmigration']['urlcible']; 
						echo "<a href=\"" .$lesmigration['Lesmigration']['urlcible'] ."\" target=\"_blank\">" .$lesmigration['Lesmigration']['urlcible'] ."</a>";
						
						echo "<br>";
						
						/*may bug if server empty comment/uncomment following lines and correct the bug - todo: function checkExistServer */
						//serveur($lesmigration['Lesmigration']['serveursource']);
						#echo $lesmigration['Lesmigration']['serveursource'];
						?>
						
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($lesmigration['Lesmigration']['datefin']); ?>
		</td>
		<td>
			<?php #echo $lesmigration['Lesmigration']['user_id']; ?>
			
					<?php 
			$blabla="Bonjour,%0A
			Voici des informations sur la migration de votre site %0A"
			.$lesmigration['Lesmigration']['urlcible'] ."%0A%0A";
			
			echo $this->Html->link($lesmigration['User']['email'], "mailto:".$lesmigration['User']['email'] ."?subject=migration " .$lesmigration['Lesmigration']['urlcible'] ."&Body=".$blabla); 
?>
&nbsp;

						<?php echo $html->link($html->image('/alaxos/img/toolbar/loupe.png'), array('controller' => 'users', 'action' => 'view', $lesmigration['User']['id']), array('id' => 'detail', 'escape' => false)); ?>
						

		</td>
		
		<td>
			<?php urlise($lesmigration['Lesmigration']['vhost']); ?>
		</td>
	
		
			<?php 
						//$limage = affichestatut($lesmigration['Statut']['libelle']); //graphical view
						echo "<td style=\"background-color: " .$limage[1].";\">" .$html->image($limage[0], array("alt"=>$lesmigration['Statut']['libelle'], "title"=>$lesmigration['Statut']['libelle']));
						#echo $lesmigration['Lesmigration']['statut_id']; 
			?>
		</td>
				<td>
			<?php echo $lesmigration['Lesmigration']['ticket']; ?>
		</td>
		<td class="actions">

			<?php echo $html->link($html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $lesmigration['Lesmigration']['id']), array('id' => 'detail', 'escape' => false)); ?>
			<?php echo $html->link($html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $lesmigration['Lesmigration']['id']), array('escape' => false)); ?>
			<?php echo $html->link($html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $lesmigration['Lesmigration']['id']), array('escape' => false), sprintf(___("are you sure you want to delete '%s' ?", true), $lesmigration['Lesmigration']['id'])); ?>
			<?php echo $html->link($html->image('bd_lastpage.png'), array('action' => 'createscript', $lesmigration['Lesmigration']['id']), array('escape' => false)); ?>
			
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
