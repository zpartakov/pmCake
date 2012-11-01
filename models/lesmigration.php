<?php
class Lesmigration extends AppModel {
	var $name = 'Lesmigration';
		var $belongsTo = array(
		'Type' => array(
			'className' => 'Type',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Statut' => array(
			'className' => 'Statut',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Server' => array(
			'className' => 'Server',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
/*
	var $hasMany = array(
		'Email' => array(
			'className' => 'Email',
			'foreignKey' => 'migration_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'TaskTime' => array(
			'className' => 'TaskTime',
			'foreignKey' => 'migration_id',
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
	 */
}
?>
