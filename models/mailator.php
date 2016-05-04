<?php
class Mailator extends AppModel {
	var $name = 'Mailator';
	var $displayField = 'subject';
	var $validate = array(
		'pm_organization_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pm_project_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Missing project id!',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pm_task_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Missing task id!',
				'allowEmpty' => true,
									//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'statut_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
									//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
/*
		'date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
									//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
*/			
		'mailfrom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
									//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mailto' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
									//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mailcc' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
									//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mailbcc' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
									//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'subject' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
									//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'body' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
									//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PmOrganization' => array(
			'className' => 'PmOrganization',
			'foreignKey' => 'pm_organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PmProject' => array(
			'className' => 'PmProject',
			'foreignKey' => 'pm_project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PmTask' => array(
			'className' => 'PmTask',
			'foreignKey' => 'pm_task_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Statut' => array(
			'className' => 'Statut',
			'foreignKey' => 'statut_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
/*
	var $hasMany = array(
		'MailAnswer' => array(
			'className' => 'MailAnswer',
			'foreignKey' => 'mailator_id',
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
/*
	var $hasAndBelongsToMany = array(
		'Answer' => array(
			'className' => 'Answer',
			'joinTable' => 'mailators_answers',
			'foreignKey' => 'mailator_id',
			'associationForeignKey' => 'answer_id',
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
*/
}
