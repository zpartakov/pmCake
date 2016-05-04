<?php
class MailAnswersController extends AppController {

	var $name = 'MailAnswers';

	function index() {
		$this->MailAnswer->recursive = 0;
		$this->set('mailAnswers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mail answer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mailAnswer', $this->MailAnswer->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MailAnswer->create();
			if ($this->MailAnswer->save($this->data)) {
				$this->Session->setFlash(__('The mail answer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mail answer could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mail answer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MailAnswer->save($this->data)) {
				$this->Session->setFlash(__('The mail answer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mail answer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MailAnswer->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mail answer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MailAnswer->delete($id)) {
			$this->Session->setFlash(__('Mail answer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mail answer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
