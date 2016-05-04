<?php
class MailatorsController extends AppController {

	var $name = 'Mailators';

    public $components = array('Email');
    	
	function index() {
		$this->Mailator->recursive = 0;
		$this->set('mailators', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mailator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mailator', $this->Mailator->read(null, $id));
	}

	function add() {
		
		
		if (!empty($this->data)) {
			
			$this->Mailator->create();
				
			$pm_project_id=$this->data['Mailator']['pm_project_id'];
			$pm_task_id=$this->data['Mailator']['pm_task_id'];
				
			//print_r($this->data); exit;
			//echo $this->data[Mailator][mailfrom]; exit;

			$this->Email->from = trim($this->data['Mailator']['mailfrom']);
				
				$this->Email->to = $this->data['Mailator']['mailto'];
				$this->Email->bcc = $this->data['Mailator']['mailbcc'];
				$this->Email->cc = $this->data['Mailator']['mailcc'];
				$this->Email->subject = $this->data['Mailator']['subject'];
				$this->Email->replyTo = $this->data['Mailator']['mailfrom'];
				//$this->Email->template = 'simple_message'; // notez l'absence de '.ctp'
				// Envoi en 'html', 'text' ou 'both' (par défaut c'est 'text')
				$this->Email->sendAs = 'html'; // parce que nous aimons envoyer de jolis emails

				$this->Email->send(nl2br($this->data['Mailator']['body']));
				
/*				if ($this->Email->send(nl2br($this->data['Mailator']['body']))) {
					$this->Session->setFlash(__('Email From me'), 'default', array('class' => 'success'));
				}
*/				
			if ($this->Mailator->save($this->data)) {
				$this->Session->setFlash(__('The mailator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mailator could not be saved. Please, try again.', true));
			}
			
//$db =& ConnectionManager::getDataSource('default');
//$db->showLog();				
		}else{
		
		$pm_project_id=$_GET['pm_project_id'];
		$pm_task_id=$_GET['pm_task_id'];
		}
		$pmOrganizations = $this->Mailator->PmOrganization->find('list');
		$pmProjects = $this->Mailator->PmProject->find('list');
		$pmTasks = $this->Mailator->PmTask->find('list');
		$statuts = $this->Mailator->Statut->find('list');
		$this->set(compact('pmOrganizations', 'pmProjects', 'pmTasks', 'statuts'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mailator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Mailator->save($this->data)) {
				$this->Session->setFlash(__('The mailator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mailator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Mailator->read(null, $id);
		}
		$pmOrganizations = $this->Mailator->PmOrganization->find('list');
		$pmProjects = $this->Mailator->PmProject->find('list');
		$pmTasks = $this->Mailator->PmTask->find('list');
		$statuts = $this->Mailator->Statut->find('list');
		$this->set(compact('pmOrganizations', 'pmProjects', 'pmTasks', 'statuts'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mailator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Mailator->delete($id)) {
			$this->Session->setFlash(__('Mailator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mailator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
