<!-- dynamic menu/navigation -->
<?php
			App::import('Lib', 'functions'); //imports app/libs/functions
?><div id="cakephp-global-navigation">
<ul id="menuDeroulant">
<?php
/*dynamic cake navigation */
#echo "<h1>Menus</h1>"; 
//exit;
#$sqlM="SELECT * FROM pm_menus ORDER BY parent,rank";
$sqlM="SELECT * FROM pm_menus WHERE parent=0 ORDER BY rank";

$sqlM=mysql_query($sqlM);
if(!$sqlM) { echo "SQL error: " .mysql_error(); }

$i=0;
while($i<mysql_num_rows($sqlM)){
	echo "<li style=\"" .mysql_result($sqlM,$i,"style_li") ."\">";
	if(strlen(mysql_result($sqlM,$i,'img'))>0) { //image
				echo $html->image(mysql_result($sqlM,$i,'img'), 
				array('url' => mysql_result($sqlM,$i,"url"), 
				'alt' => mysql_result($sqlM,$i,"lib"), 
				'title' => mysql_result($sqlM,$i,"lib"), 'style'=>mysql_result($sqlM,$i,"style_img")));
	}elseif(preg_match("/\?/",mysql_result($sqlM,$i,"lib"))) { //link with variable
		//special case=calendrier
		if(preg_match("/calendrier/",mysql_result($sqlM,$i,"lib"))){
					echo $html->link(mysql_result($sqlM,$i,"lib"), '/pm_tasks/calendrier?mois='.preg_replace("/^0/","",date("m"))."&amp;annee=".date("Y")."&amp;bt_month_less=#".date("Ymd"));
		} else {//special css - eg outils
			$lib=preg_replace("/\?.*$/","",mysql_result($sqlM,$i,"lib"));
			
			$class=preg_replace("/^.*\?class=/","",mysql_result($sqlM,$i,"lib"));
			echo "<span class=\"" .$class ."\">" .$lib ."</span>";
		}
	} else { //normal link	
		echo $html->link(__(mysql_result($sqlM,$i,'lib'), true), mysql_result($sqlM,$i,"url"));
	}
	
	/*sous-menus niveau 2 begin */
	
	$sqlSsMenus="SELECT * FROM pm_menus WHERE parent =".mysql_result($sqlM,$i,"id") ." ORDER BY rank";
	#echo $sqlSsMenus;
	$sqlSsMenus=mysql_query($sqlSsMenus);
	if(!$sqlSsMenus) { echo "SQL error: " .mysql_error(); }
	if(mysql_num_rows($sqlSsMenus)>0) {
		echo '<ul class="sousMenu">';

	$i2=0;
	while($i2<mysql_num_rows($sqlSsMenus)){
		echo "<li>";
		if(preg_match("/\?/",mysql_result($sqlSsMenus,$i2,"url"))&&!preg_match("/^http/",mysql_result($sqlSsMenus,$i2,"url"))) { //link with variable
			echo "<a href=\"" .CHEMIN. mysql_result($sqlSsMenus,$i2,"url") ."\">"
			.mysql_result($sqlSsMenus,$i2,'lib') ."</a>";

		} else {
			echo $html->link(__(mysql_result($sqlSsMenus,$i2,'lib'), true), mysql_result($sqlSsMenus,$i2,"url"));
		}
		
		/* sous-menus niveau 3 */
		/*
		$sqlSsMenus3="SELECT * FROM pm_menus WHERE parent =".mysql_result($sqlSsMenus,$i2,"id") ." ORDER BY rank";
			//echo $sqlSsMenus3;
			
			$sqlSsMenus3=mysql_query($sqlSsMenus3);
			if(!$sqlSsMenus3) { echo "SQL error: " .mysql_error(); }

			
			if(mysql_num_rows($sqlSsMenus3)>0) {
				echo "sous-menuxxx";
				echo '\r<ul class="sousMenu3">';
		
			$i3=0;
			while($i3<mysql_num_rows($sqlSsMenus3)){
				echo "<li>";
				if(preg_match("/\?/",mysql_result($sqlSsMenus3,$i3,"url"))&&!preg_match("/^http/",mysql_result($sqlSsMenus3,$i3,"url"))) { //link with variable
					echo "<a href=\"" .CHEMIN. mysql_result($sqlSsMenus3,$i3,"url") ."\">"
					.mysql_result($sqlSsMenus3,$i3,'lib') ."</a>";
		
				} else {
					echo $html->link(__(mysql_result($sqlSsMenus3,$i3,'lib'), true), mysql_result($sqlSsMenus3,$i3,"url"));
				}
				
				
				
				echo "</li>";
				
				$i3++;
				}
				echo "</ul>\n";
			}
			*/
		
		
		echo "</li>";
		
		if(mysql_result($sqlSsMenus,$i2,'line_after')=="1") { //put a line after that item
		
			echo "		<div style=\"height:3px\"><li><hr /></li></div>";
		}
		
		
		$i2++;
		}
		echo "</ul>";
	}
	
	/*sous-menus end */
	
	
	
	
	
	
	echo "</li>\n";
	$i++;
	}

?>
<li style="width: 200px; margin-left: -50px;"><?php 
			$date=date("Y-m-d", mktime (0, 0, 0, date("m"), date("d"), date("Y")));
task_total_today($date);?></li>
</ul>	  
</div>
