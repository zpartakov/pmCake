<?php
$this->pageTitle="CMS Fred Radeff - chercher";
echo $form->create("Patchadmin",array('action' => 'search'));
echo $form->input("q", array('label' => 'Search for'));
echo $form->end("Search"); 
?>
<div class="patchadmins index">
<h2><?php __('Patchadmins');?></h2>
<?php  echo "Total: " .count($results);?>
<table cellpadding="0" cellspacing="0">
<tr>
	<th>id</th>
	<th>server</th>
	<th>type</th>
	<th>contenu</th>
	<th>url</th>
	<th>db</th>
	<th>version</th>
</tr>
<?php
$i = 0;
foreach ($results as $post):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
<tr<?php echo $class;?>>
<a name="<?php echo $post['patchadmins']['id']; ?>"></a>
    <td>
        <?php 
        $lid=$post['patchadmins']['id'];
        echo $html->link(__($lid, true), array('action'=>'edit', $post['patchadmins']['id']));
        ?>
    </td>
	<td>
		<?php echo $post['patchadmins']['server']; ?>
	</td>
	<td>
		<?php echo $post['patchadmins']['type']; 
		$goodversion="SELECT * FROM types WHERE lib LIKE '" .$post['patchadmins']['type'] ."'";
		$goodversion=mysql_query($goodversion);
		$goodversion=mysql_result($goodversion, 0, 'version');
		?>
	</td>
	<td>
		<?php echo $post['patchadmins']['contenu']; ?>
	</td>
	<td>
        <ul>
        <?php 
        echo "<li><a href=\"" .$post['patchadmins']['url'] ."\">" .$post['patchadmins']['url'] ."</a></li>"; 
        echo "<li><a href=\"" .$post['patchadmins']['urladmin'] ."\"><span class=\"admin\">" .$post['patchadmins']['urladmin'] ."</span></a></li>"; 
        ?>
        </ul>
    </td>
    <td>
	   <?php echo $post['patchadmins']['db']; ?>
	</td>
	<td>
		<?php 
		if($goodversion==$post['patchadmins']['version']) {
			echo " <span style=\"background-color: #6DFF93\">";
		} else {
		    /*
             * is there any upgrade to be done?
             */
        echo "<a href=\"upgrade?cms_id=" .$post['patchadmins']['id'] ."&type_id=" .$post['patchadmins']['type'] ."\">";
        echo $html->image('icons/upgrade.png', array("alt"=>"Upgrade","title"=>"Upgrade","width"=>"25","height"=>"25"));
        echo "</a>&nbsp;";
		}
		echo $post['patchadmins']['version']; 
		if($goodversion==$post['patchadmins']['version']) {
			echo "</span>";
		}
		?>
	</td>
</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Patchadmin', true), array('action'=>'add')); ?></li>
	</ul>
</div>
