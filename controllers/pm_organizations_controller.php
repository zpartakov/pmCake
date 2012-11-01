<?php
class PmOrganizationsController extends AppController {

	var $name = 'PmOrganizations';

	function index() {
		$this->PmOrganization->recursive = 0;
		$this->set('pmOrganizations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm organization', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmOrganization', $this->PmOrganization->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PmOrganization->create();
			if ($this->PmOrganization->save($this->data)) {
				$this->Session->setFlash(__('The pm organization has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm organization could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm organization', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PmOrganization->save($this->data)) {
				$this->Session->setFlash(__('The pm organization has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm organization could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PmOrganization->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm organization', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmOrganization->delete($id)) {
			$this->Session->setFlash(__('Pm organization deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pm organization was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>