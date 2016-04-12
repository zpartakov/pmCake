<style>
th {
background-color: lightyellow;
}
th, td {
border: thin solid;
text-align: right;
padding: 5px;
}
</style><?php
App::import('Lib', 'functions'); //imports app/libs/functions
//Configure::write('debug', 2);
#cake title of the page
$this->pageTitle = 'Total heures projet: ' .$pmProject['PmProject']['name']; 

$fee_hour=$_GET['fee_hour'];
$pid=$_GET['pid'];
echo "<h1>".$this->pageTitle." #".$pid;
echo projet_nom_return($pid);
echo "</h1>";

Detail_heures($pid,$fee_hour);

?>