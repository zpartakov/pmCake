<?php
class WebcalCategoriesController extends AppController {

	var $name = 'WebcalCategories';

	function index() {
		$this->WebcalCategory->recursive = 0;
		$this->set('webcalCategories', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid webcal category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('webcalCategory', $this->WebcalCategory->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->WebcalCategory->create();
			if ($this->WebcalCategory->save($this->data)) {
				$this->Session->setFlash(__('The webcal category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webcal category could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid webcal category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->WebcalCategory->save($this->data)) {
				$this->Session->setFlash(__('The webcal category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webcal category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->WebcalCategory->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for webcal category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->WebcalCategory->delete($id)) {
			$this->Session->setFlash(__('Webcal category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Webcal category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
