<?php
/*
 App::import('Controller', 'PmMembers');
$PmMember = new PmMembersController;
 $PmMember ->constructClasses();*/

class PmProjectsController extends AppController {

	var $name = 'PmProjects';
	
	
	var $paginate = array(
        'limit' => 100,
        'order' => array(
            'PmProject.name' => 'asc'
        )
    );
	function index() {
		#Configure::write('debug', 2); //tests
		$this->PmProject->recursive = 0;

		#echo $html->link('Inactifs', '/projects/?status=');
		if($_GET['status']=="active") { //active projects
			$options = array(
					"PmProject.status=3"
			);	
		$this->set('pmProjects', $this->paginate($options));
		} elseif($_GET['status']=="inactive") { //active projects
			$options = array(
					"PmProject.status <> 3"
			);	
		$this->set('pmProjects', $this->paginate($options));
		} elseif($_GET['clients']) { //clients
			$options = array(
					"PmProject.organization=".$_GET['clients']
					);			
		$this->set('pmProjects', $this->paginate($options));
		} else { //all projects
		
		$this->set('pmProjects', $this->paginate());
	}
	}


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm project', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmProject', $this->PmProject->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PmProject->create();
			if ($this->PmProject->save($this->data)) {
				$this->Session->setFlash(__('The pm project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm project could not be saved. Please, try again.', true));
			}
		}
	}
	
	function ajout() {
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm project', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PmProject->save($this->data)) {
				$this->Session->setFlash(__('The pm project has been saved', true));
				//$this->redirect(array('action' => 'index'));
							$this->redirect($this->Session->read('Temp.referer'));			
				
			} else {
				$this->Session->setFlash(__('The pm project could not be saved. Please, try again.', true));
			}
		}
				// On enregistre l'url de la page qui a mené ici
		$this->Session->write('Temp.referer', $this->referer());	
		if (empty($this->data)) {
			$this->data = $this->PmProject->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm project', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmProject->delete($id)) {
			$this->Session->setFlash(__('Pm project deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pm project was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}



}
/* BEGIN MOD pm_projects_controller.php Frederic.Radeff@unige.ch  24.02.2011 12:31:33 CET */
?>
