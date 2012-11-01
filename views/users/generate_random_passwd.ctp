<?php 
/*
 * tool for generating passwords
 */
	App::import('Lib', 'functions'); //imports app/libs/functions
if(!$_GET['longueur']){
	$longueur=8; //default length for password
}
if(!$_GET['nbpwd']){
	$nbpwd=20; //default # of generated passwords
}
//echo $longueur ." - " . $nbpwd;
?>
<!-- <form method="GET">
Longueur du mot de passe: <input type="text" name="longueur" value="10">
Nombre de mots de passe: <input type="text" name="nbpwd" value="20">
<input type="reset">
<input type="submit">
</form> -->
<table>
<tr>
<td>
<h1>Mot de passes avancés</h1>
</td>
<td>
<h1>Mot de passes simples</h1>
</td></tr>
<tr><td><?php 	
for($i=0;$i<$nbpwd;$i++) {
echo passe_mnemo($longueur);
echo "<br>";	
}


//echo passe_mnemo();
//

?>
</td><td>
<?php 
for($i=0;$i<$nbpwd;$i++) {
echo generate_password($longueur);
echo "<br>";
	
}

?>
</td>
</tr>
<tr>
<td>
<h1>Autre</h1>
</td>
<td>
<h1>Autre2</h1>
</td>
</tr>
<tr><td>
<?php 
for($i=0;$i<$nbpwd;$i++) {
echo generatePassword($longueur);
echo "<br>";	
}
?>



</td><td>
<?php 
for($i=0;$i<$nbpwd;$i++) {
//echo ae_gen_password(3,true);
//echo "<br>";	
	echo ae_gen_password(3,false);
echo "<br>";	
}
?>

</td></tr>



</table>