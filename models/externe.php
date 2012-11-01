<?php
class Externe extends AppModel {

	var $name = 'Externe';
	var $validate = array(
		'login' => array('notempty'),
		'uid' => array('numeric'),
		'email' => array('email')
	);

}
?>
