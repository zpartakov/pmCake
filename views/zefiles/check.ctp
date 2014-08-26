	<?php
	App::import('Lib', 'functions'); //imports app/libs/functions
//Configure::write('debug', 2);
$this->pageTitle = 'GTD check documents :' .dateen2fr(date("D d-M-Y, H\hi")); 

/*
 * check documents
 */
check_zefiles();
?>
