<!-- menu/navigation -->
<div id="cakephp-global-navigation">
<ul id="menuDeroulant">
<!-- ########################### ON FIELD ######################## -->

<li style="width: 50px;">
	<?php 
#			echo $html->image("home/case.jpeg", array('url' => '/pm_tasks/onfield', 'alt' => 'En cours', 'title' => 'En cours', 'style'=>'width: 30px'));
#			echo $html->image("home/igloo.png", array('url' => '/pm_tasks/onfield', 'alt' => 'En cours', 'title' => 'En cours', 'style'=>'width: 30px'));
			echo $html->image("home/ghome.png", array('url' => '/pm_tasks/onfield', 'alt' => 'Accueil / En cours', 'title' => 'Accueil / En cours', 'style'=>'width: 30px; position: absolute; top: 1px; left: 13px;'));
	?>
</li>
<!-- ########################### MAIN MENU ######################## -->
<!--
<li><?php echo $html->link('Accueil', '/'); ?>
		<ul class="sousMenu">
		<li><?php echo $html->link('Rendez-vous', '/#Meetings'); ?></li>
		<li><?php echo $html->link('Discussions', '/#Discussions'); ?></li>
		<li><?php echo $html->link('Notes', '/#Notes'); ?></li>
		<li><?php echo $html->link('Rapports', '/#Rapports'); ?></li>
	</ul>
</li>
-->
<!-- ########################### PROJECTS ######################## -->

<li><?php echo $html->link('Projets', '/projects/?status=active'); ?>
		<ul class="sousMenu">
		<li><?php echo $html->link('Inactifs', '/projects/?status=inactive'); ?></li>
		<li><?php echo $html->link('Tous', '/projects/all'); ?></li>
		<li><?php echo $html->link('Nouveau', '/pm_projects/add'); ?></li>
	</ul>
</li>

<!-- ########################### TASKS, DREAMS, REFERENCES ######################## -->

	<li><?php echo $html->link(__('Tâches', true), '/pm_tasks/'); ?>
		<ul class="sousMenu">
			<li><?php echo $html->link(__('OnField', true), '/pm_tasks/onfield'); ?></li>
			<li><?php echo $html->link(__('Terminé', true), '/pm_tasks/?tasktype=finished'); ?></li>
			<div style="height:3px"><li><hr /></li></div>
			<li><?php echo $html->link(__('Incubateur', true), '/pm_tasks/?tasktype=incub'); ?></li>
			<li><?php echo $html->link(__('- nouvelle idée', true), '/pm_tasks/add?tasktype=incub'); ?></li>
			<div style="height:3px"><li><hr /></li></div>
			<li><?php echo $html->link(__('Références', true), '/pm_tasks/?tasktype=ref'); ?></li>
			<li><?php echo $html->link(__('- nouvelle référence', true), '/pm_tasks/add?tasktype=ref'); ?></li>
			<div style="height:3px"><li><hr /></li></div>
			<li><?php echo $html->link('Documents', '/zefiles/'); ?></li>

		</ul>
	</li>

<!-- ########################### TOOLS ######################## -->
<li><span class="outils">Outils</span>
<?php #echo $html->link(__('Tools', true), '/pages/tools'); ?>
		<ul class="sousMenu">
		<li><?php echo $html->link('pmCake', '/pm_projects/view/66', array('title'=>'Gestion de ce logiciel')); ?></li>
		<li><?php echo $html->link('Heures aujourd\'hui', '/pm_tasks/hours_today'); ?></li>
		<li><?php echo $html->link('Membres', '/pm_members/'); ?></li>
		<li><?php echo $html->link('Clients', '/pm_organizations/'); ?></li>
		<li><?php echo $html->link('Rapports', '/rapports/'); ?></li>
		<li><?php echo $html->link('Config Temps travail', '/pm_times/'); ?></li>
		<li><?php 
		echo $html->link('Calendrier Tâches', '/pm_tasks/calendrier?mois='.preg_replace("/^0/","",date("m"))."&amp;annee=".date("Y")."&amp;bt_month_less=#".date("Ymd")); ?></li>
		<li><? echo $html->link(__('WebCal', true), '/pages/gcal');?></li>
		<li><?php echo $html->link('Signets', '/pm_bookmarks/'); ?></li>
		<li><?php echo $html->link('Préférences', '/preferences/'); ?></li>
		<li><?php echo $html->link('Délais', '/pm_delays/'); ?></li>
		<li><?php echo $html->link('Pics', '/img/'); ?></li>
		<li><?php echo $html->link('Import DB', '/pages/importdb'); ?></li>
		
	</ul>
</li>
<!-- ########################### NEW TASK ######################## -->

	<li style="width: 50px;">
		<? 
		echo $html->image("toolbar/add.png", array('url' => '/pm_tasks/add', 'alt' => 'Nouvelle tâche', 'title' => 'Nouvelle tâche'));
		?>
	</li>
<!-- ########################### HOURS ######################## -->

	<li style="width: 50px;">
	<?php 
			echo $html->image("icons/chronometre.png", array('url' => '/pm_tasks/hours_today', 'alt' => 'Heures aujourd\'hui', 'title' => 'Heures aujourd\'hui', 'style'=>'width: 27px'));
	?>
		<ul class="sousMenu">
			<li><a href="<? echo CHEMIN;?>pm_tasks_times/add?projectid=38&amp;idtache=227">helpdesk</a></li>
			<li><a href="<? echo CHEMIN;?>pm_tasks_times/add?projectid=46&amp;idtache=459">divers</a></li>
			<li><a href="<? echo CHEMIN;?>pm_tasks_times/add?projectid=16&amp;idtache=241">forms</a></li>
			<li><a href="<? echo CHEMIN;?>pm_tasks_times/add?projectid=18&amp;idtache=429">forums</a></li>
			<li><a href="<? echo CHEMIN;?>pm_tasks_times/add?projectid=32&amp;idtache=309">paiements</a></li>
			<li><a href="<? echo CHEMIN;?>pm_tasks_times/add?projectid=35&amp;idtache=536">serveurs</a></li>
			<li><a href="<? echo CHEMIN;?>pm_tasks_times/add?projectid=29&amp;idtache=167">webmaster</a><hr /></li>

					<li><?php echo $html->link('Export Heures CSV', '/pm_tasks/hours_report'); ?></li>
					<li><?php echo $html->link('Graphique Heures', '/pm_tasks/hours_report_graph'); ?></li>
					<li><?php echo $html->link('test jpgraph', '/pm_tasks/graph'); ?></li>
		<li><?php echo $html->link('Gérer Heures', '/pm_tasks_times'); ?></li>

		</ul>
</li>
<!-- ########################### HELP ######################## -->

	<li style="width: 50px;">
		<? 
		echo $html->image("aide.png", array('url' => '/pages/help', 'alt' => 'Aide', 'title' => 'Aide', 'style'=>'width: 27px'));
		?>
	</li>
<!-- ########################### WEATHER FORECAST ######################## -->
<li style="width: 50px;">
	<?php 
			echo $html->image("meteo.gif", array('url' => '/pages/meteo', 'alt' => 'Météo', 'title' => 'Météo', 'style'=>'width: 27px'));
	?>
</li>
</ul>	  
</div>
