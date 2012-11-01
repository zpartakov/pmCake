<?php
class PmProject extends AppModel {
	var $name = 'PmProject';
		//var $actsAs = array('Trim');

	var $displayField = 'name';
		var $hasMany = array(
		'members' => array(
			'className' => 'PmMember',
			'foreignKey' => 'id',
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
}
?>
