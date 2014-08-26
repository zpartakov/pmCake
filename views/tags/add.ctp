<div class="tags form">

	<?php echo $this->AlaxosForm->create('Tag');?>
	
 	<h2><?php ___('add tag'); ?></h2>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('cdu') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('cdu', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('lib') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('lib', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('last_update') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('last_update', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('rem1') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('rem1', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('rem2') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('rem2', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('rem3') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('rem3', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('PmTask') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('PmTask', array('label' => false, 'multiple' => 'checkbox')); ?>		</td>
	</tr>
	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('submit', true)); ?> 		</td>
 	</tr>
	</table>

</div>
