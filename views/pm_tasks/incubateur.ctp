yo<?php 
/* a special view for incubateur - dreams
 * 
 * 
 * SELECT `PmTask`.`id`, `PmTask`.`parent_id`, `PmTask`.`project`, `PmTask`.`priority`, `PmTask`.`status`, `PmTask`.`owner`, `PmTask`.`assigned_to`, `PmTask`.`name`, `PmTask`.`description`, `PmTask`.`start_date`, `PmTask`.`due_date`, `PmTask`.`estimated_time`, `PmTask`.`actual_time`, `PmTask`.`comments`, `PmTask`.`completion`, `PmTask`.`created`, `PmTask`.`modified`, `PmTask`.`assigned`, `PmTask`.`published`, `PmTask`.`parent_phase`, `PmTask`.`complete_date`, `PmTask`.`service`, `PmTask`.`milestone`, `PmTask`.`mod_date`, `PmProject`.`id`, `PmProject`.`organization`, `PmProject`.`owner`, `PmProject`.`priority`, `PmProject`.`status`, `PmProject`.`name`, `PmProject`.`description`, `PmProject`.`url_dev`, `PmProject`.`url_prod`, `PmProject`.`created`, `PmProject`.`modified`, `PmProject`.`published`, `PmProject`.`upload_max`, `PmProject`.`phase_set`, `PmProject`.`type`, `PmMember`.`id`, `PmMember`.`organization`, `PmMember`.`login`, `PmMember`.`password`, `PmMember`.`name`, `PmMember`.`title`, `PmMember`.`email_work`, `PmMember`.`email_home`, `PmMember`.`phone_work`, `PmMember`.`phone_home`, `PmMember`.`mobile`, `PmMember`.`fax`, `PmMember`.`comments`, `PmMember`.`profil`, `PmMember`.`created`, `PmMember`.`logout_time`, `PmMember`.`last_page`, `PmMember`.`timezone` FROM `pm_tasks` AS `PmTask` LEFT JOIN `pm_projects` AS `PmProject` ON (`PmTask`.`project` = `PmProject`.`id`) LEFT JOIN `pm_members` AS `PmMember` ON (`PmTask`.`owner` = `PmMember`.`id`) WHERE `PmTask`.`status`=17 ORDER BY `due_date` asc LIMIT 100
 * 
 */
	App::import('Lib', 'functions'); //imports app/libs/functions

	$this->pageTitle = 'GTD ' .dateen2fr(date("D, d-M-Y")); 
$datenow = date("Y-m-d");
//echo phpinfo();
if(!$_GET['tridate']==1) {
	$sql="
	SELECT * FROM pm_tasks AS tas, pm_projects as proj 
	WHERE tas.status = 17
    AND tas.project=proj.id 
	ORDER BY proj.type, proj.name, tas.due_date ASC
	LIMIT 0, 3000";
	
	?>			<li style="float: right"><?php echo $html->link(__('Incubateur par date', true), '/pm_tasks/incubateur?tridate=1'); ?></li>
	<?php 
} else {
	//echo "yo";
	$sql="
	SELECT * FROM pm_tasks AS tas, pm_projects as proj 
	WHERE tas.status = 17
    AND tas.project=proj.id 
	ORDER BY tas.due_date ASC
	LIMIT 0, 3000";
	?>			<li style="float: right"><?php echo $html->link(__('Incubateur', true), '/pm_tasks/incubateur'); ?></li>
	<?php 
}

if($_GET['global_repousser']){
	//echo "repousser: ";
	//echo $_GET['global_repousser'];
	$sql="
	SELECT * FROM pm_tasks AS tas, pm_projects as proj 
	WHERE tas.status = 17
    AND tas.project=proj.id 
	ORDER BY tas.due_date ASC
	LIMIT 0, 3000";
	$result=mysql_query($sql);
	$i=0;
	while($i<mysql_num_rows($result)){
	$sql2="
	UPDATE pm_tasks 
	SET due_date=ADDDATE(due_date, INTERVAL "  .$_GET['global_repousser'] ." DAY)
	WHERE id = " .mysql_result($result, $i, 'id');
	//echo $sql2 ."<br>";
	mysql_query($sql2);
	$i++;
	}
	/* redirect after upgrade */
	?>
	<script type="text/javascript">
	<!--
	window.location = "incubateur?tridate=1"
	//-->
	</script>
	<?php 
	exit;
	
}
	//echo nl2br($sql); exit;
		#echo nl2br($sql)."<br>"; //tests
	$sql=mysql_query($sql);
	if(!$sql) {
		echo "SQL error: " .mysql_error(); exit;
	}
	$i=0;
	
	push_all_delays();
	
echo '<h3>Incubateur: #'.mysql_num_rows($sql).'</h3>
			<table cellpadding="0" cellspacing="0">';
	while($i<mysql_num_rows($sql)){
					$class = null;
		if (intval($i/2) == ($i/2)) {
			$class = ' class="altrow"';
		} 		
		
		if(mysql_result($sql,$i,'status')==5 ) {
/* special classes for statuts wait */
			$class = ' class="wait"';
			} 
		

		
		
		echo "<tr" .$class;
	echo " id=\"tr" .mysql_result($sql,$i,'id')."\"";
	echo  ">";
	//experimental not working (select all and apply a common action
	#echo '<input id="User1Id" class="model_id" type="checkbox" value="1" name="data[User][1][id]">';
	#echo '<td><input id="PmTask' .mysql_result($sql,$i,'id').'Id" class="cb-element" type="checkbox" value="' .mysql_result($sql,$i,'id').'" name="data[PmTask][' .mysql_result($sql,$i,'id').'][id]"></td>';
	echo "<td>";
	if(mysql_result($sql,$i,'proj.type')=="p") {
		perso_list();
	}
	echo '<a href="/intranet/pmcake/pm_projects/view/'.mysql_result($sql,$i,'proj.id').'">'.mysql_result($sql,$i,'proj.name').'</a>';
	echo "</td>";
	echo "<td>";
	prioriteView(mysql_result($sql,$i,'priority'));
	echo "</td>";
	echo "<td>";
	statut(mysql_result($sql,$i,'status'));
	echo  "</td>";
	
	#echo "<td>" .mysql_result($sql,$i,'owner') ."</td>";
#	echo '<td><a href="' .CHEMIN .'pm_tasks/edit/'.mysql_result($sql,$i,'id').'" onmouseOver="task_detail('.mysql_result($sql,$i,'id').')">'.mysql_result($sql,$i,'name') .'</a>';
	echo '<td><a href="' .CHEMIN .'pm_tasks/edit/'.mysql_result($sql,$i,'id').'" class="tooltip">'.mysql_result($sql,$i,'name');
if(strlen(	mysql_result($sql,$i,'description'))>0) {
	echo '<em><span></span>'.nl2br(mysql_result($sql,$i,'description')).'</em>';
}
	echo '</a>';
	echo "</td>";
#	echo '<div id="detail'.mysql_result($sql,$i,'id').'" style="display: none; position: relative; top: 3px; left: 10px">'.nl2br(mysql_result($sql,$i,'description')) .'</div>';
	echo "<td>";
	dateSQL2fr(mysql_result($sql,$i,'due_date'));
	echo "<br /><em style=\"font-size: smaller\">(";
	dateSQL2frSmall(mysql_result($sql,$i,'start_date'));
	echo ")</em> ";
	echo "</td>";
	echo "<td>" .mysql_result($sql,$i,'milestone') ."</td>";
	echo "<td>";
	################ BEGIN PUSH DELAYS  ################
	$idc=mysql_result($sql,$i,'id');
	push_delays($idc,1);
	echo '<td><a href="/intranet/pmcake/pm_tasks/view/' .$idc .'" alt="Voir" title="Voir"><img src="/intranet/pmcake/img/toolbar/loupe.png" alt="Voir" /></a><a href="/intranet/pmcake/pm_tasks/edit/' .$idc .'" alt="Modifier" title="Modifier"><img src="/intranet/pmcake/img/toolbar/editor.png" alt="Modifier" /></a><a href="/intranet/pmcake/pm_tasks/delete/' .$idc .'" alt="Effacer" title="Effacer" onclick="return confirm(\'Voulez-vous vraiment effacer cet élément ?\');"><img src="/intranet/pmcake/img/toolbar/drop.png" alt="effacer" /></a></td></tr>';
	 ################ END PUSH DELAYS  ################  
	/* ACTIONS END */
		echo "</tr>\n\n";
		$i++;
	}
	echo '</table>';
		
		
?>