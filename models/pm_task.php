<?php
class PmTask extends AppModel {
	var $name = 'PmTask';

	var $validate = array(
		'project' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				 'rule' => array('minLength', 1),
				'message' => 'Your custom message here',
				'allowEmpty' => false,
				//'required' => false,
				'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
/*
 * versioning: a class for keeping versions
 */
	var $actsAs = array('Revision'=> array('limit'=>30),'Copyable');
	
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'PmProject' => array(
			'className' => 'PmProject',
			'foreignKey' => 'project',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PmMember' => array(
			'className' => 'PmMember',
			'foreignKey' => 'owner',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'PmTasksTime' => array(
			'className' => 'PmTasksTime',
			'joinTable' => 'pm_tasks_time',
			'foreignKey' => 'pm_task_id',
			'associationForeignKey' => 'time_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'PmMember' => array(
			'className' => 'PmMember',
			'joinTable' => 'pm_tasks_pm_members',
			'foreignKey' => 'pm_task_id',
			'associationForeignKey' => 'pm_member_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
			'Tag' => array(
			'className' => 'Tag',
			'joinTable' => 'pm_tasks_tags',
			'foreignKey' => 'pm_task_id',
			'associationForeignKey' => 'tag_id',
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
?>
