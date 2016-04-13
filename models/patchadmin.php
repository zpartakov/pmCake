<?php
class Patchadmin extends AppModel {

	var $name = 'Patchadmin';
	
	var $validate = array(
		'server' => array('notempty'),
		'type' => array('notempty'),
		'url' => array('notempty'),
		'login' => array('notempty')

	);

	var $actsAs = array('Revision'=> array('limit'=>30),'Copyable');
	 
}
/*		'passwd' => array('notempty'),
		'urladmin' => array('notempty'),
		'version' => array('notempty'),
		'priv' => array('notempty'),
		'meladmin' => array('notempty') */
?>
