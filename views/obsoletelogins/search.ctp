<div class="obsoletelogins index">
<h2><?php __('Logins obsolètes');?></h2>
<a href="http://www.unige.ch/outils/phpMyAdmin/db_structure.php?db=userweb">Base MySQL userweb silene</a>
<!-- search -->
<p>
<?php
   echo $form->create("Obsoletelogin",array('action' => 'search'));
    echo $form->input("q", array('label' => 'Search for'));
    echo $form->end("Search"); 
?></p>


<table cellpadding="0" cellspacing="0">
<tr>
	<th>id</th>
	<th>datenotifpostmaster</th>
	<th>login</th>
	<th>mail</th>
	<th>group</th>
	<th>server</th>
	<th>path</th>
	<th>garant</th>
	<th>lastmodif</th>
	<th>remarques</th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($results as $obsoletelogin):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['id']; ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['datenotifpostmaster']; ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['login']; ?>
		</td>
		<td>
			<?php echo "<a href=mailto:" .$obsoletelogin['Obsoletelogin']['mail'] .">" .$obsoletelogin['Obsoletelogin']['mail'] ."</a>"; ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['group']; ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['server']; ?>
		</td>
		<td>
			<?php 
			echo "<a title=\"voir site\" target=\"_blank\" href=\"http://" .$obsoletelogin['Obsoletelogin']['server'] .ereg_replace("^/w3","",$obsoletelogin['Obsoletelogin']['path']) ."\">" .$obsoletelogin['Obsoletelogin']['path'] ."</a>";
			 ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['garant']; ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['lastmodif']; ?>
		</td>
		<td>
			<?php echo substr($obsoletelogin['Obsoletelogin']['remarques'],0,25)."..."; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $obsoletelogin['Obsoletelogin']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $obsoletelogin['Obsoletelogin']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $obsoletelogin['Obsoletelogin']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $obsoletelogin['Obsoletelogin']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Obsoletelogin', true), array('action'=>'add')); ?></li>
	</ul>
</div>
