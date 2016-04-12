<style>
html > body > div#container > div#content > div.cms.form > form#CmEditForm > fieldset > div.input.text > input, html > body > div#container > div#content > div.cms.form > form#CmEditForm > fieldset > div.input.textarea > textarea#CmRem {
width: 50%;
}
</style>
<?php
/**
* @version        $Id: edit.ctp v1.0 25.02.2010 09:49:08 CET $
* www.unige.ch
* webmaster@unige.ch

*/

$sql="SELECT * FROM types ORDER BY lib";
$sqlq=mysql_query($sql);
if(!$sqlq) {
	echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
}

?>    
<div class="cms form">
<?php echo $form->create('Cm');?>
	<fieldset>
 		<legend><?php __('Edit Cm');?></legend>
	<?php
		echo $form->input('id');
echo "<select id=\"CmTypeId\" name=\"data[Cm][type_id]\"><option value=\"\">--- Type ---</option>";	
/* Type */
$i=0;
while($i<mysql_num_rows($sqlq)){
	echo "<option value=\"" .mysql_result($sqlq,$i,'id')."\"";
		if($form->value('type_id')==mysql_result($sqlq,$i,'id')) {
			echo " selected";
		}
	echo ">" .mysql_result($sqlq,$i,'lib');
	echo "</option>";
	$i++;
	}			
echo "</select>";
		echo $form->input('version');

		echo $form->input('server');
		echo $form->input('url');
		echo $form->input('path');
		echo $form->input('login');
		echo $form->input('email');
		echo $form->input('expires');
		echo $form->input('date');
		echo $form->input('rem');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Cm.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Cm.id'))); ?></li>
		<li><?php echo $html->link(__('List Cms', true), array('action'=>'index'));?></li>
		<li><?php 	e($html->link($html->image('toolbar/edit-copy.png', array('alt' => 'Copier', 'title' => 'Copier')), array('action'=>'copier',$idaction), array('escape' => false)));?></li>
		
	</ul>
</div>
