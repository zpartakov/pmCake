<?php
/* PmProject Fixture generated on: 2011-02-24 11:19:21 : 1298542761 */
class PmProjectFixture extends CakeTestFixture {
	var $name = 'PmProject';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 8, 'key' => 'primary'),
		'organization' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8),
		'owner' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8),
		'priority' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8),
		'status' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 155, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'url_dev' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'url_prod' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 16, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'modified' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 16, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'published' => array('type' => 'string', 'null' => false, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'upload_max' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 155, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'phase_set' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8),
		'type' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'organization' => 1,
			'owner' => 1,
			'priority' => 1,
			'status' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'url_dev' => 'Lorem ipsum dolor sit amet',
			'url_prod' => 'Lorem ipsum dolor sit amet',
			'created' => 'Lorem ipsum do',
			'modified' => 'Lorem ipsum do',
			'published' => 'Lorem ipsum dolor sit ame',
			'upload_max' => 'Lorem ipsum dolor sit amet',
			'phase_set' => 1,
			'type' => 'Lorem ipsum dolor sit ame'
		),
	);
}
?>