<?php
class ProgLanguagesController extends AppController {

	var $name = 'ProgLanguages';

	function index() {
		$this->ProgLanguage->recursive = 0;
		$this->set('progLanguages', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid prog language', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('progLanguage', $this->ProgLanguage->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProgLanguage->create();
			if ($this->ProgLanguage->save($this->data)) {
				$this->Session->setFlash(__('The prog language has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prog language could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid prog language', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProgLanguage->save($this->data)) {
				$this->Session->setFlash(__('The prog language has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prog language could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProgLanguage->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for prog language', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProgLanguage->delete($id)) {
			$this->Session->setFlash(__('Prog language deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Prog language was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
