<?php
class HoursController extends AppController {

	var $name = 'Hours';

	var $paginate = array(
        'limit' => 100
    );

	function index() {
		$this->Hour->recursive = 0;
		$this->set('hours', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid hour', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('hour', $this->Hour->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Hour->create();
			if ($this->Hour->save($this->data)) {
				$this->Session->setFlash(__('The hour has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hour could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid hour', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Hour->save($this->data)) {
				$this->Session->setFlash(__('The hour has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hour could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Hour->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for hour', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Hour->delete($id)) {
			$this->Session->setFlash(__('Hour deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Hour was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
