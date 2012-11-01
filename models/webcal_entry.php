<?php
class WebcalEntry extends AppModel {
	var $name = 'WebcalEntry';
	var $useTable = 'webcal_entry';
	var $primaryKey = 'cal_id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
/*
	var $belongsTo = array(
		'Cal' => array(
			'className' => 'Cal',
			'foreignKey' => 'cal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CalGroup' => array(
			'className' => 'CalGroup',
			'foreignKey' => 'cal_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CalExtFor' => array(
			'className' => 'CalExtFor',
			'foreignKey' => 'cal_ext_for_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);*/

	var $hasAndBelongsToMany = array(
		'WebcalEntryCategory' => array(
			'className' => 'WebcalEntryCategory',
			'joinTable' => 'webcal_entry_categories',
			'foreignKey' => 'webcal_entry_id',
			'associationForeignKey' => 'category_id',
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
/*
		'ExtUser' => array(
			'className' => 'ExtUser',
			'joinTable' => 'webcal_entry_ext_user',
			'foreignKey' => 'webcal_entry_id',
			'associationForeignKey' => 'ext_user_id',
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
		'Log' => array(
			'className' => 'Log',
			'joinTable' => 'webcal_entry_log',
			'foreignKey' => 'webcal_entry_id',
			'associationForeignKey' => 'log_id',
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
		'Repeat' => array(
			'className' => 'Repeat',
			'joinTable' => 'webcal_entry_repeats',
			'foreignKey' => 'webcal_entry_id',
			'associationForeignKey' => 'repeat_id',
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
		'RepeatsNot' => array(
			'className' => 'RepeatsNot',
			'joinTable' => 'webcal_entry_repeats_not',
			'foreignKey' => 'webcal_entry_id',
			'associationForeignKey' => 'repeats_not_id',
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
		'User' => array(
			'className' => 'User',
			'joinTable' => 'webcal_entry_user',
			'foreignKey' => 'webcal_entry_id',
			'associationForeignKey' => 'user_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)*/
	);

}
