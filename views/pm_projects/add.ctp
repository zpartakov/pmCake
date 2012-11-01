<?php
App::import('Lib', 'functions'); //imports app/libs/functions

?>
<div class="pmProjects form">
<form id="PmProjectAddForm" method="GET" action="/pmcake/pm_projects/ajout" accept-charset="utf-8">
<?php #echo $this->Form->create('PmProject');?>
	<fieldset>
 		<legend><?php __('Ajouter projet'); ?></legend>
		<table>
	<?php
		echo $this->Form->input('owner', array('type'=>'hidden', 'value'=>'3'));
		#echo $this->Form->input('priority');
		#echo $this->Form->input('status');
		?>
		<tr>
		<td>
		<label for="PmTaskPriority">Client</label>
		<select name="data[organization]" id="organization" />
		<?
			clients_sel(3);
		?>
		</select>
		</td>
		<td>
		<label for="PmTaskPriority">Priorité</label>
		<select name="data[priority]" id="priority" />
		<?		
		#echo $this->Form->input('priority');		
		priorite(3);
		?>		
		</select>
		</td><td>
		<label for="status">Statut</label>
		<select name="data[status]" id="status" />
		<?		
		if($_GET['tasktype']=="incub") { //incubateur - dreams
			$options = 17;			
		} elseif($_GET['tasktype']=="ref") { //references
			$options = 22;
		} else {
			$options = 3;
		}
		statut_sel($options);
		#echo $this->Form->input('status');
		?>
		</select>
		</td></tr><tr><td colspan="2">
		<?
		echo $this->Form->input('name', array('label'=>'Titre', "style"=>"width: 600px"));
		?>
		</td></tr><tr><td colspan="2">
		<?
		echo $this->Form->input('description', array("type"=>"textarea", "cols"=>"80", "rows"=>"5"));
		?>
		</td></tr><tr><td>
		<?
		echo $this->Form->input('url_dev');
		?>
		</td><td>
		<?
		echo $this->Form->input('url_prod');
		?>
</td><td>
		<label for="type">Type</label>
		<select name="data[type]" id="type" size="2" />
		<option value="0">UniGE</option>
		<option value="p">Perso</option>
		</select>
		<?
#		echo $this->Form->input('type');
		echo $this->Form->input('published', array('type'=>'hidden', 'value'=>'1'));
		echo $this->Form->input('upload_max', array('type'=>'hidden', 'value'=>'9920000'));
		echo $this->Form->input('phase_set', array('type'=>'hidden', 'value'=>'0'));
	?>
	</td></tr>
	</table>
	</fieldset>
	<div class="enregistrer">
		<?php echo $this->Form->end(__('Enregistrer', true));?>
	</div>
</div>
