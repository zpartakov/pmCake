<?php
class Tag extends AppModel {
	var $name = 'Tag';
	var $displayField = 'lib';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'PmTask' => array(
			'className' => 'PmTask',
			'joinTable' => 'pm_tasks_tags',
			'foreignKey' => 'tag_id',
			'associationForeignKey' => 'pm_task_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
