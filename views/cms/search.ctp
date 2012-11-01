<?
$this->pageTitle="CMS - chercher";
?>
<div class="cms index">
<h2><?php __('Cms');?></h2>
<?
if($_GET['https']) { //if https searched
echo "<h3>Applications sécurisées (https)</h3>";
}
?>
<h3><a href="http://cms.unige.ch/tools/metalogins/cms/patchjoomla">patchjoomla</a></h3>

<a href="http://weblocal.unige.ch/dinf/ntice/wiki/doku.php?id=applicatifs:start" target="_blank">Voir aussi wiki ntice</a>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Cm', true), array('action'=>'add')); ?></li>
	</ul>
</div>

<?
   echo $form->create("Cm",array('action' => 'search'));
    echo $form->input("q", array('label' => 'Search for'));
 #echo $form->button('Reset the Form', array('type'=>'reset'));



$sql="SELECT * FROM types ORDER BY lib";
$sqlq=mysql_query($sql);
if(!$sqlq) {
	echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
}

     ?>
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
<?
    echo $form->end("Search"); 
echo "<em>Total " .count($results) ."</em>";
?>

<table cellpadding="0" cellspacing="0">
<tr>
	<th>id</th>
	<th>type_id</th>
	<th>server</th>
	<th>path</th>
	<th>login</th>
	<th>email</th>
	<th>expires</th>
	<th>date</th>
	<th>version</th>
	<th>rem</th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
#determine version courante
$type_id=$results[0]['cms']['type_id'];
if($type_id) {
$versionc="SELECT version FROM types WHERE id=".$type_id;
$sqlqv=mysql_query($versionc);
if(!$sqlqv) {
	echo "sql error: " .$sqlqv ."<br>" .mysql_error(); exit;
}
$versionc=mysql_result($sqlqv,0,'version');
}
#echo $versionc; exit;
#echo "<pre>".nl2br(print_r(var_dump($results)))."</pre>"; //tests
$ecrireatous="";
foreach ($results as $cm):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $cm['cms']['id']; ?>
		</td>
		<td>
			<?php 


$i=0;
while($i<mysql_num_rows($sqlq)){
	#echo mysql_result($sqlq,$i,'lib') ."<br>";
	$idtemp1=mysql_result($sqlq,$i,'id'); $idtemp2=$cm['cms']['type_id'];
	if($idtemp1==$idtemp2) {	
		echo mysql_result($sqlq,$i,'lib');
	}
	$i++;
	}
			
			?>
		</td>
		<td>
			<?php echo $cm['cms']['server']; ?>
		</td>

		<td>
			<?php  
			echo "<a href=\"" .$cm['cms']['url'] ."\" target=\"_blank\" title=\"go2 website\">" .$cm['cms']['path'] ."</a>";
			?>
		</td>
		<td>
			<?php echo $cm['cms']['login']; ?>
		</td>
		<td>

						<?php 
						echo "<a href=\"mailto:" .$cm['cms']['email'] ."\">" .substr($cm['cms']['email'],0,20) ."</a>"; 
						$ecrireatous.=$cm['cms']['email'].";";
						
						?>

		</td>
		<td>
			<?php echo $cm['cms']['expires']; ?>
		</td>
		<td>
			<?php echo $cm['cms']['date']; ?>
		</td>
		<td>
			<?php 
			if($versionc!=$cm['cms']['version']) {

			/*special for Joomla15 and Joomla16*/


if($cm['cms']['version']=="1"&&$versionc!="16") {

				echo " <span style=\"background-color: #FF6D6D\">";
			}
			} else {
				echo " <span style=\"background-color: #6DFF93\">";
			}
			
			echo $cm['cms']['version']; 
			
			if($versionc!=$cm['cms']['version']) {
				echo "</span>";
			}#6DFF93
			?>
		</td>
				<td>
				<a href="/tools/metalogins/cms/view/<? echo $cm['cms']['id']; ?>" class="tooltip">
				<!--<?php echo substr($cm['cms']['rem'],0,20); ?><em><span></span><?php echo $cm['cms']['rem']; ?></em></a>-->
				<?php echo $cm['cms']['rem']; ?>
				
				
							<?php 
							if(preg_match("/httpsok/",$cm['cms']['rem'])) { //https protected
							echo "&nbsp;<span style=\"float: right\">" .$html->image('s_passwd.png') ."</span>";
							}elseif(preg_match("/nohttps/",$cm['cms']['rem'])) { //https protected
							echo "&nbsp;<span style=\"float: right\">" .$html->image('cadenascasse.jpg', array('style'=>'width: 20px')) ."</span>";
							}
							
							 ?>

		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $cm['cms']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $cm['cms']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $cm['cms']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cm['cms']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<a href="mailto:?subject=mise à jour / patch / upgrade &bcc=<?php echo $ecrireatous; ?>">Ecrire à tous</a>
</div>

<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Cm', true), array('action'=>'add')); ?></li>
	</ul>
</div>
<?
#echo phpinfo(); //tests
?>
