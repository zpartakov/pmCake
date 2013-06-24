<?php
class LegumesCompagnonsController extends AppController {

	var $name = 'LegumesCompagnons';

	function index() {
		$this->LegumesCompagnon->recursive = 0;
		$this->set('legumesCompagnons', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid legumes compagnon', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('legumesCompagnon', $this->LegumesCompagnon->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->LegumesCompagnon->create();
			if ($this->LegumesCompagnon->save($this->data)) {
				$this->Session->setFlash(__('The legumes compagnon has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The legumes compagnon could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid legumes compagnon', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->LegumesCompagnon->save($this->data)) {
				$this->Session->setFlash(__('The legumes compagnon has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The legumes compagnon could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->LegumesCompagnon->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for legumes compagnon', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->LegumesCompagnon->delete($id)) {
			$this->Session->setFlash(__('Legumes compagnon deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Legumes compagnon was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
