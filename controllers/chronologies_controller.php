<?php
class ChronologiesController extends AppController {

	var $name = 'Chronologies';
	#criteres de tri
	var $paginate = array(
        'limit' => 100,
        'order' => array(
            'Chronology.lib' => 'asc'
        )
    );
	function index() {
		$this->Chronology->recursive = 0;
			if($this->data['Chronology']['q']) {
				//echo "yo"; exit;
						$input = $this->data['Chronology']['q']; 
					# sanitize the query
					App::import('Sanitize');
					$q = Sanitize::escape($input);
					//echo $q; exit;
					$options = array(
					"Chronology.lib LIKE '%" .$q ."%'" 
					." OR Chronology.date LIKE '%" .$q ."%'"
					." OR Chronology.pays LIKE '%" .$q ."%'"
					);
				$this->set(array('chronologies' => $this->paginate('Chronology', $options))); 
					}else{
		$this->set('chronologies', $this->paginate());
					}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid chronology', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('chronology', $this->Chronology->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Chronology->create();
			if ($this->Chronology->save($this->data)) {
				$this->Session->setFlash(__('The chronology has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chronology could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid chronology', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Chronology->save($this->data)) {
				$this->Session->setFlash(__('The chronology has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chronology could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Chronology->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for chronology', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Chronology->delete($id)) {
			$this->Session->setFlash(__('Chronology deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Chronology was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
