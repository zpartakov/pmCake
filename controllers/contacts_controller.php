<?php
class ContactsController extends AppController {

	var $name = 'Contacts';
#criteres de tri


 	var $paginate = array(
        'limit' => 1000,
        'order' => array(
            'Contact.FirstName' => 'asc',
            'Contact.LastName' => 'asc',
        )
    );
	   
	function index() {								
				global $csv;
			if($this->data['Contact']['csv']=="1") {
								$this->layout = '';
								$csv=1;
								
					} else {
								$csv=0;
					}
			if($this->data['Contact']['q']) {
			//echo "bla"; exit;
					$input = $this->data['Contact']['q']; 
					# sanitize the query
					App::import('Sanitize');
					$q = Sanitize::escape($input);
					$options = array(
					"Contact.FirstName LIKE '%" .$q ."%'" 
					." OR Contact.LastName LIKE '%" .$q ."%'"
					." OR Contact.Notes LIKE '%" .$q ."%'"
					." OR Contact.EmailAddress LIKE '%" .$q ."%'"
					." OR Contact.Email2Address LIKE '%" .$q ."%'"
					." OR Contact.Email3Address LIKE '%" .$q ."%'"
					." OR Contact.PrimaryPhone LIKE '%" .$q ."%'"
					." OR Contact.HomePhone LIKE '%" .$q ."%'"
					." OR Contact.HomePhone2 LIKE '%" .$q ."%'"
					." OR Contact.MobilePhone LIKE '%" .$q ."%'"
					." OR Contact.Fax LIKE '%" .$q ."%'"
					." OR Contact.HomeAddress LIKE '%" .$q ."%'"
					." OR Contact.Profession LIKE '%" .$q ."%'"
					." OR Contact.Category LIKE '%" .$q ."%'");
				$this->set(array('contacts' => $this->paginate('Contact', $options))); 
				} else {
		$this->Contact->recursive = 0;
		$this->set('contacts', $this->paginate());
	}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid contact', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contact', $this->Contact->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Contact->create();
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash(__('The contact has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid contact', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash(__('The contact has been saved', true));
				$this->redirect($this->Session->read('Temp.referer'));			
				
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.', true));
			}
		}
				// On enregistre l'url de la page qui a mené ici
		$this->Session->write('Temp.referer', $this->referer());
		if (empty($this->data)) {
			$this->data = $this->Contact->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for contact', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Contact->delete($id)) {
			$this->Session->setFlash(__('Contact deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Contact was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
		/*csv export src http://bakery.cakephp.org/articles/view/exporting-data-to-csv-the-cakephp-way*/
	function export() {
	  //$this->layout = '';
	  		$this->layout = '';
        }
        
    /* printable version */    
    function imprimer() {
	  $this->layout = 'printable';
        }
        function readmail() {
        						//do not display layout
		//$this->layout = '';
        }
        function birthday(){
        	$this->layout = '';
        	 
        	//send automatic email for birthdays
        }
}
