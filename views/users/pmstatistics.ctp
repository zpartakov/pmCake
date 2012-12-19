<?php 

/*
 * a page to get some statistic stuf about pmcake usage
 */
$this->pageTitle = "Statistiques sur l'utilisation de ce logiciel";
$sql="SELECT count(id) AS total, url FROM `pm_urls_logs` group by url order by count(id) desc";
$result=mysql_query($sql);
$row=0;
?>
<h1><?php echo $this->pageTitle;?></h1>
<h2>URL les plus demandés par ordre croissant, au minimum 10</h2>
<?php
while($row<mysql_num_rows($result)){
	if(mysql_result($result, $row, 'total')<10){
		$row=mysql_num_rows($result);
	}
	echo mysql_result($result, $row, 'total');
	echo "# ";
	echo mysql_result($result, $row, 'url');
	echo "<br/>";
	$row++;
}

?>
