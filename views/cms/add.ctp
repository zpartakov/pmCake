<?php
/**
* @version        $Id: add.ctp v1.0 13.04.2010 11:09:57 CEST $
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
 		<legend><?php __('Add Cm');?></legend>
	<?php
		#echo $form->input('type_id');
?>		
<div class="input select"><label for="CmTypeId">Type</label>
<select name="data[Cm][type_id]" id="CmTypeId">
<option value="">--- Type ---</option>
<?

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
?>
</div>
<?
#echo $form->input('server');
?>
<div class="input select"><label for="CmTypeId">server</label>
<select name="data[Cm][server]" id="CmServer">
<option>cms.unige.ch</option>
<option>www.unige.ch</option>
<option>asso-etud.unige.ch</option>
<option>blogs.unige.ch</option>
<option>lnxweb.unige.ch</option>
<option>weblocal.unige.ch</option>
</select>
</div>
<?
		
		echo $form->input('url');
		echo $form->input('path',array('value'=>'/w3/'));
		echo $form->input('login');
		echo $form->input('email');
		echo $form->input('expires');
		echo $form->input('date');
		echo $form->input('version');
		echo $form->input('rem');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Cms', true), array('action'=>'index'));?></li>
	</ul>
</div>
