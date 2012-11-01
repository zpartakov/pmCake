<?
$deplacer = $_GET['deplacer'];
$id = $_GET['id'];
echo "Deplacer: " .$deplacer;
echo "<br>id: " .$id;
$sql="SELECT * FROM pm_menus WHERE id=".$id;
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); }

echo "<br>Catégorie: " .mysql_result($sql,$i,'parent') ."<hr>";
$rang_actu=mysql_result($sql,$i,'rank');

	echo "<br>Menu à déplacer; #" .mysql_result($sql,$i,'id') ." - " .mysql_result($sql,$i,'lib') ." rang: " .$rang_actu;
	
	$sql="SELECT * FROM pm_menus WHERE id=".$deplacer;
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); }
$rang_dest=mysql_result($sql,$i,'rank');
	echo "<br>Menu à déplacer sur ; #" .mysql_result($sql,$i,'id') ." - " .mysql_result($sql,$i,'lib');
	echo "<hr>";
	$sql="UPDATE pm_menus SET rank=rank-1 WHERE rank >".$rang_actu ." AND rank <=" .$rang_dest;
	$sql.="<br>";
	$sql.="UPDATE pm_menus SET rank=" $rang_dest ." WHERE id=".$id;

echo $sql;
exit;
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); }

$i=0;
while($i<mysql_num_rows($sql)){
	echo "<br>" .mysql_result($sql,$i,'id');
	$i++;
	}



/*
UPDATE const_skills SET seq = seq - 1 WHERE seq > 2 AND seq <= 4;
UPDATE const_skills SET seq  = 4 WHERE id = 2;*/
?>
