<?php
class WebcalEntryRepeatsController extends AppController {

	var $name = 'WebcalEntryRepeats';

	function index() {
		$this->WebcalEntryRepeat->recursive = 0;
		$this->set('webcalEntryRepeats', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid webcal entry repeat', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('webcalEntryRepeat', $this->WebcalEntryRepeat->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->WebcalEntryRepeat->create();
			if ($this->WebcalEntryRepeat->save($this->data)) {
				$this->Session->setFlash(__('The webcal entry repeat has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webcal entry repeat could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid webcal entry repeat', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->WebcalEntryRepeat->save($this->data)) {
				$this->Session->setFlash(__('The webcal entry repeat has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webcal entry repeat could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->WebcalEntryRepeat->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for webcal entry repeat', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->WebcalEntryRepeat->delete($id)) {
			$this->Session->setFlash(__('Webcal entry repeat deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Webcal entry repeat was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
