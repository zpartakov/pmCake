<?php
class Faq extends AppModel {
	var $name = 'Faq';
	var $displayField = 'lib';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PmProject' => array(
			'className' => 'PmProject',
			'foreignKey' => 'pm_project_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'name'
		)
	);
}
