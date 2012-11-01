<?php
class Fonction extends AppModel {
	var $name = 'Fonction';
	var $displayField = 'lib';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ProgLanguage' => array(
			'className' => 'ProgLanguage',
			'foreignKey' => 'prog_language_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
