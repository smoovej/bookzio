<?php
/* Book Fixture generated on: 2011-09-27 15:50:53 : 1317160253 */
class BookFixture extends CakeTestFixture {
	var $name = 'Book';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'age' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'author' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'illustrator' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'age' => array('column' => 'age', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'age' => 1,
			'author' => 'Lorem ipsum dolor sit amet',
			'illustrator' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-09-27 15:50:53',
			'modified' => '2011-09-27 15:50:53'
		),
	);
}
