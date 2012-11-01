<?php
class Type extends AppModel {
	var $name = 'Type';
	var $displayField = 'lib';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Lesmigration' => array(
			'className' => 'Lesmigration',
			'foreignKey' => 'type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'lib',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>
