<?php
class PmMenusController extends AppController {

	var $name = 'PmMenus';
var $paginate = array(
        'limit' => 100,

		'order' 	=> array(
								'PmMenu.parent, PmMenu.rank',
							)
	);
	function index() {
		$this->PmMenu->recursive = 0;
		if($this->data['PmMenu']['q']) {
				//echo "yo"; exit;
						$input = $this->data['PmMenu']['q']; 
					# sanitize the query
					App::import('Sanitize');
					$q = Sanitize::escape($input);
					//echo $q; exit;
					$options = array(
					"PmMenu.lib LIKE '%" .$q ."%'" 
					." OR PmMenu.url LIKE '%" .$q ."%'"
					
					);
				$this->set(array('pmMenus' => $this->paginate('PmMenu', $options))); 
					}else{
		$this->set('pmMenus', $this->paginate());
					}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm menu', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmMenu', $this->PmMenu->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PmMenu->create();
			if ($this->PmMenu->save($this->data)) {
				$this->Session->setFlash(__('The pm menu has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm menu could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm menu', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PmMenu->save($this->data)) {
				$this->Session->setFlash(__('The pm menu has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm menu could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PmMenu->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm menu', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmMenu->delete($id)) {
			$this->Session->setFlash(__('Pm menu deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pm menu was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

/* a function to edit the menus as they are displayed */
	function display() {
	}
/* a function to reorder the menus */
	function deplacer() {
	}
}
?>
