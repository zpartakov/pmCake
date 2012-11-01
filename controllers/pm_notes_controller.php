<?php
class PmNotesController extends AppController {

	var $name = 'PmNotes';

	function index() {
		$this->PmNote->recursive = 0;
		$this->set('pmNotes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm note', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmNote', $this->PmNote->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PmNote->create();
			if ($this->PmNote->save($this->data)) {
				$this->Session->setFlash(__('The pm note has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm note could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm note', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PmNote->save($this->data)) {
				$this->Session->setFlash(__('The pm note has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm note could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PmNote->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm note', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmNote->delete($id)) {
			$this->Session->setFlash(__('Pm note deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pm note was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>