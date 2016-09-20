 <style>
.localli {
width: 160px;
position: absolute;
top: 50px;
left: 80%;
background-color: lightgrey;
padding: 2px;
font-size: 9px;
}
.verypetit {
	font-size: 9px;
}

.blink {
  animation: blink-animation 1s steps(5, start) infinite;
  -webkit-animation: blink-animation 1s steps(5, start) infinite;
}
.passed {
	font-style: italic;
	opacity: 0.5;
}
@keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
@-webkit-keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
</style>
<!-- dynamic menu/navigation -->
<?php
			App::import('Lib', 'functions'); //imports app/libs/functions
?>
<?php
/*dynamic cake navigation */
#echo "<h1>Menus</h1>";
//exit;
#$sqlM="SELECT * FROM pm_menus ORDER BY parent,rank";
$currentMonth=date("m");
$currentDay=date("d");
$currentMonth=preg_replace("/^0/","",$currentMonth);
$nextMonth=$currentMonth+1;
//echo $currentMonth; exit;

$sqlM="
SELECT * FROM contacts
WHERE birthdayMonth LIKE '".$currentMonth."'
OR birthdayMonth LIKE '".$nextMonth."'
ORDER BY birthdayMonth, birthdayDay";

//echo "<pre>".$sqlM."</pre>";
//exit;

$sqlM=mysql_query($sqlM);
//print_r($sqlM);
if(!$sqlM) { echo "SQL error: " .mysql_error(); }
$i=0;

//echo "#".mysql_num_rows($sqlM); exit;
if(mysql_num_rows($sqlM)>0) {
	echo '<div class="localli">';
	echo "<h3>Anniversaires</h3>";
while($i<mysql_num_rows($sqlM)){
	$id=mysql_result($sqlM,$i,'id');
	$mail=mysql_result($sqlM,$i,'EmailAddress');
	$lib=mysql_result($sqlM,$i,'FirstName') ." " .mysql_result($sqlM,$i,'LastName') .": " .mysql_result($sqlM,$i,'birthdayDay') ."/" .mysql_result($sqlM,$i,'birthdayMonth') ."/" .mysql_result($sqlM,$i,'birthdayYear');
	//echo $id;
	//echo "<a href=\"/intranet/pmcake/contacts/view/".$id ."\">" .$lib ."</a>";

	if($currentDay==mysql_result($sqlM,$i,'birthdayDay')&&$currentMonth==mysql_result($sqlM,$i,'birthdayMonth')){
		$laclasse="blink";
	} elseif($currentDay>mysql_result($sqlM,$i,'birthdayDay')&&$currentMonth==mysql_result($sqlM,$i,'birthdayMonth')) {
		$laclasse="passed";

	} else {
		$laclasse="";
	}
	echo "<span class=\"" .$laclasse ."\">";
	echo "<a class=\"verypetit\" href=\"mailto:" .$mail ."\">".$lib ."</a>";

		echo "</span>";
echo "<br />";
		$i++;
	}
echo "</div>";
}
