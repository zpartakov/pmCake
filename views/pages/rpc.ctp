<div class="autofill"><?php
	$this->layout = '';
	// PHP5 Implementation - uses MySQLi.
	// mysqli('localhost', 'yourUsername', 'yourPassword', 'yourDatabase');
	$db = new mysqli('localhost', LOGINMYSQL , PASSWORDMYSQL, DBMYSQL);
	if(!$db) {
		// Show error if we cannot connect.
		echo 'ERROR: Could not connect to the database.';
	} else {
		// Is there a posted query string?
		if(isset($_POST['queryString'])||isset($_GET['q'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			if(isset($_GET['q'])) {
				$queryString = $db->real_escape_string($_GET['q']);
			}
			// Is the string length greater than 0?
			
			
			if(strlen($queryString) >0) {
/* projects*/
				$sql="
				SELECT name AS value FROM pm_projects 
				WHERE 
				name LIKE '%$queryString%' LIMIT 10";
				
				$query = $db->query($sql);
				#echo $sql;
				if($query) {
					// While there are results loop through them - fetching an Object (i like PHP5 btw!).
					while ($result = $query ->fetch_object()) {
						// Format the results, im using <li> for the list, you can change it.
						// The onClick function fills the textbox with the result.
						
						// YOU MUST CHANGE: $result->value to $result->your_colum
	         			echo '<li class="projet_autofill" onClick="fill(\''.utf8_encode($result->value).'\');">'
	         			.'<span class="projet_autofillR">'.utf8_encode($result->value).'</span></li>';
	         		}
				} else {
					echo 'ERROR: There was a problem with the query:<br>'.$sql;
				}
				
				
/* tasks */
				$sql="
				SELECT name AS value, status FROM pm_tasks 
				WHERE 
				name LIKE '%$queryString%' ORDER BY status DESC LIMIT 30";
//echo $sql; exit;
				
				$query = $db->query($sql);
				if($query) {
					// While there are results loop through them - fetching an Object (i like PHP5 btw!).
					echo "<ul class=\"autofilltask\">";
					while ($result = $query ->fetch_object()) {
						// Format the results, im using <li> for the list, you can change it.
						// The onClick function fills the textbox with the result.
						
						// YOU MUST CHANGE: $result->value to $result->your_colum
	         			/*echo '<li onClick="fill(\''.utf8_encode($result->value).'\');">';
	         			echo '<span class="projet_autofillR">'.utf8_encode($result->value).'</span>&nbsp;';
	         			statut($result->status);
	         			echo '</li>';*/
	         			echo '<li class="projet_autofill" onClick="fill(\''.utf8_encode($result->value).'\');">'
	         			.'<span class="projet_autofillR">'.utf8_encode($result->value).'</span></li>';
	         			
					
					}
	         							echo "</ul>";

				} else {
					echo 'ERROR: There was a problem with the query:<br>'.$sql;
				}
	
				
			} else {
				// Dont do anything.
			} // There is a queryString.
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>
</div>
