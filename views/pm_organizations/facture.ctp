<?php
/*
 * client bill view
 * */
 	App::import('Lib', 'functions'); //imports app/libs/functions
 	setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
/* 	 	echo (strftime("%A, %d %B %Y")); 
exit;*/
?>
<style>
	.expediteur {}
	.ladate, .destinataire {margin-left: 60%;}		
	td, th {border: thin solid; padding: 3px; text-align: right}
</style>
<?php

$facture="
<div class=\"expediteur\">
Frédéric Radeff
29 r. Gares
CH-1201 Genève
Téléphone +41 77 405 17 01

</div>
<div class=\"destinataire\">".
$pmOrganization['PmOrganization']['name']."<br/>".
$pmOrganization['PmOrganization']['address1']."<br/>".
$pmOrganization['PmOrganization']['city']."<br/>".
$pmOrganization['PmOrganization']['zip_code']."-".
$pmOrganization['PmOrganization']['country']."<br/>
</div>";

$facture.="<div class=\"ladate\">
Genève, le " .strftime("%d %B %Y")
 ."</div>
";

$facture.="<div class=\"concerne\">
Concerne: Facture du " .strftime("%d %B %Y") ."</div>

Monsieur,

Je vous prie de bien vouloir me régler la facture suivante:

";

$lesheures=facture($pmOrganization['PmOrganization']['id']);

$facture.=$lesheures;

$facture.="

Règlement sur mon ccp 12-57555-0 dans un délai de 30 jours.

En vous remerciant par avance.

Veuillez agréer, Monsieur, l'expression de mes salutations distinguées.
";

echo nl2br($facture);

/*
*/
?>
