<?php
class Contact extends AppModel {
	var $name = 'Contact';
	var $displayField = 'LastName';
	var $actsAs = array('Trim');
}
