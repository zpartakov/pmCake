<?php
class PmTasksTime extends AppModel {
	var $name = 'PmTasksTime';
	var $useTable = 'pm_tasks_time';
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
		),
		'PmTask' => array(
			'className' => 'PmTask',
			'foreignKey' => 'task',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
/*	var $hasOne = array(
		'PmMember' => array(
			'className' => 'PmMember',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $belongsTo = array(

	);
	* */
}
?>
