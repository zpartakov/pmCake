<?php
//Configure::write('debug', 2);
App::import('Lib', 'functions'); //imports app/libs/functions

#cake title of the page
$this->pageTitle = 'Ajouter note'; 
//test if coming from task = new entry

if(preg_match("/pm_projects\/view/",$_SERVER["HTTP_REFERER"])) {
	$tid=$_SERVER["HTTP_REFERER"];
	$tid=preg_replace("/^.*\//","",$tid);
	#echo $tid; exit;
	}
?>
<div class="pmNotes form">
<?php echo $this->Form->create('PmNote');?>
	<fieldset class="largeur_moyenne">
 		<legend><?php __('Add Pm Note'); ?></legend>
 		
	<?php
#		echo $this->Form->input('project');
echo "<select id=\"PmNoteProject\" name=\"data[PmNote][project]\">";
projets_sel($tid);
echo "</select>";
		echo $this->Form->input('owner');
		echo $this->Form->input('topic');
		echo $this->Form->input('subject');
		echo $this->Form->input('description');
		echo $this->Form->input('date');
		echo $this->Form->input('published');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pm Notes', true), array('action' => 'index'));?></li>
	</ul>
</div>
