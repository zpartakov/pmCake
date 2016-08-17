<?php
$this->pageTitle="CMS - chercher";
?>
<div class="cms index">
<h2><?php __('Cms');?></h2>
<?php
if($_GET['https']) { //if https searched
echo "<h3>Applications sécurisées (https)</h3>";
}
?>
<p>
<!-- <a href="http://cms.unige.ch/tools/metalogins/cms/patchjoomla">patchjoomla</a>
 |  -->
 <a href="patchlime">patchlime</a>
 |
<a href="http://weblocal.unige.ch/dinf/ntice/wiki/doku.php?id=applicatifs:start" target="_blank">Voir aussi wiki ntice</a>
</p>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Cm', true), array('action'=>'add')); ?></li>
	</ul>
</div>
<?php
   echo $form->create("Cm",array('action' => 'search'));
    echo $form->input("q", array('label' => 'Search for'));
    $sql="SELECT * FROM types ORDER BY lib";
    $sqlq=mysql_query($sql);
    if(!$sqlq) {
    	echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
    }
     ?>
 <select name="data[Cm][letype]" id="CmLetype">
    <option value="" selected>--- Type ---</option>
    <?php
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
<?php
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
$ecrireatous="";
foreach ($results as $cm):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
<tr<?php echo $class;?>>
	<td>
		<a name="<?php echo $cm['cms']['id']; ?>"></a><?php echo $cm['cms']['id']; ?>
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

		if($type_id==22) {
echo "<p style=\"font-size: smaller; font-style: italic\"><a href=\"" .$cm['cms']['url'] ."index.php/tools/required/upgrade\" target=\"_blank\" title=\"upgrade\">upgrade</a></p>";
}

		?>
	</td>
	<td>
		<?php echo $cm['cms']['login']; ?>
	</td>
	<td>
		<?php
		echo "<a href=\"mailto:" .$cm['cms']['email'] ."\">" .substr($cm['cms']['email'],0,20) ."</a>";

		#if($versionc!=$cm['cms']['version']) {
    $zecurrentmail=$cm['cms']['email'];
		if(!preg_match("/$zecurrentmail/",$ecrireatous)){
		$ecrireatous.=$cm['cms']['email'].";";
		#$ecrireatous.=$cm['cms']['email']."<br>";
		}
		?>
	</td>
	<td>
		<?php echo $cm['cms']['expires']; ?>
	</td>
	<td>
		<?php echo $cm['cms']['date']; ?>
	</td>
	<td style="width: 100px">
		<?php
		if($versionc!=$cm['cms']['version']) {
			/*
			 * is there any upgrade to be done?
			 */
		echo "<a href=\"upgrade?cms_id=" .$cm['cms']['id'] ."&type_id=" .$cm['cms']['type_id'] ."\">";
        echo $html->image('icons/upgrade.png', array("alt"=>"Upgrade","title"=>"Upgrade","width"=>"25","height"=>"25"));
        echo "</a>&nbsp;";
			/*special for Joomla15 and Joomla16*/
           if($cm['cms']['version']=="1"&&$versionc!="16") {
				echo " <span style=\"background-color: #FF6D6D\">";
			}
		} else { //no upgrade
			echo " <span style=\"background-color: #6DFF93\">";
		}
		echo $cm['cms']['version'];
		if($versionc!=$cm['cms']['version']) {
			echo "</span>";
		}
		?>
	</td>
	<td>
		<a href="/tools/metalogins/cms/view/<? echo $cm['cms']['id']; ?>" class="tooltip">
		<?php echo nl2br($cm['cms']['rem']); ?>
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
<?php endforeach;

$letype=$_POST['data']['Cm']['letype'];
if($letype){
$sql="SELECT * FROM types WHERE id=".$letype;
$sqlq=mysql_query($sql);
if(!$sqlq) {
	echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
}
$letype=mysql_result($sqlq,0,'lib');
$version=mysql_result($sqlq,0,'version');
$letype=$letype ." (" .$version .")";
$url=mysql_result($sqlq,0,'url');
}

$body="
Bonjour,%0D%0A%0D%0A
Une mise à jour de sécurité " .$letype ." est disponible, merci de faire la mise à jour de votre/vos site/s " .$letype .".%0D%0A%0D%0A
" .$url;
?>
</table>
<?php
//$ecrireatous=preg_replace("/,/",";",$ecrireatous);
$ecrireatous=preg_replace("/;/",",",$ecrireatous);
$ecrireatous=preg_replace("/,$/","",$ecrireatous);
//echo "<hr>" .$ecrireatous ."<hr>"; //tests
 ?>
<a href="mailto:?subject=mise à jour / patch / upgrade <?php echo $letype;?>&bcc=<?php echo $ecrireatous; ?>'&body=<?php echo $body;?>">Ecrire à tous</a>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Cm', true), array('action'=>'add')); ?></li>
	</ul>
</div>
