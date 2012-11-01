<?php
class PmMembersController extends AppController {

	var $name = 'PmMembers';
	var $paginate = array(
		'order' 	=> array(
								'PmMember.name ASC',
							)
	);
	function index() {
		$this->PmMember->recursive = 0;
		$this->set('pmMembers', $this->paginate());
	}


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm member', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmMember', $this->PmMember->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PmMember->create();
			if ($this->PmMember->save($this->data)) {
				$this->Session->setFlash(__('The pm member has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm member could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm member', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PmMember->save($this->data)) {
				$this->Session->setFlash(__('The pm member has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm member could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PmMember->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm member', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmMember->delete($id)) {
			$this->Session->setFlash(__('Pm member deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pm member was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
