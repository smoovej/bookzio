<?php
/* BooksUser Fixture generated on: 2011-09-27 15:50:53 : 1317160253 */
class BooksUserFixture extends CakeTestFixture {
	var $name = 'BooksUser';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'book_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'book_id' => array('column' => array('book_id', 'user_id'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'book_id' => 1,
			'user_id' => 1,
			'created' => '2011-09-27 15:50:53',
			'modified' => '2011-09-27 15:50:53'
		),
	);
}
