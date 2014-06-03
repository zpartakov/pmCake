<?php
App::import('Lib', 'functions'); //imports app/libs/functions
global $csv;
if($csv==1) {
	echo "<pre>";
		$i = 0;
	foreach ($contacts as $contact):
	if(strlen($contact['Contact']['EmailAddress'])>0) {
	echo $contact['Contact']['EmailAddress'] ."<br/>";
	}
	endforeach;
	echo "</pre>";
	exit;
}
?>
<div class="contacts index">
	<h2><?php __('Contacts');
	$image="icons/pm/contacts.jpg";
	echo $html->image($image, array('style'=>'vertical-align: top; width: 100px'));
	
	?></h2>
<!-- begin search form -->
	<?php

	echo $form->create("Contact",array('action' => 'index'));
	?>
	<table>
		<tr>
			<td>     
			<?
				echo $form->input("q", array('label' => 'Search for'));
			?>
</td><td>			<?
				echo $form->checkbox("csv");
				?>
	 			&nbsp;csv?
</td><td>				<?
				echo "<select name=\"Category\" id=\"Category\" onChange=\"document.getElementById('ContactQ').value=this.value; this.form.submit();\">";
					contacts_groupes();
				echo "</select>";
			?>

			</td>
			<td>    <?
    echo $form->end("Search"); 
    ?></td>
		</tr>
	</table>
<!-- end search form -->   
	<ul>
		<li><?php echo $this->Html->link(__('New Contact', true), array('action' => 'add')); ?></li>
	</ul>
		<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('FirstName');?></th>
            <th><?php echo $this->Paginator->sort('LastName');?></th>
            <th><?php echo $this->Paginator->sort('birthday');?></th>
			<th><?php echo $this->Paginator->sort('EmailAddress');?></th>
			<th><?php echo $this->Paginator->sort('PrimaryPhone');?></th>
			<th><?php echo $this->Paginator->sort('MobilePhone');?></th>
			<th><?php echo $this->Paginator->sort('Profession');?></th>
			<th><?php echo $this->Paginator->sort('Category');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($contacts as $contact):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php 			e($html->link($html->image('toolbar/editor.png', array('alt' => 'Modifier')), array('action'=>'edit', $idaction), array('alt' => 'Modifier', 'title' => 'Modifier', 'escape' => false)));
?>
		</td>
		<td><?php echo $contact['Contact']['FirstName']; ?>&nbsp;</td>
        <td><?php echo $contact['Contact']['LastName']; ?>&nbsp;</td>
        <td><?php echo $contact['Contact']['birthday']; 
            ?>&nbsp;</td>
        
        
        
        
		<td><?php echo melto($contact['Contact']['EmailAddress']); ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['PrimaryPhone']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['MobilePhone']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['Profession']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['Category']; ?>&nbsp;</td>
		<td class="actions">
			
<?php				
			$idaction=$contact['Contact']['id'];
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Contact', true), array('action' => 'add')); ?></li>
	</ul>
</div>
