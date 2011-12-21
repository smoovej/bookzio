<?php
/* Books Test cases generated on: 2011-09-27 15:50:59 : 1317160259*/
App::import('Controller', 'Books');

class TestBooksController extends BooksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BooksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.book', 'app.user', 'app.books_user');

	function startTest() {
		$this->Books =& new TestBooksController();
		$this->Books->constructClasses();
	}

	function endTest() {
		unset($this->Books);
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
