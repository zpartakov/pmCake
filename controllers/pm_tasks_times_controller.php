<?php
class PmTasksTimesController extends AppController {

	var $name = 'PmTasksTimes';

	/* hidden as it bugs the referer return
	 * 
	 * 	var $components = 'History';

	 */
	function index() {
		$this->PmTasksTime->recursive = 0;
		$this->set('pmTasksTimes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm tasks time', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmTasksTime', $this->PmTasksTime->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PmTasksTime->create();
			if ($this->PmTasksTime->save($this->data)) {
	    // Redirect user to previous page
       // $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The pm tasks time could not be saved. Please, try again.', true));
			}
		}
		$pmProjects = $this->PmTasksTime->PmProject->find('list');
		$pmMembers = $this->PmTasksTime->PmMember->find('list');
		$pmTasks = $this->PmTasksTime->PmTask->find('list');
		$this->set(compact('pmProjects', 'pmMembers', 'pmTasks'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm tasks time', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PmTasksTime->save($this->data)) {
				$this->redirect($this->Session->read('Temp.referer'));			
			} else {
				$this->Session->setFlash(__('The pm tasks time could not be saved. Please, try again.', true));
			}
		}
						// On enregistre l'url de la page qui a mené ici
		$this->Session->write('Temp.referer', $this->referer());		
		
		if (empty($this->data)) {
			$this->data = $this->PmTasksTime->read(null, $id);
		}
		$pmProjects = $this->PmTasksTime->PmProject->find('list');
		$pmMembers = $this->PmTasksTime->PmMember->find('list');
		$pmTasks = $this->PmTasksTime->PmTask->find('list');
		$this->set(compact('pmProjects', 'pmMembers', 'pmTasks'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm tasks time', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmTasksTime->delete($id)) {
			#$this->Session->setFlash(__('Pm tasks time deleted', true));
			#$this->redirect(array('action'=>'index'));
				    // Redirect user to previous page

		}
		$this->Session->setFlash(__('Pm tasks time was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function ajoutheure() {
	//do not display layout
		$this->layout = '';
	}
}
?>
