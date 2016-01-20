<?php
/*
 * push delays for certain checked tasks
 */

$delai=$_GET['pousserdelais'];

/*?identifiant=7249&ajout=&checkboxlist=7264&checkboxlist=2544&pousserdelais=1*/
$string=$_SERVER["QUERY_STRING"];
#echo "<p>before explode</p>:";
#echo $string;

$array=explode("&",$string);
#echo "<p>after explode</p>:";
print_r($array);

#echo "<p>loop</p>:";

$size=count($array);

for ($i=0; $i <= $size; $i++) {
	
	if(preg_match("/checkboxlist/", $array[$i])) {
		#echo $array[$i] . "<BR>";
		#echo "<p>transformed in: ";
		$id=preg_replace("/.*=/","",$array[$i]);
		#echo $id ."</p>";
		if($delai=="incubateur") { //set the task to "dream/incubateur"
			$sql="
			    UPDATE pm_tasks
			    SET status=17 
			    WHERE id = " .$id;
		} else { //simple push delay
		$sql="
		    UPDATE pm_tasks
		    SET due_date=ADDDATE(due_date, INTERVAL " .$delai ." DAY)
		    WHERE id = " .$id;
		}
		#echo "<p>sql: <pre>";
		#echo nl2br($sql);
		#echo "</pre></p>";
		
		$sql=mysql_query($sql);
		
		if(!$sql){
			#echo  "Erreur SQL: " .mysql_error();
		} else {
			// header("Location: " .$_SERVER["HTTP_REFERER"]);
		}
	}
}
header("Location: /intranet/pmcake/pm_tasks/onfield");

?>
