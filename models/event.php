<?php
class Event extends AppModel {
	var $name = 'Event';
	var $displayField = 'title';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'EventType' => array(
			'className' => 'EventType',
			'foreignKey' => 'event_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
