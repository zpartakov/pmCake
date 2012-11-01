<?php
App::import('Lib', 'functions'); //imports app/libs/functions
#cake title of the page
$this->pageTitle = 'Ajouter tâche'; 
//test if coming from task = new entry

if(preg_match("/pm_projects\/view/",$_SERVER["HTTP_REFERER"])) {
	$tid=$_SERVER["HTTP_REFERER"];
	$tid=preg_replace("/^.*\//","",$tid);
	#echo $tid; exit;
	} else {
		$tid="";
	}
?>
<div class="pmTasks form">
<?php #echo $this->Form->create('PmTask');?>

<form id="PmTaskAddForm" name="etDForm" method="GET" action="/pmcake/pm_tasks/ajout" accept-charset="utf-8">
	<fieldset>
 		<legend><?php echo $this->pageTitle; ?></legend>
 		<label>Projet</label>
<table>
	<tr>
	<td>
		<?php
		echo "<select id=\"PmTaskProject\" name=\"data[PmTask][project]\">";
		projets_sel($tid);
		echo "</select>";
		?>
	</td>
	</tr>
	<tr>
	<td>	
	Parent<br/>
	<?php 
	echo "<select name=\"data[PmTask][parent_id]\" id=\"parent_id\">";
	 parent_tasks($tid,'0');
	echo "</select>";
	?>
	</td>
	<td>
		<label for="PmTaskPriority">Priorité</label>
		<select name="data[PmTask][priority]" id="PmTaskPriority" />
		<?		
		#echo $this->Form->input('priority');		
		priorite();
		?>		
		</select>
	</td>
	<td>
		<label for="PmTaskStatus">Statut</label>
		<select name="data[PmTask][status]" id="PmTaskStatus" />
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
	</td>
	</tr>
	<tr>
		<td colspan="3">
			<?		
			echo $this->Form->input('owner',array('type'=>'hidden', 'value'=>'3'));
			echo $this->Form->input('assigned_to',array('type'=>'hidden', 'value'=>'3'));
			echo $this->Form->input('name', array('label'=>'Titre', "style"=>"width: 600px"));
			?>
		</td>
	</tr>
	<tr>
		<td colspan="3">
		<?
		echo $this->Form->input('description',array("type"=>"textarea", "cols"=>"90", "rows"=>"10"));
		?>
		</td>
	</tr>
	<tr>
		<td>
		<?
		echo $this->Form->input('start_date', array('value'=>date('Y-m-d')));
		//display a nice calendar
		$sd=$this->Form->value('start_date');
			echo "<div class=\"calendrierjs\"><script type=\"text/javascript\">
			Calendar.setup({ inputField:\"sel1\", button:\"trigger_a\" });
			</script>
			<script language=\"JavaScript\">
				new tcal ({
					// form name
					'formname': 'etDForm',
					// input name
					'controlname': 'start_date',
					'selected': '" .$sd ."',
					'today' : '" .$sd ."'
				});
				</script></div>
			";
		?>
	</td>
	<td colspan="2">
		<?
		echo $this->Form->input('due_date', array('value'=>date('Y-m-d')));
		$sd=$this->Form->value('due_date');
		echo "<div class=\"calendrierjs\"><script type=\"text/javascript\">
		Calendar.setup({ inputField:\"sel1\", button:\"trigger_a\" });
		</script>
		<script language=\"JavaScript\">
			new tcal ({
				// form name
				'formname': 'etDForm',
				// input name
				'controlname': 'due_date',
				'selected': '" .$sd ."',
				'today' : '" .$sd ."'
			});
			</script></div>
		";
	?>
	</td>
</tr>
<tr>
	<td colspan=\"3\">
	<?
		echo $this->Form->input('estimated_time',array("type"=>"hidden"));
		?>
	<?
		echo $this->Form->input('actual_time',array("type"=>"hidden"));
	?>	
	<?
		echo $this->Form->input('comments',array("type"=>"textarea", "cols"=>"90", "rows"=>"10"));
		echo $this->Form->input('completion',array("type"=>"hidden","value"=>0));
		echo $this->Form->input('assigned',array("type"=>"hidden","value"=>3));
		echo $this->Form->input('published',array("type"=>"hidden","value"=>1));
		echo $this->Form->input('parent_phase',array("type"=>"hidden","value"=>0));
		echo $this->Form->input('complete_date',array("type"=>"hidden"));
		echo $this->Form->input('service',array("type"=>"hidden","value"=>0));
		echo $this->Form->input('milestone',array("type"=>"hidden","value"=>0));
		echo $this->Form->input('PmTasksTime',array("type"=>"hidden","value"=>0));
	?>
	</td>
</tr>
</table>
	</fieldset>
	<div class="enregistrer">
<?php echo $this->Form->end(__('Enregistrer', true));?>
</div>
</div>

