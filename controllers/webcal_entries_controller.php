<?php
class WebcalEntriesController extends AppController {

	var $name = 'WebcalEntries';

	function index() {
		$this->WebcalEntry->recursive = 0;
		$this->set('webcalEntries', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid webcal entry', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('webcalEntry', $this->WebcalEntry->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->WebcalEntry->create();
			if ($this->WebcalEntry->save($this->data)) {
				$this->Session->setFlash(__('The webcal entry has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webcal entry could not be saved. Please, try again.', true));
			}
		}
		$webcalEntryCategories = $this->WebcalEntry->WebcalEntryCategory->find('list');
		$this->set(compact('webcalEntryCategories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid webcal entry', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->WebcalEntry->save($this->data)) {
				$this->Session->setFlash(__('The webcal entry has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webcal entry could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->WebcalEntry->read(null, $id);
		}
		$webcalEntryCategories = $this->WebcalEntry->WebcalEntryCategory->find('list');
		$this->set(compact('webcalEntryCategories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for webcal entry', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->WebcalEntry->delete($id)) {
			$this->Session->setFlash(__('Webcal entry deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Webcal entry was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
