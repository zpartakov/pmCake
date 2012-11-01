<?php
/**
* @version        $Id: externes_controller.php v1.0 08.02.2010 13:40:32 CET $
* www.unige.ch
* webmaster@unige.ch

*/

class ExternesController extends AppController {

	var $name = 'Externes';
	var $helpers = array('Html', 'Form');

	#criteres de tri
	var $paginate = array(
        'limit' => 25,
        'order' => array(
            'Externe.server,Externe.login' => 'asc'
        )
    );
    
	function index() {
		$this->Externe->recursive = 0;
		$this->set('externes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Externe.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('externe', $this->Externe->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Externe->create();
			if ($this->Externe->save($this->data)) {
				$this->Session->setFlash(__('The Externe has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Externe could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Externe', true));
				$this->redirect($this->Session->read('Temp.referer'));			
					}
		if (!empty($this->data)) {
			if ($this->Externe->save($this->data)) {
				$this->Session->setFlash(__('The Externe has been saved', true));
				$this->redirect($this->Session->read('Temp.referer'));			
			} else {
				$this->Session->setFlash(__('The Externe could not be saved. Please, try again.', true));
			}
		}
								// On enregistre l'url de la page qui a mené ici
		$this->Session->write('Temp.referer', $this->referer());	
		if (empty($this->data)) {
			$this->data = $this->Externe->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Externe', true));
			$this->redirect(array('action'=>'index'));
		}

		
		if ($this->Externe->delete($id))
		{
			$this->Session->setFlash(___('Externe deleted', true), 'flash_message');
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('Externe was not deleted', true), 'flash_error');
		$this->redirect(array('action' => 'index'));
		
		
	}

	function search() {
		$cherche=$this->data['Externe']['q'];
		$this->set('results',$this->Externe->query("
SELECT * FROM externes AS Externe WHERE 
`server` LIKE '%" .$cherche."%'
OR `login` LIKE '%" .$cherche."%' 
OR `uid` LIKE '%" .$cherche."%' 
OR `email` LIKE '%" .$cherche."%' 
OR `garant` LIKE '%" .$cherche."%' 
OR `email2` LIKE '%" .$cherche."%' 
OR `path` LIKE '%" .$cherche."%' 
OR `rem` LIKE '%" .$cherche."%' 
ORDER BY email
;"));
	}
}
?>
