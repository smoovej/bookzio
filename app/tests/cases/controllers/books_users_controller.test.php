<?php
/* BooksUsers Test cases generated on: 2011-09-27 15:50:59 : 1317160259*/
App::import('Controller', 'BooksUsers');

class TestBooksUsersController extends BooksUsersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BooksUsersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.books_user', 'app.book', 'app.user');

	function startTest() {
		$this->BooksUsers =& new TestBooksUsersController();
		$this->BooksUsers->constructClasses();
	}

	function endTest() {
		unset($this->BooksUsers);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
