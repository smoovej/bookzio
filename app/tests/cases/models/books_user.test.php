<?php
/* BooksUser Test cases generated on: 2011-09-27 15:50:53 : 1317160253*/
App::import('Model', 'BooksUser');

class BooksUserTestCase extends CakeTestCase {
	var $fixtures = array('app.books_user', 'app.book', 'app.user');

	function startTest() {
		$this->BooksUser =& ClassRegistry::init('BooksUser');
	}

	function endTest() {
		unset($this->BooksUser);
		ClassRegistry::flush();
	}

}
