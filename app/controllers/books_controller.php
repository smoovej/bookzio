<?php
class BooksController extends AppController {

    var $name = 'Books';
    var $helpers = array('HTML', 'Form');

    function loadBooks() {
        ini_set('auto_detect_line_endings', TRUE);
        $count = 0;
        if (($handle = fopen("/Users/smoovej/Sites/books/docs/books.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1005, ",")) !== FALSE) {
                $this->Book->create();
                $book['age'] = isset($data[0]) ? $data[0] : '';
                $book['title'] = isset($data[1]) ? $data[1] : '';
                $book['author'] = isset($data[2]) ? $data[2] : '';
                $book['illustrator'] = isset($data[3]) ? $data[3] : '';
                $this->Book->save($book);
                $count++;
                if (!$count % 100) {
                    echo "*";
                }
            }
            fclose($handle);
        }
        echo "<br/><br/>Done!";
    }

    function index() {
        $this->Book->recursive = 0;
        $this->set('books', $this->paginate());
    }

    function recommend() {
        $age = isset($this->params['form']['age']) ? $this->params['form']['age'] : null;

        if ($age) {
            $this->Session->write('age', $age);
        } else {
            $age = $this->Session->read('age');
        }

        // If age is still empty, just pick a random book
        $book = $this->Book->getRandomBook($age);
        $this->redirect(array('action' => 'view', $book['Book']['id']));
    }

    function view($id = null) {
        $age = $this->Session->read('age');

        if (empty($id)) {
            $book = $this->Book->getRandomBook($age);
        } else {
            $book = $this->Book->find('first', array('conditions' => array('id' => $id),
                                                    'recursive' => -1));
        }

        $count = 0;

        while (empty($book['Book']['on_amazon']) && ($count++ < 10)) {
            $book = $this->Book->loadFromAmazon($book);

            if ($book['Book']['amzn_image_url'] && $book['Book']['asin'] &&
                                                   $book['Book']['amzn_url'] &&
                                                   $book['Book']['amzn_review']) {
                $book['Book']['on_amazon'] = 1;
                $this->Book->save($book['Book']);

                // In case we've had to pull another random book...
                if ($id != $book['Book']['id']) {
                    $this->redirect(array('action' => 'view', $book['Book']['id']));
                }
            } else {
                $book['Book']['on_amazon'] = 0;
                $this->Book->save($book['Book']);

                $book = $this->Book->getRandomBook($age);
            }
        }
        $this->set(compact('book'));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Book->create();
            if ($this->Book->save($this->data)) {
                $this->Session->setFlash(__('The book has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The book could not be saved. Please, try again.', true));
            }
        }
        $users = $this->Book->User->find('list');
        $this->set(compact('users'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid book', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Book->save($this->data)) {
                $this->Session->setFlash(__('The book has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The book could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Book->read(null, $id);
        }
        $users = $this->Book->User->find('list');
        $this->set(compact('users'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for book', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Book->delete($id)) {
            $this->Session->setFlash(__('Book deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Book was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function home() {

    }


}