		<script type="text/javascript">
		function SelectAll(id)
		{
			var e = document.getElementById("MailatorClientName");
			var strUser = e.options[e.selectedIndex].value;
			document.getElementById("MailatorMailfrom").value=strUser;
			/*alert(strUser);*/

		}
		</script>

		<div class="mailators form">
<?php echo $this->Form->create('Mailator');?>
<style>
label {vertical-align: top; margin-right: 1em}
</style>
	<fieldset>
		<legend><?php __('Add Mailator'); ?></legend>
	<?php
	
	App::import('Lib', 'functions'); //imports app/libs/functions
	
	$largeur=600;
	$hauteur=100;
	$lestyle='text-align: right;';
	$lestyleM='text-align: left; width: ' .$largeur .'px';
	$lestyleL='text-align: left; width: ' .$largeur .'px; height: ' .$hauteur .'px';
	$lestyleXL='padding-left: 1em; padding-top: 1em; text-align: left; width: ' .$largeur .'px; height: ' .($hauteur+500) .'px';
	
	//extraction des emails
	if($_GET['pm_task_id']) {
		$pm_task_id=$_GET['pm_task_id'];
		$pm_project_id=$_GET['pm_project_id'];
		
		$lesmails=task_description_return($pm_task_id);
		$matches = array(); //create array
		// this regex handles more email address formats like a+b@google.com.sg, and the i makes it case insensitive
		$pattern = '/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
		
		// preg_match_all returns an associative array
		preg_match_all($pattern, $lesmails, $matches);
/*		$size=count($matches);
		$mailto="";
		for ($i=0; $i <= $size; $i++) {
			$mailto.=$matches[0][$i] . ",";
		}*/
		// the data you want is in $matches[0], dump it with var_export() to see it
		//var_export($matches[0]);
		
		$mailto=$matches[0][0];
		$mailto=preg_replace("/,*$/","",$mailto);

		
		
		//echo $mailto; exit;
	$titre=utf8_decode(projet_nom_return($pm_project_id) ." : " .task_nom_return($pm_task_id));
	$message= BEGINMAIL ."\n\n" .task_description_return($pm_task_id) ."\n" .ENDMAIL;
	} else {
		//echo $this->element('sql_dump');
		
	}
	

	
	
		echo $this->Form->input('pm_organization_id', array('type'=>'hidden', 'value'=>0));
		
		echo $this->Form->input('pm_project_id', array('type'=>'hidden', 'value'=>$pm_project_id));
		echo $this->Form->input('pm_task_id', array('type'=>'hidden', 'value'=>$pm_task_id));
		echo $this->Form->input('statut_id', array('type'=>'hidden', 'value'=>0));
		echo $this->Form->input('date', array('type'=>'hidden', 'value'=>date("Y-m-d H:i:s")));
		
		echo "<table><tr>";
		echo "<td>";
		$options=array(PRIVATEEMAIL=>PRIVATEEMAIL,PROFEMAIL=>PROFEMAIL);
				//print_r($mailfrom); exit;
		echo $this->Form->input('mailfrom', array('value'=>PRIVATEEMAIL));
		
		
		//$attributes = array('legend'=>false);
		echo $this->Form->select('client_name', $options, PRIVATEEMAIL, array('onchange'=> 'SelectAll("client_name")'));
		
		echo "</td><td>";
		echo $this->Form->input('mailto', array('style'=>$lestyleM, 'value'=>$mailto));
		echo "</td><td>";
		echo $this->Form->input('mailcc', array('style'=>$lestyle));
		echo "</td><td>";
		echo $this->Form->input('mailbcc', array('style'=>$lestyle));
		echo "</td>";
		echo "</tr></table>";
		
		echo $this->Form->input('subject', array('style'=>'width: ' .$largeur .'px', 'value'=>$titre));
		//echo $this->Form->input('subject', array('style'=>'width: ' .$largeur .'px', 'value'=>projet_nom_return($project_id)));
		echo $this->Form->input('body', array('style'=>$lestyleXL, 'value'=>$message));
		echo $this->Form->input('attachment', array('type'=>'hidden'));
		echo $this->Form->input('rem', array('style'=>$lestyleL));
	?>
	</fieldset>
	<div style="margin-left: 15em">
		<?php echo $this->Form->end(__('Envoyer le mail et sauvegarder', true));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mailators', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pm Organizations', true), array('controller' => 'pm_organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Organization', true), array('controller' => 'pm_organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('controller' => 'pm_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('controller' => 'pm_tasks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuts', true), array('controller' => 'statuts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Statut', true), array('controller' => 'statuts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mail Answers', true), array('controller' => 'mail_answers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mail Answer', true), array('controller' => 'mail_answers', 'action' => 'add')); ?> </li>
	</ul>
</div>