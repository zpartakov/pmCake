<!-- menu/navigation -->
<?php
			App::import('Lib', 'functions'); //imports app/libs/functions
?>
<div id="cakephp-global-navigation">
<ul id="menuDeroulant">
<!-- ########################### MAIN MENU ######################## -->
<li style="width: 50px;">
<?php
			echo $html->image("home/ghome.png", array('url' => '/pm_tasks/onfield', 'alt' => 'Accueil / En cours', 'title' => 'Accueil / En cours', 'style'=>'width: 30px; position: absolute; top: 1px; left: 13px;'));
?>
		<ul class="sousMenu">
		<li><a href="/akademia/intranet/accounting/" target="_blank">Comptes</a></li>
		<li><?php echo $html->link('Rendez-vous', '/#Meetings'); ?></li>
		<li><?php echo $html->link('Discussions', '/#Discussions'); ?></li>
		<li><?php echo $html->link('Notes', '/#Notes'); ?></li>
		<li><?php echo $html->link('Rapports', '/#Rapports'); ?></li>
		<li><?php echo $html->link('Image Gallery', 'http://' .$_SERVER["HTTP_HOST"] .'/images/'); ?></li>
		<li><?php echo $html->link('Aide', '/pages/help'); ?></li>
		</ul>
</li>
<li style="width: 30px; padding-left: 20px;">
<?php 
echo $html->image("/img/toolbar/add.png", array('url' => '/pm_tasks/add', 'alt' => 'Ajouter une nouvelle tâche', 'title' => 'Ajouter une nouvelle tâche', 'style'=>'width: 20px; position: absolute; top: 5px; left: 13px;'));
?>
</li>

<!-- ########################### PROJECTS ######################## -->

<li><?php echo $html->link('Projets', '/projects/?status=active'); ?>
		<ul class="sousMenu">
		<li><?php echo $html->link('Inactifs', '/projects/?status=inactive'); ?></li>
		<li><?php echo $html->link('Tous', '/projects/all'); ?></li>
		<li><?php echo $html->link('Nouveau', '/pm_projects/add'); ?></li>
		<li><?php echo $html->link('FAQs', '/faqs/'); ?></li>
		<li><?php echo $html->link('Utilisateurs', '/users/'); ?></li>
	</ul>
</li>

<!-- ########################### TASKS, DREAMS, REFERENCES ######################## -->

	<li><?php echo $html->link(__('Tâches', true), '/pm_tasks/'); ?>
		<ul class="sousMenu">
		<!-- ########################### NEW TASK ######################## -->

	        <li><?php echo $html->link(__('Nouvelle tâche', true), '/pm_tasks/add'); ?></li>
			<li><?php echo $html->link(__('OnField', true), '/pm_tasks/onfield'); ?></li>
			<li><?php echo $html->link(__('Terminé', true), '/pm_tasks/?tasktype=finished'); ?></li>
			<div style="height:3px"><li><hr /></li></div>
			<li><?php echo $html->link(__('Incubateur', true), '/pm_tasks/incubateur'); ?></li>
			<li><?php echo $html->link(__('Incubateur par date', true), '/pm_tasks/incubateur?tridate=1'); ?></li>
			
			<li><?php echo $html->link(__('Incubateur old', true), '/pm_tasks/?tasktype=incub'); ?></li>
			<li><?php echo $html->link(__('- nouvelle idée', true), '/pm_tasks/add?tasktype=incub'); ?></li>
			<div style="height:3px"><li><hr /></li></div>
			<li><?php echo $html->link(__('Références', true), '/pm_tasks/?tasktype=ref'); ?></li>
			<li><?php echo $html->link(__('- nouvelle référence', true), '/pm_tasks/add?tasktype=ref'); ?></li>
			<div style="height:3px"><li><hr /></li></div>
			<li><?php echo $html->link('Documents', '/zefiles/'); ?></li>
	<li>
		<? 
		echo $html->image("filetypes/arc.gif", array('url' => '/pm_tasks/archive', 'alt' => 'Archiver', 'title' => 'Archiver'));
		?>
		&nbsp;Archiver
	</li>
		</ul>
	</li>

<!-- ########################### TOOLS ######################## -->
<li style="padding-left: 4px">Outils
<?php #echo $html->link(__('Tools', true), '/pages/tools'); ?>
		<ul class="sousMenu">
		<li><?php echo $html->link('Signets', '/pm_bookmarks/'); ?></li>
		<li><?php echo $html->link('Fonctions', '/fonctions/'); ?></li>
		<li><?php echo $html->link('PasswdGen', '/users/generate_random_passwd'); ?></li>
		<li><?php echo $html->link('Short URLs', 'http://www.akademia.ch/shorturls/admin/shortUrls'); ?></li>
		
		<li><?php echo $html->link('pmCake', '/pm_projects/view/66', array('title'=>'Gestion de ce logiciel')); ?></li>
		
		<li><?php echo $html->link('Heures aujourd\'hui', '/pm_tasks/hours_today'); ?></li>
		<li><?php echo $html->link('Membres', '/pm_members/'); ?></li>
		<li><?php echo $html->link('Clients', '/pm_organizations/'); ?></li>
		<li><?php echo $html->link('Rapports', '/rapports/'); ?></li>
		<li><?php echo $html->link('Config Temps travail', '/pm_times/'); ?></li>
		<li><?php 
		echo $html->link('Calendrier Tâches', '/pm_tasks/calendrier?mois='.preg_replace("/^0/","",date("m"))."&amp;annee=".date("Y")."&amp;bt_month_less=#".date("Ymd")); ?></li>
		<li><?php echo $html->link('Préférences', '/preferences/'); ?></li>
		<li><?php echo $html->link('Délais', '/pm_delays/'); ?></li>
		<li><?php echo $html->link('Pics', '/img/'); ?></li>
		<li><?php echo $html->link('Import DB', '/pages/importdb'); ?></li>
		<li><?php echo $html->link('Menus', '/pm_menus/'); ?></li>
		<li><?php echo $html->link('Migrations', 'http://weblocal.unige.ch/dinf/ntice/migrations/lesmigrations/', array ('target' => '_blank')); ?></li>
		<li><?php echo $html->link('Chronologies', '/chronologies/'); ?></li>
		<li><?php echo $html->link('Acqui', '/joboffers/'); ?></li>

		
	</ul>
</li>

<!-- ########################### UNIX / SERVERS / WEB / CMS ######################## -->
<li><span class="web">Web</span>
		<ul class="sousMenu">
		<li><?php echo $html->link('Externes', '/externes/'); ?></li>
		<li><?php echo $html->link('Logins obsolètes', '/obsoletelogins/'); ?></li>		
		<li><?php echo $html->link('CMS', '/cms/'); ?>	
		<ul><!-- CMS 3e niveau-->
			<li><?php echo $html->link('LimeSurvey', '/cms/search?letype=3'); ?></a></li>
			<li><?php echo $html->link('Export csv', '/cms/csv'); ?></li>
			<li><?php echo $html->link('Export4Wiki', '/cms/export'); ?></li>
			<li><?php echo $html->link('Cake', '/cms/search?letype=12'); ?></li>
			<li><?php echo $html->link('Joomla! (tous)', '/cms/search?letype=1'); ?></li>
			<li><?php echo $html->link('Joomla! 2.5', '/cms/search?letype=20'); ?></li>
			<li><?php echo $html->link('Dokuwiki', '/cms/search?letype=5'); ?></li>
			<li><?php echo $html->link('@upgrade Joomla! 1.5', '/cms/mailjoomla'); ?></li>
			<li><?php echo $html->link('Versions Joomla!', '/cms/versionjoomla'); ?></li>
			<li><?php echo $html->link('https', '/cms/search?https=1'); ?></li>
			<li><?php echo $html->link('Types', '/types/'); ?></li>
			<li><?php echo $html->link('Servers', '/servers/'); ?></li>
			<li><?php echo $html->link('Lenya', 'http://www.unige.ch/webtools/gry/webtools/lenyaUsers.gsp', array("target"=>"_blank")); ?></li>
			</ul>
		</li>
		<li><?php echo $html->link('Mes sites', '/patchadmins/'); ?></li>
		<li><?php echo $html->link('patch joomla', '/patchadmins/joomlapatch'); ?></li>
	
	</ul>
</li>

<!-- ########################### HOURS ######################## -->

	<li style="width: 50px;">
	<?php 
			echo $html->image("icons/chronometre.png", array('url' => '/pm_tasks/hours_today', 'alt' => 'Heures aujourd\'hui', 'title' => 'Heures aujourd\'hui', 'style'=>'width: 27px'));
			echo " "; 


	?>
		<ul class="sousMenu">
			<li><?php 
			$date=date("Y-m-d", mktime (0, 0, 0, date("m"), date("d"), date("Y")));
task_total_today($date);
			?></li>
			<li><a href="<? echo CHEMIN;?>pm_tasks_times/add?projectid=38&amp;idtache=227">helpdesk</a></li>
			<li><a href="<? echo CHEMIN;?>pm_tasks_times/add?projectid=38&amp;idtache=2248">création site</a></li>
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
<!-- ########################### Mail + calendar ######################## -->
		<li style="width: 50px">
		<a href="/intranet/pmcake/contacts">
			<? 
			echo $html->image("mail.jpg", array('alt' => 'Contacts', 'title' => 'Contacts', 'style'=>'width: 28px'));
			?>
		</a>
			<ul class="sousMenu">
				<li><?php echo $html->link('Print contacts', '/contacts/imprimer'); ?></li>
			<li><?php 
			echo $html->image("icons/csv1.png", array('url' => '/contacts/export', 'alt' => 'Exporter tous les contacts au format CSV', 'title' => 'Exporter tous les contacts au format CSV', 'style'=>'width: 27px'));
			?>
			</li>
			</ul>

	</li>

<!-- ########################### WebCalendar ######################## -->

		<!--<li><?php echo $html->link('Calendrier', '/full_calendar/'); ?></li>-->
		
	<li style="width: 50px;">
		
		<?php
		if(preg_match("/\/edit\//", $_GET["url"])){
	//echo phpinfo(); exit;	
//edit_entry.php?year=2011&month=11&day=01&name=bla&id=123
$webcal=preg_replace("/^.*\//","",$_GET["url"]);
$webcal="edit_entry.php?year=".date("Y")."&month=".date("m")."&day=".date("d") ."&name=" .$webcal; 
//"bla&id=123

} else {
	$webcal="";
}
		?>
		
		<a href="/webcalendar/<?php echo $webcal;?>" target="_blank">
		<? 
		echo $html->image("calendrier.jpg", array('alt' => 'WebCalendar', 'title' => 'WebCalendar', 'style'=>'width: 28px'));
		//, array('url' => 'http://www.bloglines.com/', 'alt' => 'Flux RSS', 'title' => 'Flux RSS', 'style'=>'width: 23px'));
		?>
	</a>
			<ul class="sousMenu">
				<li><?php echo $html->link('Webcalendar mois', '/events/calendrier'); ?></li>
				<li><?php echo $html->link('Webcalendar semaine', '/events/week'); ?></li>
				<li><?php echo $html->link('Webcalendar année', '/events/year'); ?></li>
				<li><?php echo $html->link('Webcalendar events', '/events/'); ?></li>
				<li><?php echo $html->link('Webcalendar add', '/events/add'); ?></li>
				<li><?php echo $html->link('webcal_entries', '/webcal_entries/'); ?></li>
				
				<li><?php echo $html->link('Catégories', '/webcal_categories/'); ?></li>
				<li><?php echo $html->link('webcal_entry_categories', '/webcal_entry_categories/'); ?></li>
				<li><?php echo $html->link('Répétition', '/webcal_entry_repeats/'); ?></li>
				<li><?php echo $html->link('Rappels', '/webcal_reminders/'); ?></li>
								<li><?php echo $html->link("Type d'événements", '/event_types/'); ?></li>

				
			</ul>
	
	</li>


<!-- ########################### RSS ######################## -->

	<li style="width: 50px;">
		<? 
		//echo $html->image("rss.jpg", array('url' => 'http://www.netvibes.com/', 'alt' => 'Flux RSS', 'title' => 'Flux RSS', 'style'=>'width: 23px'));
echo $html->image("rss.jpg", array('url' => 'http://129.194.18.197/rss/', 'alt' => 'Flux RSS', 'title' => 'Flux RSS', 'style'=>'width: 23px'));
		?>
	</li>
	

<!-- ########################### WEATHER FORECAST ######################## -->
	<!--
<li style="width: 50px;">
	<?php 
			echo $html->image("meteo.gif", array('url' => '/pages/meteo', 'alt' => 'Météo', 'title' => 'Météo', 'style'=>'width: 27px'));
	?>
</li>-->
</ul>	  
</div>
