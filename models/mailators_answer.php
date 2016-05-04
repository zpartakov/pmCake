<?php
class MailatorsAnswer extends AppModel {
	var $name = 'MailatorsAnswer';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Mailator' => array(
			'className' => 'Mailator',
			'foreignKey' => 'mailator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MailAnswer' => array(
			'className' => 'MailAnswer',
			'foreignKey' => 'mail_answer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
