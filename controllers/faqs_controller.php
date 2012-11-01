<?php
class FaqsController extends AppController {

	var $name = 'Faqs';
	#criteres de tri
	var $paginate = array(
        'limit' => 100,
        'order' => array(
            'Faq.lib' => 'asc'
        )
    );
	function index() {
		//see contact
		$this->Faq->recursive = 0;
		if($this->data['Faq']['q']) {
				//echo "yo"; exit;
						$input = $this->data['Faq']['q']; 
					# sanitize the query
					App::import('Sanitize');
					$q = Sanitize::escape($input);
					//echo $q; exit;
					$options = array(
					"Faq.lib LIKE '%" .$q ."%'" 
					." OR Faq.short_answer LIKE '%" .$q ."%'"
					." OR Faq.answer LIKE '%" .$q ."%'"
					." OR Faq.mail_from LIKE '%" .$q ."%'"
					." OR Faq.mail_body LIKE '%" .$q ."%'"
					." OR Faq.mail_sign LIKE '%" .$q ."%'"
					." OR Faq.rem LIKE '%" .$q ."%'"
					);
				$this->set(array('faqs' => $this->paginate('Faq', $options))); 
					}else{
		
		
		
		$this->set('faqs', $this->paginate());
					}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid faq', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('faq', $this->Faq->read(null, $id));
	}

	function add() {
/*		Notice (8): Undefined property: FaqsController::$lib [APP/controllers/faqs_controller.php, line 50]

Fatal error: Call to a member function create() on a non-object in /var/www/pmcake/app/controllers/faqs_controller.php on line 50*/ 
		
		
		if (!empty($this->data)) {
			/*$this->lib->create();*/
			$this->Faq->create();
			
			if ($this->Faq->save($this->data)) {
				$this->Session->setFlash(__('The faq has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faq could not be saved. Please, try again.', true));
			}
		}
		$pmProjects = $this->Faq->PmProject->find('list',array('order'=>'name'));
		$this->set(compact('pmProjects'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid faq', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Faq->save($this->data)) {
				$this->Session->setFlash(__('The faq has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faq could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Faq->read(null, $id);
		}
		$pmProjects = $this->Faq->PmProject->find('list');
		$this->set(compact('pmProjects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for faq', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Faq->delete($id)) {
			$this->Session->setFlash(__('Faq deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Faq was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
