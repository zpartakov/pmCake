<?
$this->pageTitle="CMS";
?>
<div class="cms index">
<h2><?php __('Cms');?></h2> 
<h3><a href="/intranet/pmcake/cms/patchjoomla">patchjoomla</a></h3>
<a href="http://weblocal.unige.ch/dinf/ntice/wiki/doku.php?id=applicatifs:start" target="_blank">Voir aussi wiki ntice</a>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Cm', true), array('action'=>'add')); ?></li>
	</ul>
</div>



    <!-- begin search form -->
<script>
function vide_recherche(id) {
	document.getElementById(id).value="";
	}
</script>
 <table>
	 <tr>
		 <td>
<?php
$sql="SELECT * FROM types ORDER BY lib";
$sqlq=mysql_query($sql);
if(!$sqlq) {
	echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
}



   echo $form->create("Cm",array('action' => 'search'));
    echo $form->input("q", array('label' => 'Search for'));
     #echo $form->select('letype',$options);
     ?>
     </td><td>
     <select name="data[Cm][letype]" id="CmLetype">
     <option value="" selected>--- Type ---</option>

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
?>
</select>

</td>
<td>
<input type="button" value="Vider" onClick="javascript:vide_recherche('CmQ')" />
</td><td>

     <?
 #echo $form->button('Reset the Form', array('type'=>'reset'));

    echo $form->end("Search"); 

    ?>
</td>
</tr>
</table>
<!-- end search form -->    



<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));

?></p>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('type_id');?></th>
	<th><?php echo $paginator->sort('server');?></th>
	<th><?php echo $paginator->sort('path');?></th>
	<th><?php echo $paginator->sort('login');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<!--<th><?php echo $paginator->sort('expires');?></th>-->
	<th><?php echo $paginator->sort('date');?></th>
	<th><?php echo $paginator->sort('version');?></th>
	<th><?php echo $paginator->sort('rem');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($cms as $cm):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $cm['Cm']['id']; ?>
		</td>
		<td>
<?php 
/* Type */
$i=0;
while($i<mysql_num_rows($sqlq)){
	#echo mysql_result($sqlq,$i,'lib') ."<br>";
	$idtemp1=mysql_result($sqlq,$i,'id'); $idtemp2=$cm['Cm']['type_id'];
	if($idtemp1==$idtemp2) {	
		echo mysql_result($sqlq,$i,'lib');
	}
	$i++;
	}			
?>
		</td>
		<td>
			<?php echo $cm['Cm']['server']; ?>
		</td>

		<td>
			<?php  
			echo "<a href=\"" .$cm['Cm']['url'] ."\" target=\"_blank\" title=\"go2 website\">" .$cm['Cm']['path'] ."</a>";
			?>
		</td>
		<td>
			<?php echo $cm['Cm']['login']; ?>
		</td>
		<td>
			<?php echo "<a href=\"mailto:" .$cm['Cm']['email'] ."\">" .substr($cm['Cm']['email'],0,20) ."</a>"; ?>
		</td>
		<!--<td>
			<?php echo $cm['Cm']['expires']; ?>
		</td>-->
		<td>
			<?php 
			
$timestamp = strtotime($cm['Cm']['date']);
/*
 * some tool to print nicely the date
 * see ./app_controller for def locale
http://php.net/manual/fr/function.strftime.php
#e("Créé le ".strftime("%d %B %Y à %H:%M", $timestamp));
#e("Créé le ".strftime("%d %b %Y à %H:%M", $timestamp));
* e(strftime("%d-%m-%Y %H:%M", $timestamp));
*/
e(strftime("%d&nbsp;%b&nbsp;%Y&nbsp;%H:%M", $timestamp));

			#echo $cm['Cm']['date']; ?>
		</td>
		<td>
			<?php echo $cm['Cm']['version']; ?>
		</td>
		<td>				
		    <?php echo substr($cm['Cm']['rem'],0,20); ?>
			<?php 
    			if(preg_match("/httpsok/",$cm['cms']['rem'])) {
    			  //https protected
    			echo "&nbsp;<span style=\"float: right\">" .$html->image('s_passwd.png') ."</span>";
			} 
			?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $cm['Cm']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $cm['Cm']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $cm['Cm']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cm['Cm']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Cm', true), array('action'=>'add')); ?></li>
	</ul>
</div>
