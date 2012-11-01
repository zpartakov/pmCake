<?
$this->pageTitle="Externes";
?>
<div class="externes index">
<h2><?php __('Externes');?></h2>
<!-- liens utiles -->
<ul>
<li><a href="http://wadme.unige.ch:3149/pls/lopuni/guex047w$iindividu.querylist">Base oracle externes (accès en consultation OLU+FRA)</a></li>
<li><a href="https://catalogue-si.unige.ch/catalogue/fiches-de-specifications-de-services/c34/?searchterm=externes">Obtenir un accès informatique (Catalogue de services)</a></li>
</ul>
<p>
<?php
   echo $form->create("Externe",array('action' => 'search'));
    echo $form->input("q", array('label' => 'Search for'));
    echo $form->end("Search"); 
    
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('server');?></th>
	<th><?php echo $paginator->sort('login');?></th>
	<th><?php echo $paginator->sort('uid');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('garant');?></th>
	<th><?php echo $paginator->sort('email2');?></th>
	<th><?php echo $paginator->sort('path');?></th>
	<th><?php echo $paginator->sort('rem');?></th>
	<th><?php echo $paginator->sort('date');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($externes as $externe):
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
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Externe', true), array('action'=>'add')); ?></li>
	</ul>
</div>
