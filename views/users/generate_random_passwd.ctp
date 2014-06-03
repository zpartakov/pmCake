<?php 
/*
 * tool for generating passwords
 */
	App::import('Lib', 'functions'); //imports app/libs/functions
	
	$this->pageTitle = "Génération aléatoire de mots de passe";
	
	
if(!$_GET['longueur']){
	$longueur=10; //default length for password
}
if(!$_GET['nbpwd']){
	$nbpwd=20; //default # of generated passwords
}
//echo $longueur ." - " . $nbpwd;
?>
<h1><?php echo $this->pageTitle;?>
	<?php
	$image="icons/pm/password.jpg";
	echo $html->image($image, array('style'=>'vertical-align: top; width: 100px'));
	?>
	</h1>

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
<h1>Mot de passes simples #<?php echo $longueur;?> caractères</h1>
</td></tr>
<tr><td><?php 	
/*
 * strong passwd
 */
?>
<table>
<tr>
<td>
<?php 
for($i=0;$i<$nbpwd;$i++) {
echo passe_mnemo($longueur-2);
echo "<br>";	
}

?>
</td>
<td>
<?php 
for($i=0;$i<$nbpwd;$i++) {
echo passe_mnemo($longueur-2);
echo "<br>";	
}

?>
</td>

</tr>
</table>
</td>
<td>
<?php 
/*
 * mnemotechnic passwd
 */
for($i=0;$i<$nbpwd;$i++) {
echo generate_password($longueur);
echo "<br>";
	
}

?>
</td>
</tr>
<tr>
<td>
<h1>Mot de passes simples #<?php echo $longueur+1;?> caractères</h1>
</td>
<td>
<h1>Mot de passes simples #<?php echo $longueur+2;?> caractères</h1>
</td>
</tr>
<tr><td>
<?php 
for($i=0;$i<$nbpwd;$i++) {
echo generatePassword($longueur+1);
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