<h1>Mettre en minuscule un texte</h1>
<br>
<?php
$code=$_POST['code'];

if ($code) {
#echo $code;
$code=stripslashes($code);
$code=strtolower($code);
$code=trim($code);
/*
$code=ereg_replace("Ê", "ê", $code);
$code=ereg_replace("Â", "â", $code);
$code=ereg_replace("eau & gaz", "Eau&Gaz", $code);
$code=ereg_replace("eau& gaz", "Eau&Gaz", $code);
*/
echo "<pre>".$code ."</pre>";

} 
echo "
<FORM METHOD=post>
<CENTER>
<HR>
    <input name=\"code\" type=\"text\" style=\"width: 400px\" />
<INPUT TYPE=submit VALUE=\"Transformer en minuscules\">
<HR>
</CENTER>
</FORM>
";

?>