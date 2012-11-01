<?php
class WebcalRemindersController extends AppController {

	var $name = 'WebcalReminders';

	function index() {
		$this->WebcalReminder->recursive = 0;
		$this->set('webcalReminders', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid webcal reminder', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('webcalReminder', $this->WebcalReminder->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->WebcalReminder->create();
			if ($this->WebcalReminder->save($this->data)) {
				$this->Session->setFlash(__('The webcal reminder has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webcal reminder could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid webcal reminder', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->WebcalReminder->save($this->data)) {
				$this->Session->setFlash(__('The webcal reminder has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webcal reminder could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->WebcalReminder->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for webcal reminder', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->WebcalReminder->delete($id)) {
			$this->Session->setFlash(__('Webcal reminder deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Webcal reminder was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
