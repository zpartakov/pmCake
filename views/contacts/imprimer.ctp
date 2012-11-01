<?php
$this->pageTitle="Imprimer contacts";

   // Define column headers for CSV file, in same array format as the data itself
                $Equipement= array(
					'FirstName' => 'FirstName',
					'LastName' => 'LastName',
					'PrimaryPhone' => 'PrimaryPhone',
					'HomePhone' => 'HomePhone',
					'HomePhone2' => 'HomePhone2',
					'MobilePhone' => 'MobilePhone',
					'Profession' => 'Profession',
					'Category' => 'Category',
                );



	$sql="SELECT * FROM contacts  
	WHERE (HomePhone NOT LIKE '' OR HomePhone2 NOT LIKE '' OR MobilePhone NOT LIKE '')  
	ORDER BY LastName, FirstName";

#echo $sql;
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); }

$i=0;
while($i<mysql_num_rows($sql)){
	echo "<p>";
	  foreach($Equipement as $field=>$libelle) {
        // Loop through every value in a row
        if(strlen(mysql_result($sql,$i,$field))>0) {
			echo mysql_result($sql,$i,$field)."<br/>";
		}
		}
	$i++;
		echo "</p>---";

	}

    // Loop through the data array
  

	  
?>
