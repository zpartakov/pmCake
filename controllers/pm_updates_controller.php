<?php
class PmUpdatesController extends AppController {

	var $name = 'PmUpdates';

	function index() {
		$this->PmUpdate->recursive = 0;
		$this->set('pmUpdates', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm update', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmUpdate', $this->PmUpdate->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PmUpdate->create();
			if ($this->PmUpdate->save($this->data)) {
				$this->Session->setFlash(__('The pm update has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm update could not be saved. Please, try again.', true));
			}
		}
		$pmTasks = $this->PmUpdate->PmTask->find('list');
		$this->set(compact('pmTasks'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm update', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PmUpdate->save($this->data)) {
				$this->Session->setFlash(__('The pm update has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm update could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PmUpdate->read(null, $id);
		}
		$pmTasks = $this->PmUpdate->PmTask->find('list');
		$this->set(compact('pmTasks'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm update', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmUpdate->delete($id)) {
			$this->Session->setFlash(__('Pm update deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pm update was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>