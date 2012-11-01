<?php
class PmUpdate extends AppModel {
	var $name = 'PmUpdate';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PmTask' => array(
			'className' => 'PmTask',
			'foreignKey' => 'item',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>