<?php
class Patchadmins extends AppModel {

	var $name = 'Patchadmins';
	var $validate = array(
		'server' => array('notempty'),
		'type' => array('notempty'),
		'url' => array('notempty'),
		'login' => array('notempty')

	);

}
/*		'passwd' => array('notempty'),
		'urladmin' => array('notempty'),
		'version' => array('notempty'),
		'priv' => array('notempty'),
		'meladmin' => array('notempty') */
?>
