<?php
/* PmProject Test cases generated on: 2011-02-24 11:19:21 : 1298542761*/
App::import('Model', 'PmProject');

class PmProjectTestCase extends CakeTestCase {
	var $fixtures = array('app.pm_project');

	function startTest() {
		$this->PmProject =& ClassRegistry::init('PmProject');
	}

	function endTest() {
		unset($this->PmProject);
		ClassRegistry::flush();
	}

}
?>