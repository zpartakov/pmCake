   <?php
   echo $form->create("Patchadmin",array('action' => 'search'));
    echo $form->input("q", array('label' => 'Search for'));
    echo $form->end("Search"); 
    ?>

<div class="patchadmins index">
<h2><?php __('Patchadmins');?></h2>
<a href="http://imu105.infomaniak.ch/MySQLAdmin/tbl_structure.php?db=akademiach7&table=patchadmins">phpMyAdmin akademia</a>&nbsp;
<?php 			e($html->link($html->image('toolbar/add.png', array('alt' => 'Ajouter', 'title' => 'Ajouter')), array('action'=>'add'), array('escape' => false)));
		?>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('server');?></th>
	<th><?php echo $paginator->sort('type');?></th>


	<th><?php echo $paginator->sort('contenu');?></th>
	<th><?php echo $paginator->sort('url');?></th>

	<th><?php echo $paginator->sort('version');?></th>
	<th><?php echo $paginator->sort('todos');?></th>

	<th><?php echo $paginator->sort('meladmin');?></th>

</tr>
<?php
$i = 0;
foreach ($patchadmins as $patchadmin):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
				<?php 
$lid=$patchadmin['Patchadmin']['id'];

#echo $html->link(__($lid, true), array('action'=>'view', $patchadmin['Patchadmin']['id'])); 


echo $html->link(__($lid, true), array('action'=>'edit', $patchadmin['Patchadmin']['id']));
?>


		</td>
		<td>
			<?php echo $patchadmin['Patchadmin']['server']; ?>
		</td>
		<td>
			<?php echo $patchadmin['Patchadmin']['type']; ?>
		</td>

		<td>
			<?php echo $patchadmin['Patchadmin']['contenu']; ?>
		</td>
		<td>
<ul>
			<?php 
echo "<li><a href=\"" .$patchadmin['Patchadmin']['url'] ."\">" .$patchadmin['Patchadmin']['url'] ."</a></li>"; 
echo "<li>Racine: " .$patchadmin['Patchadmin']['racine'] ."</li>"; 


echo "<li><a href=\"" .$patchadmin['Patchadmin']['urladmin'] ."\"><span class=\"admin\">" .$patchadmin['Patchadmin']['urladmin'] ."</span></a></li>"; 
?>
</ul>
		</td>
				<td>
			<?php echo $patchadmin['Patchadmin']['version']; ?>
		</td>
		<td>
			<?php echo substr($patchadmin['Patchadmin']['todos'],0,50); ?>
		</td>

		<td>
			<?php echo "<a href=\"mailto:" .$patchadmin['Patchadmin']['meladmin'] ."\">" .substr($patchadmin['Patchadmin']['meladmin'],0,10) ."</a>"; ?>
		</td>
		<td class="actions">		
			<?
			$idaction=$patchadmin['Patchadmin']['id'];
			e($html->link($html->image('toolbar/loupe.png', array('alt' => 'Voir')), array('action'=>'view', $idaction), array('alt' => 'Voir', 'title' => 'Voir', 'escape' => false)));
			e($html->link($html->image('toolbar/editor.png', array('alt' => 'Modifier')), array('action'=>'edit', $idaction), array('alt' => 'Modifier', 'title' => 'Modifier', 'escape' => false)));
			$delete_text = isset($delete_text) ? $delete_text : ___d('alaxos', 'do you really want to delete this item ?', true);
			e($html->link($html->image('toolbar/drop.png', array('alt' => __d('alaxos', 'delete', true))), array('action' => 'delete', $idaction), array('alt' => ___d('alaxos', 'delete', true), 'title' => ___d('alaxos', 'delete', true), 'escape' => false), $delete_text));
			?>	
		</td>

	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php 			e($html->link($html->image('toolbar/add.png', array('alt' => 'Ajouter', 'title' => 'Ajouter')), array('action'=>'add'), array('escape' => false)));
		?></li>
	</ul>
</div>
