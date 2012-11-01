<?
/*activer uniquement si on sait ce qu'on fait!!!*/

#exit;

		$sql="SELECT * FROM migrations WHERE urlsource LIKE ''";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}		
		$i=0;
		while($i<mysql_num_rows($sql)){
			$id= mysql_result($sql,$i,'id');
			$pathsrc= mysql_result($sql,$i,'urlcible');
			$urlsource=preg_replace("/^\/w3\//","http://cms.unige.ch/",$pathsrc);
			$urlcible=preg_replace("/^http:\/\/cms.unige.ch\//","http://cms2.unige.ch/",$urlsource);
			$loginresp= mysql_result($sql,$i,'loginresp');

			
			#echo $pathsrc .";" .$urlsource .";" .$urlcible ."<br>";
			$sqlqui="SELECT * FROM users WHERE shortname LIKE '".$loginresp."'";
			$sqlqui=mysql_query($sqlqui);
			if(!$sqlqui) {
				echo "sql error: " .$sqlqui ."<br>" .mysql_error(); exit;
			}	
			$quiid=mysql_result($sqlqui,0,'id');
			#echo $loginresp ." - " .mysql_result($sqlqui,0,'email') ." - " .$quiid."<br>";
			
			
			$requete="UPDATE migrations SET urlsource = '" .$urlsource ."' WHERE id=" .$id;
			$requete=mysql_query($requete);
			if(!$requete) {
				echo "sql error: " .$requete ."<br>" .mysql_error();
			}	
			
			$requete="UPDATE migrations SET pathsrc = '" .$pathsrc ."' WHERE id=" .$id;
			$requete=mysql_query($requete);
			if(!$requete) {
				echo "sql error: " .$requete ."<br>" .mysql_error();
			}	
			
			$requete="UPDATE migrations SET urlcible = '" .$urlcible ."' WHERE id=" .$id;
						$requete=mysql_query($requete);
			if(!$requete) {
				echo "sql error: " .$requete ."<br>" .mysql_error();
			}	
			
			$requete="UPDATE migrations SET user_id = '" .$quiid ."' WHERE id=" .$id;
						$requete=mysql_query($requete);
			if(!$requete) {
				echo "sql error: " .$requete ."<br>" .mysql_error();
			}	
			
			#echo $requete ."<br>";
			
			
			$i++;
			}
?>
