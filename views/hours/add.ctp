<div class="hours form">
<?php echo $this->Form->create('Hour');?>
	<fieldset>
		<legend><?php __('Add Hour'); ?></legend>
	<?php
	$lestyle='text-align: right; margin-left: 10px; padding: 5px; position: absolute; left: 10%;';
			//echo $this->Form->input('year', array('value'=>date("Y"), 'class'=>'tdnumeric'));
 		echo $this->Form->input('year', array('value'=>date("Y"), 'style'=>$lestyle));
		//echo $this->Form->input('week_nb', array('value'=> date("oW")));
		echo $this->Form->input('week_nb', array('value'=> date("W"), 'style'=>$lestyle));
		echo $this->Form->input('hours_to_do', array('value'=>'32', 'style'=>$lestyle));
		echo $this->Form->input('hours_done', array('value'=>'32', 'style'=>$lestyle));
		echo $this->Form->input('days_holidays', array('value'=>'0', 'style'=>$lestyle));
		echo $this->Form->input('note', array('style'=>$lestyle));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Hours', true), array('action' => 'index'));?></li>
	</ul>
</div>