<?php
class WebcalEntryCategoriesController extends AppController {

	var $name = 'WebcalEntryCategories';

	function index() {
		$this->WebcalEntryCategory->recursive = 0;
		$this->set('webcalEntryCategories', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid webcal entry category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('webcalEntryCategory', $this->WebcalEntryCategory->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->WebcalEntryCategory->create();
			if ($this->WebcalEntryCategory->save($this->data)) {
				$this->Session->setFlash(__('The webcal entry category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webcal entry category could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid webcal entry category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->WebcalEntryCategory->save($this->data)) {
				$this->Session->setFlash(__('The webcal entry category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webcal entry category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->WebcalEntryCategory->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for webcal entry category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->WebcalEntryCategory->delete($id)) {
			$this->Session->setFlash(__('Webcal entry category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Webcal entry category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
