<?php
class BooksUsersController extends AppController {

	var $name = 'BooksUsers';

	function index() {
		$this->BooksUser->recursive = 0;
		$this->set('booksUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid books user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('booksUser', $this->BooksUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->BooksUser->create();
			if ($this->BooksUser->save($this->data)) {
				$this->Session->setFlash(__('The books user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The books user could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid books user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BooksUser->save($this->data)) {
				$this->Session->setFlash(__('The books user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The books user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BooksUser->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for books user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BooksUser->delete($id)) {
			$this->Session->setFlash(__('Books user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Books user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
