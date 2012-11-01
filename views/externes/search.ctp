<div class="externes index">
<h2><?php __('Externes');?></h2>
<a href="http://wadme.unige.ch:3149/pls/lopuni/guex047w$iindividu.querylist">Base oracle externes (accès en consultation OLU+FRA)</a>
<p>
<?php
   echo $form->create("Externe",array('action' => 'search'));
    echo $form->input("q", array('label' => 'Search for'));
    echo $form->end("Search"); 
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th>id</th>
	<th>server</th>
	<th>login</th>
	<th>uid</th>
	<th>email</th>
	<th>garant</th>
	<th>email2</th>
	<th>path</th>
	<th>rem</th>
	<th>date</th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($results as $externe):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $externe['Externe']['id']; ?>
		</td>
		<td>
			<?php echo $externe['Externe']['server']; ?>
		</td>
		<td>
			<?php echo $externe['Externe']['login']; ?>
		</td>
		<td>
			<?php echo $externe['Externe']['uid']; ?>
		</td>
		<td>
			<?php 
			
			echo "<a href=\"mailto:" .$externe['Externe']['email'] ."?cc=" .$externe['Externe']['garant'] ."&subject=" .$externe['Externe']['server'] ." - " .$externe['Externe']['path'] ."\">";

			echo $externe['Externe']['email'];
			echo "</a>";
			 ?>
		</td>
		<td>
			<?php echo $externe['Externe']['garant']; ?>
		</td>
		<td>
			<?php echo $externe['Externe']['email2']; ?>
		</td>
		<td>
			<?php 
			$path=ereg_replace("/w3/","",$externe['Externe']['path']);
			$path="<a target=\"_blank\" href=\"http://" .$externe['Externe']['server'] ."/" .$path ."\">";
			$path=ereg_replace("http://geneva2003/asso-etud/","http://www.asso-etud.unige.ch/",$path);			
			$path=ereg_replace("http://geneva2003/blogs/","http://blogs.unige.ch/",$path);
			
			echo $path;
			echo $externe['Externe']['path'];
			echo "</a>";
			
			 ?>
		</td>
		<td>
			<?php echo $externe['Externe']['rem']; ?>
		</td>
		<td>
			<?php echo $externe['Externe']['date']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $externe['Externe']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $externe['Externe']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $externe['Externe']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $externe['Externe']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Externe', true), array('action'=>'add')); ?></li>
	</ul>
</div>
