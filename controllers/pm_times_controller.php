<?php
class PmTimesController extends AppController {

	var $name = 'PmTimes';

	function index() {
		$this->PmTime->recursive = 0;
		$this->set('pmTimes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm time', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmTime', $this->PmTime->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PmTime->create();
			if ($this->PmTime->save($this->data)) {
				$this->Session->setFlash(__('The pm time has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm time could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm time', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PmTime->save($this->data)) {
				$this->Session->setFlash(__('The pm time has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm time could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PmTime->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm time', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmTime->delete($id)) {
			$this->Session->setFlash(__('Pm time deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pm time was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>