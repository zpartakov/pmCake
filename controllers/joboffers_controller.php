<?php
class JoboffersController extends AppController {

	var $name = 'Joboffers';
	var $paginate = array(
        'limit' => 100,
        'order' => array(
            'Joboffer.date' => 'desc'
        )
    );
	function index() {
		$this->Joboffer->recursive = 0;
					if($this->data['Joboffer']['q']) {
				//echo "yo"; exit;
						$input = $this->data['Joboffer']['q']; 
					# sanitize the query
					App::import('Sanitize');
					$q = Sanitize::escape($input);
					//echo $q; exit;
					$options = array(
					"Joboffer.poste LIKE '%" .$q ."%'" 
					." OR Joboffer.lettre LIKE '%" .$q ."%'"
					." OR Joboffer.date LIKE '%" .$q ."%'"
					);
				$this->set(array('joboffers' => $this->paginate('Joboffer', $options))); 
					}else{
		$this->set('joboffers', $this->paginate());
					}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid joboffer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('joboffer', $this->Joboffer->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Joboffer->create();
			if ($this->Joboffer->save($this->data)) {
				$this->Session->setFlash(__('The joboffer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The joboffer could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid joboffer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Joboffer->save($this->data)) {
				$this->Session->setFlash(__('The joboffer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The joboffer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Joboffer->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for joboffer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Joboffer->delete($id)) {
			$this->Session->setFlash(__('Joboffer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Joboffer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
