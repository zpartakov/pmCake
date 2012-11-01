<script type="text/javascript">
	function redirige() {
window.location ="/intranet/pmcake/pm_bookmarks/";
}
</script>
<?
App::import('Lib', 'functions'); //imports app/libs/functions
//Configure::write('debug', 2);
if($_GET['check']!="on"){
?>
<form method="GET" name="verifie">
<input type="checkbox" name="check" onclick="document.verifie.submit()"> check url?
</form>
<?
} else {
echo '<input type="checkbox" name="checkno" onclick="redirige()"> uncheck url?';
}
?>
<div class="pmBookmarks index">
	<h2><?php __('Pm Bookmarks');?></h2>
	<!-- begin search form -->
	<?php

	echo $form->create("PmBookmark",array('action' => 'index'));
    echo $form->input("q", array('label' => 'Search for'));
    echo $form->end("Search"); 
    ?>
    <!-- end search form -->    

	<table cellpadding="0" cellspacing="0">
	<tr>
	<!--		<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('owner');?></th>
			<th><?php echo $this->Paginator->sort('category');?></th> -->
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
	<!--		<th><?php echo $this->Paginator->sort('shared');?></th>
			<th><?php echo $this->Paginator->sort('home');?></th>
			<th><?php echo $this->Paginator->sort('comments');?></th>
			<th><?php echo $this->Paginator->sort('users');?></th>-->
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pmBookmarks as $pmBookmark):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
	<!--	<td><?php echo $pmBookmark['PmBookmark']['id']; ?>&nbsp;</td>
		<td><?php echo $pmBookmark['PmBookmark']['owner']; ?>&nbsp;</td>
		<td><?php echo $pmBookmark['PmBookmark']['category']; ?>&nbsp;</td> -->
		<td><a href="<?php echo $pmBookmark['PmBookmark']['url']; ?>" target="_blank"><?php echo $pmBookmark['PmBookmark']['name']; ?>&nbsp;</a></td>
		<td>
		<a href="<?php echo $pmBookmark['PmBookmark']['url']; ?>" target="_blank">
		<?php
if($_GET['check']=="on"){
		gethead( $pmBookmark['PmBookmark']['url']);
	}
			echo $html->image("icons/web.jpg", array($pmBookmark['PmBookmark']['url'], 'alt' => 'www', 'title' => 'www', 'style'=>'width: 27px'));
	?></a>
		</td>
		<td><?php echo $pmBookmark['PmBookmark']['description']; ?>&nbsp;</td>
	<!--	<td><?php echo $pmBookmark['PmBookmark']['shared']; ?>&nbsp;</td>
		<td><?php echo $pmBookmark['PmBookmark']['home']; ?>&nbsp;</td>
		<td><?php echo $pmBookmark['PmBookmark']['comments']; ?>&nbsp;</td>
		<td><?php echo $pmBookmark['PmBookmark']['users']; ?>&nbsp;</td> -->
		<td><?php echo $pmBookmark['PmBookmark']['created']; ?>&nbsp;</td>
		<td><?php echo $pmBookmark['PmBookmark']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pmBookmark['PmBookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pmBookmark['PmBookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pmBookmark['PmBookmark']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmBookmark['PmBookmark']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pm Bookmark', true), array('action' => 'add')); ?></li>
	</ul>
</div>
