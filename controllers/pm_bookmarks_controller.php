<?php
class PmBookmarksController extends AppController {

	var $name = 'PmBookmarks';
#criteres de tri
	var $paginate = array(
        'limit' => 25,
        'order' => array(
            'PmBookmark.name' => 'asc'
        )
    );
	function index() {
		if($this->data['PmBookmark']['q']) {
			//echo "bla"; exit;
					$input = $this->data['PmBookmark']['q']; 
					# sanitize the query
					App::import('Sanitize');
					$q = Sanitize::escape($input);
					$options = array(
					"PmBookmark.name LIKE '%" .$q ."%'" 
					." OR PmBookmark.url LIKE '%" .$q ."%'"
					." OR PmBookmark.description LIKE '%" .$q ."%'"
					);
					$this->set(array('pmBookmarks' => $this->paginate('PmBookmark', $options))); 
		} else {
		$this->PmBookmark->recursive = 0;
		$this->set('pmBookmarks', $this->paginate());
	}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm bookmark', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmBookmark', $this->PmBookmark->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PmBookmark->create();
			if ($this->PmBookmark->save($this->data)) {
				$this->Session->setFlash(__('The pm bookmark has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm bookmark could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		debug($this->data);
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm bookmark', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {

			if ($this->PmBookmark->save($this->data)) {
				$this->Session->setFlash(__('The pm bookmark has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm bookmark could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PmBookmark->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm bookmark', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmBookmark->delete($id)) {
			$this->Session->setFlash(__('Pm bookmark deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pm bookmark was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
