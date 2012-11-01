<?php
#Configure::write('debug', 2);
#cake title of the page
$id= $_SERVER["REQUEST_URI"]; 
$id=preg_replace("/^.*\//","",$id);
$sql="
SELECT * FROM pm_members, pm_projects, pm_notes
WHERE 
pm_notes.project=pm_projects.id AND 
pm_notes.owner=pm_members.id AND 
pm_notes.id=".$id;
#echo $sql; exit;
#do and check sql
$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}
$name=mysql_result($sql,0,'name');
$this->pageTitle = 'Modifier tâche: #' .$id ." " .$name; 
$pid=mysql_result($sql,0,'project');
#echo $pid; exit;
?>
<div class="pmNotes form">
<?php echo $this->Form->create('PmNote');?>
	<fieldset>
 		<legend><?php __('Edit Pm Note'); ?></legend>
	<?php
		echo $this->Form->input('id',array("type"=>"hidden"));
				#echo $this->Form->input('id', array("type"=>"hidden", "value"=>$id));

		#echo $this->Form->input('project');
		echo $this->Form->input('project', array("type"=>"hidden", "value"=>$pid));
		echo "Projet: ";
		projet_nom_print($pid);
/*echo $pid."<label>Projet</label><select id=\"PmNoteProject\" name=\"data[PmNote][project]\">";
projets_sel($pid);
echo "</select>";
*/
echo " " .$this->Html->link(__('View project', true), array('action' => '../pm_projects/view/'. $pid));

		
		echo $this->Form->input('owner',array("type"=>"hidden"));
		#echo $this->Form->value('owner');
		echo "<br/>Responsable: ";
		membres($this->Form->value('owner'));
		echo $this->Form->input('topic',array("type"=>"hidden"));
		echo $this->Form->input('subject', array("style"=>"width: 600px;"));
		echo $this->Form->input('description', array("style"=>"width: 600px; height: 400px;"));
		echo $this->Form->input('date');
		echo $this->Form->input('published',array("type"=>"hidden"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PmNote.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PmNote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Notes', true), array('action' => 'index'));?></li>
	</ul>
</div>
