<?php
class FonctionsController extends AppController {

	var $name = 'Fonctions';
var $paginate = array(
        'limit' => 100,
        'order' => array(
            'Fonction.lib' => 'asc'
        )
    );
	function index() {
		$this->Fonction->recursive = 0;
		if($this->data['Fonction']['q']) {
					$input = $this->data['Fonction']['q']; 
					//echo "input: " .$input; exit;
					# sanitize the query
					App::import('Sanitize');
					$q = Sanitize::escape($input);
					//echo $q; exit;
					$options = array(
					"Fonction.lib LIKE '%" .$q ."%'" 
					." OR Fonction.Note LIKE '%" .$q ."%'"
					);
				$this->set(array('fonctions' => $this->paginate('Fonction', $options))); 
					}else{
		$this->set('fonctions', $this->paginate());
					}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid fonction', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fonction', $this->Fonction->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Fonction->create();
			if ($this->Fonction->save($this->data)) {
				$this->Session->setFlash(__('The fonction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fonction could not be saved. Please, try again.', true));
			}
		}
		$progLanguages = $this->Fonction->ProgLanguage->find('list');
		$this->set(compact('progLanguages'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid fonction', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Fonction->save($this->data)) {
				$this->Session->setFlash(__('The fonction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fonction could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Fonction->read(null, $id);
		}
		
		$options = array(
        'limit' => 100,
        'order' => array(
            'ProgLanguage.lib' => 'asc'
        )
        );
    
		$progLanguages = $this->Fonction->ProgLanguage->find('list',$options);
		$this->set(compact('progLanguages'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for fonction', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Fonction->delete($id)) {
			$this->Session->setFlash(__('Fonction deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Fonction was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
