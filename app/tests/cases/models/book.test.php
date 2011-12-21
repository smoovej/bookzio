<?php
/* Book Test cases generated on: 2011-09-27 15:50:53 : 1317160253*/
App::import('Model', 'Book');

class BookTestCase extends CakeTestCase {
	var $fixtures = array('app.book', 'app.user', 'app.books_user');

	function startTest() {
		$this->Book =& ClassRegistry::init('Book');
	}

	function endTest() {
		unset($this->Book);
		ClassRegistry::flush();
	}

}
