  <div style="display: block; position: relative; top: -45px; right: 18px;"><small><a onclick="montre_ou_cache();"><?php echo $html->image('icons/open_tab.gif');?></a></small></div>
	<h3>Total tâches en cours: #<? echo mysql_num_rows($sql);?></h3>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<th>project</th>
			<th>priority</th>
			<th>status</th>
		<!--	<th>owner</th>-->
			<th>name</th>
			<th>due_date</th>
			<th>milestone</th>
			<th class="actions" colspan="2"><?php __('Actions');?></th>
		</tr>
		<?
		while($i<mysql_num_rows($sql)){
					$class = null;
				if (intval($i/2) == ($i/2)) {
					$class = ' class="altrow"';
				}
						echo "<tr" .$class .">";
			echo "<td>";
			if(mysql_result($sql,$i,'proj.type')=="p") {
					perso_list();
			}
			?>
			<?php echo $this->Html->link(mysql_result($sql,$i,'proj.name'), array('controller' => 'pm_projects', 'action' => 'view', mysql_result($sql,$i,'proj.id'))); ?>
			<?
			echo "</td>";
			echo "<td>";
			prioriteView(mysql_result($sql,$i,'priority'));
			echo "</td>";
			echo "<td>";
			statut(mysql_result($sql,$i,'status'));
			echo  "</td>";
			#echo "<td>" .mysql_result($sql,$i,'owner') ."</td>";
			echo "<td>" .$this->Html->link(__(mysql_result($sql,$i,'name'), true), array('action' => 'view', mysql_result($sql,$i,'id')));
			echo "</td>";
			echo "<td>";
			dateSQL2fr(mysql_result($sql,$i,'due_date'));
			echo "</td>";
			echo "<td>" .mysql_result($sql,$i,'milestone') ."</td>";
			echo "<td>";
		?>

<!-- ################ PUSH DELAYS  ################  -->
	<form action="repousser" method="get" name="<? echo mysql_result($sql,$i,'id');?>">
	<input type="hidden" name="identifiant" value="<? echo mysql_result($sql,$i,'id');?>" />
	<input type='image' src="/pmcake/img/icons/bullet_arrow.gif" alt="Déplacer à demain" title="Déplacer à demain" name="demain" value="demain" />
        <select name="ajout" class="micro" size="1" onchange="task_goto_URL(<? echo mysql_result($sql,$i,'id');?>,this.value)">
<? delais(); ?>
        </select>
      <!-- ############ task ok ######### -->
 	&nbsp;<input style="background: orange" type="checkbox" title="OK?" onchange="task_ok(<? echo mysql_result($sql,$i,'id');?>,this.value)" />
      </form>

	<?
	echo "</td>";
/* ACTIONS BEGIN */
	echo "<td>";

			$idaction=mysql_result($sql,$i,'id');
			e($html->link($html->image('toolbar/loupe.png', array('alt' => 'Voir')), array('action'=>'view', $idaction), array('alt' => 'Voir', 'title' => 'Voir', 'escape' => false)));
			e($html->link($html->image('toolbar/editor.png', array('alt' => 'Modifier')), array('action'=>'edit', $idaction), array('alt' => 'Modifier', 'title' => 'Modifier', 'escape' => false)));
			$delete_text = isset($delete_text) ? $delete_text : ___d('alaxos', 'do you really want to delete this item ?', true);
			e($html->link($html->image('toolbar/drop.png', array('alt' => __d('alaxos', 'delete', true))), array('action' => 'delete', $idaction), array('alt' => ___d('alaxos', 'delete', true), 'title' => ___d('alaxos', 'delete', true), 'escape' => false), $delete_text));
	echo "</td>";
/* ACTIONS END */

	echo "</tr>";
	$i++;
}
?>
</table>
</div>
