<?php
App::import('Lib', 'functions'); //imports app/libs/functions
#cake title of the page

$id=$this->Form->value('PmProject.id');
$name=$this->Form->value('PmProject.name');

$this->pageTitle = 'Modifier projet: #' .$id ." " .$name; 

?>
<div class="pmProjects form">
<?php echo $this->Form->create('PmProject');?>
	<fieldset>
 		<legend><?php __('Edit Pm Project'); ?></legend>
	<?php
		echo $this->Form->input('id');
		#echo $this->Form->input('organization');
		?>
		<table>
		<tr>
		<td>
		<label for="PmProjectPriority">Qui?</label>
		<select id="PmProjectOrganization" name="data[PmProject][organization]" />
			<?
			if($this->Form->value('PmProject.organization')<4){
				$organisation=3;
			} else {
				$organisation=$this->Form->value('PmProject.organization');
			}
				clients_sel($organisation);
			?>
		</select>
		</td>
		<td>
		<?
			echo $this->Form->input('owner', array("type"=>"hidden"));
		?>		

		<label for="PmProjectPriority">Priorité</label>
		<select name="data[PmProject][priority]" id="PmProjectPriority" />
		<?		
		#echo $this->Form->input('priority');		
		priorite($this->Form->value('PmProject.priority'));
		?>		
		</select>		
		</td>
		<td>
<?
	echo "<label>Statut</label></lable><select name=\"data[PmProject][status]\" id=\"PmProjectStatus\" />";
	statut_sel($this->Form->value('PmProject.status'));
	echo "</select></td></tr>";
echo "</table>";
		
		echo $this->Form->input('name', array('style'=>'width: 800px'));
		echo $this->Form->input('description', array("type"=>"textarea", "cols"=>"100", "rows"=>"15"));
		echo $this->Form->input('url_dev', array('style'=>'width: 800px'));
		echo $this->Form->input('url_prod', array('style'=>'width: 800px'));
		echo $this->Form->input('budget', array('style'=>'width: 80px'));
		echo $this->Form->input('hourly_fee', array('style'=>'width: 80px'));
		echo $this->Form->input('published', array("type"=>"hidden"));
?>
<table>
	<tr>
		<td>
		<?
		echo $this->Form->input('upload_max');
		echo "</td><td>";
		echo $this->Form->input('phase_set');
		echo "</td><td>";
#		echo $this->Form->input('type');
	?>
	<select id="PmProjectType" name="data[PmProject][type]" size="2">
	<option value="0"<? if ($this->Form->value('PmProject.type')=="0") { echo " selected";} ?>>prof</option>
	<option value="p"<? if ($this->Form->value('PmProject.type')=="p") { echo " selected";} ?>>perso</option>
	</select>
	</td></tr></table>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voir', true), array('action' => 'view/'. $this->Form->value('PmProject.id'))); ?></li>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PmProject.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PmProject.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('action' => 'index'));?></li>
	</ul>
</div>
