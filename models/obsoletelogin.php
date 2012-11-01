<?php
class Obsoletelogin extends AppModel {

	var $name = 'Obsoletelogin';
	var $validate = array(
		'login' => array('notempty'),
		'mail' => array('notempty')
	);
/*,
		'group' => array('notempty'),
		'server' => array('notempty')*/
}
?>
