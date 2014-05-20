<?php
/*
 * id
FirstName
LastName
Notes
EmailAddress
Email2Address
Email3Address
PrimaryPhone
HomePhone
HomePhone2
MobilePhone
Fax
HomeAddress
Profession
Category
*/
header('Content-type: text/x-csv; charset= UTF-8');
header('Content-Disposition: attachment; filename="export.csv"');

   // Define column headers for CSV file, in same array format as the data itself
                $Equipement= array(
					'FirstName' => 'FirstName',
                    'LastName' => 'LastName',
                    'birthday' => 'birthday',
					'EmailAddress' => 'EmailAddress',
					'Email2Address' => 'Email2Address',
					'Email3Address' => 'Email3Address',
					'PrimaryPhone' => 'PrimaryPhone',
					'HomePhone' => 'HomePhone',
					'HomePhone2' => 'HomePhone2',
					'MobilePhone' => 'MobilePhone',
					'Fax' => 'Fax',
					'HomeAddress' => 'HomeAddress',
					'Profession' => 'Profession',
					'Category' => 'Category',
					'Notes' => 'Notes'

                );

    foreach($Equipement as $field=>$libelle) {
        // Loop through every value in a row
    echo $libelle.";";
}
 echo "\n";

	$sql="SELECT * FROM contacts ORDER BY id";

#echo $sql;
$sql=mysql_query($sql);
if(!$sql) { echo "SQL error: " .mysql_error(); }

$i=0;
while($i<mysql_num_rows($sql)){
	
	  foreach($Equipement as $field=>$libelle) {
        // Loop through every value in a row
		echo mysql_result($sql,$i,$field).";";
		}
		echo "\n";
	$i++;
	}

    // Loop through the data array
  

	  
?>
