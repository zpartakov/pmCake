<?php
class PmDelaysController extends AppController {

	var $name = 'PmDelays';

	function index() {
		$this->PmDelay->recursive = 0;
		$this->set('pmDelays', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm delay', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmDelay', $this->PmDelay->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PmDelay->create();
			if ($this->PmDelay->save($this->data)) {
				$this->Session->setFlash(__('The pm delay has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm delay could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm delay', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PmDelay->save($this->data)) {
				$this->Session->setFlash(__('The pm delay has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm delay could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PmDelay->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm delay', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmDelay->delete($id)) {
			$this->Session->setFlash(__('Pm delay deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pm delay was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>