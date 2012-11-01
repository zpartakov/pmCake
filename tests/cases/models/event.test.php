<?php
/* Event Test cases generated on: 2011-12-26 08:55:31 : 1324886131*/
App::import('Model', 'Event');

class EventTestCase extends CakeTestCase {
	var $fixtures = array('app.event', 'app.event_type');

	function startTest() {
		$this->Event =& ClassRegistry::init('Event');
	}

	function endTest() {
		unset($this->Event);
		ClassRegistry::flush();
	}

}
