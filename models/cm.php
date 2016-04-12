<?php
class Cm extends AppModel {

	var $name = 'Cm';
	var $actsAs = array('Revision'=> array('limit'=>30),'Copyable');
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	/*var $hasMany = array(
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);*/

}
?>
