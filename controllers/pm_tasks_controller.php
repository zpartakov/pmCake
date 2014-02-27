<?php
class PmTasksController extends AppController {
	var $name = 'PmTasks';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');
		
	function taches() {
		if(!$_GET['pid']) {
			echo "Missing project id!"; exit;
		}
	}
	var $paginate = array(
        'limit' => 100,
        'order' => array(
            'due_date' => 'asc'
        )
    );
	
	function index() {
		$this->PmTask->recursive = 0;
		if($_GET['tasktype']=="incub") { //incubateur - dreams
	//echo "yo"; exit;
		 $options = array(
		 "PmTask.status=17"
		 );
		 $this->set(array('pmTasks' => $this->paginate('PmTask', $options)));
 		} elseif($_GET['tasktype']=="ref") { //references
			$options = array(
					"PmTask.status=22"
					);			
					#echo "test"; exit;
			$this->set(array('pmTasks' => $this->paginate('PmTask', $options))); 		

		} elseif($_GET['tasktype']=="finished") { //achieved projects
			$options = array(
					"PmTask.status<2"
					);			
					#echo "test"; exit;
			$this->set(array('pmTasks' => $this->paginate('PmTask', $options))); 		

		} else { //all tasks		
			$options = array(
					"PmTask.status <17"
					);		
					$this->set(array('pmTasks' => $this->paginate('PmTask', $options))); 
				}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm task', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmTask', $this->PmTask->read(null, $id));
	}
	
	function viewajax($id = null) {
							//do not display layout
		$this->layout = '';
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm task', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmTask', $this->PmTask->read(null, $id));
	}
	
	function add() {
		if (!empty($this->data)) {
			#$this->data=trim($this->data);
			$this->PmTask->create();
			if ($this->PmTask->save($this->data)) {
				$this->Session->setFlash(__('The pm task has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm task could not be saved. Please, try again.', true));
			}
		}
		$pmProjects = $this->PmTask->PmProject->find('list');
		$pmMembers = $this->PmTask->PmMember->find('list');
		$pmTasksTimes = $this->PmTask->PmTasksTime->find('list');
		$this->set(compact('pmProjects', 'pmMembers', 'pmTasksTimes'));
	}
	
	function ajout() {
					//do not display layout
		$this->layout = '';

	}

	function edit($id = null) {
						App::import('Vendor', 'phpqrcode/qrlib');
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm task', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PmTask->save($this->data)) {
				$this->Session->setFlash(__('The pm task has been saved', true));
				/*$this->redirect($this->Session->read('Temp.referer'));*/	
				/* task edit: reload current page after edit */		
			     $this->redirect('./edit/'.$id);
     
			} else {
				$this->Session->setFlash(__('The pm task could not be saved. Please, try again.', true));
			}
		}
								// On enregistre l'url de la page qui a mené ici
		$this->Session->write('Temp.referer', $this->referer());	
		if (empty($this->data)) {
			$this->data = $this->PmTask->read(null, $id);
		}
				
		
		$pmTags = $this->PmTask->Tag->find('list');
		$this->set(compact('pmTags'));
		
		
	}
	
	/*
	 * copiable behiavor
	 * 
http://jamienay.com/2010/03/copyable-behavior-for-cakephp-1-3-recursive-record-copying/

After attaching Copyable to a model via the $actsAs array – I recommend putting it on AppModel – usage is as simple as:

// From a controller method
$this->MyModel->copy($id);

// From a model method
$this->copy($id);
*/
	function copier($id = null) {
//$this->copy($id);
$this->PmTask->copy($id);
$last_id=mysql_query("SELECT id FROM pm_tasks ORDER BY id DESC LIMIT 0,1");
$last_id=mysql_result($last_id, 0,'id');
//echo "lastid: " .$last_id; exit;
			$this->redirect(array('action'=>'edit', $last_id ."&copy=yes"));

	}
	
	/* a ad hoc function as cake seems to bug here ??? */
	function modifier($id = null) {
			//do not display layout
		$this->layout = '';
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm task', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmTask->delete($id)) {
			$this->Session->setFlash(__('Pm task deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pm task was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/* a special view for incubateur - dreams */
	function incubateur() {
	}
	
	/* a function to print currrent overdue tasks */
	function onfield() {
	}
	
	function repousser() {
				$this->layout = '';
	}
	/* a function to get the task status = done */
	function ok() {
	}
	/* a function to change the priority */
	function changepriorite() {
	}
		/* a function to change the init date */
	
	function changedatedebut() {
	}
	
		/* a function to change the due date */
	
	function changedatefin() {
	}
	
	/* a function to get the task libelle changed */
	function changelibelle() {
	}
	
	
	
	/* a function to show the time spent on task today - or another selected day */
	function hours_today() {
	}
	
	/* a function to report the time spent on tasks for a givent time interval - default = previous month */
	function hours_report() {
		//do not display layout
		$this->layout = '';
	}
	
	/* a function to report graphically the time spent on tasks for a givent time interval - default = previous month */
	function hours_report_graph() {
	}
	
    function due() {
		$datenow = date("Y-m-d");
		$this->PmTask->recursive = 0;
        $this->paginate = array(
          'PmTask' => array(
            'order' => 'due ASC',
            'limit' => 50,
            'scope' => array("status > 1 AND due_date > '".$datenow)
          )
        );
        $tasks = $this->paginate();
        return $tasks;
    } 
    
	function calendrier() {
	}
	
	/* a stupid page */
	function mel() {
	//do not display layout
		$this->layout = '';
	}
	
	/* using jpgraph see http://bakery.cakephp.org/articles/cguyer/2007/12/26/using-jpgraph */
	function graph() {
		//do not display layout
			$this->layout = '';
		//$this->layout='ajax';
	}


	function test(){
	$this->runtest = 1; // THIS is HOW ($this) should be used
	}
/*
 * pousser les delais de plusieurs taches
 */
function pushdelays() {
    
}
	function printThis(){
	echo $this->runtest;
	}
	
	function archive() {
	}
	
	function sauver() {
		if ($this->data != null) {
			$this->PmTask->save($this->data);
			// whatever else needs doing... TODO
		}
	}

}
?>
