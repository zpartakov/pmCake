<?php
class ProgLanguage extends AppModel {
	var $name = 'ProgLanguage';
	var $displayField = 'lib';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Fonction' => array(
			'className' => 'Fonction',
			'foreignKey' => 'prog_language_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
