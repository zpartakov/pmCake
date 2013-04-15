<?php
class ObsoleteloginsController extends AppController {

	var $name = 'Obsoletelogins';
	var $helpers = array('Html', 'Form');

	#criteres de tri
	var $paginate = array(
        'limit' => 25,
        'order' => array(
            'Obsoletelogin.mail' => 'asc'
        )
    );
	function index() {
		$this->Obsoletelogin->recursive = 0;

		if($_GET['sel']!="all") {
		
		$options = array(
					"Obsoletelogin.login NOT LIKE '+%" .$q ."%'"
					);
					
					$this->set(array('obsoletelogins' => $this->paginate('Obsoletelogin', $options))); 
}else {		
		
		$this->set('obsoletelogins', $this->paginate());
	}
	}



	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Obsoletelogin.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('obsoletelogin', $this->Obsoletelogin->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Obsoletelogin->create();
			if ($this->Obsoletelogin->save($this->data)) {
				$this->Session->setFlash(__('The Obsoletelogin has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Obsoletelogin could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
						// On enregistre l'url de la page qui a mené ici
		$this->Session->write('Temp.referer', $this->referer());
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Obsoletelogin', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Obsoletelogin->save($this->data)) {
				$this->Session->setFlash(__('The Obsoletelogin has been saved', true));
				//$this->redirect(array('action'=>'index'));
//								$this->redirect($this->Session->read('Temp.referer'));			
							     $this->redirect('./index/page:1/sort:lastmodif/direction:asc');
								
				
			} else {
				$this->Session->setFlash(__('The Obsoletelogin could not be saved. Please, try again.', true));
			}
		}
		// On enregistre l'url de la page qui a mené ici
		$this->Session->write('Temp.referer', $this->referer());
		if (empty($this->data)) {
			$this->data = $this->Obsoletelogin->read(null, $id);
		}
	}

	function delete($id = null) {
				$this->Session->write('Temp.referer', $this->referer());
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Obsoletelogin', true));
			$this->redirect(array('action'=>'index'));			
		}
		
		if ($this->Obsoletelogin->delete($id))
		{
			$this->Session->setFlash(___('Obsoletelogin deleted', true), 'flash_message');
			//$this->redirect(array('action'=>'index'));
			$this->redirect($this->Session->read('Temp.referer'));			
			
		}
			
		$this->Session->setFlash(___('Obsoletelogin was not deleted', true), 'flash_error');
		$this->redirect(array('action' => 'index'));
		
	}

	function search() {
		$cherche=$this->data['Obsoletelogin']['q'];
		$this->set('results',$this->Obsoletelogin->query("
SELECT * FROM obsoletelogins AS Obsoletelogin WHERE 
`server` LIKE '%" .$cherche."%'
OR `login` LIKE '%" .$cherche."%' 
OR `group` LIKE '%" .$cherche."%' 
OR `mail` LIKE '%" .$cherche."%' 
OR `garant` LIKE '%" .$cherche."%' 
OR `path` LIKE '%" .$cherche."%' 
OR `remarques` LIKE '%" .$cherche."%' 
ORDER BY mail
;"));
	}
}
?>
