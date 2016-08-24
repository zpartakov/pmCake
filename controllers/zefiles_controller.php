<?php
class ZefilesController extends AppController {

	var $name = 'Zefiles';

	var $paginate = array(
        'limit' => 100,
        'order' => array(
            'id' => 'desc'
        )
    );

	function index() {
		$this->Zefile->recursive = 0;
		$this->set('zefiles', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->set(__('Invalid zefile', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('zefile', $this->Zefile->read(null, $id));
	}

	/*function add() {
		if (!empty($this->data)) {
			$this->Zefile->create();
			if ($this->Zefile->save($this->data)) {
				$this->set(__('The zefile has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->set(__('The zefile could not be saved. Please, try again.', true));
			}
		}
	}*/

    function add() {
				App::import('Lib', 'functions'); //imports app/libs/functions

             if (!empty($this->data) &&
             is_uploaded_file($this->data['Zefile']['File']['tmp_name'])) {
            $this->data['Zefile']['task_id'] = $this->data['Zefile']['task_id'];
			$path='../webroot/files/' .$this->data['Zefile']['task_id'];
			$dest=date("YMDhi")."_".$this->data['Zefile']['File']['name']; //add current date + hour/time to the uploaded filename
			$source=$this->data['Zefile']['File']['tmp_name'];
			createDir($this->data['Zefile']['task_id']); //create dir with the id of the task - to uncomment if necessary
			uploadFile($path, $source, $dest);
            $this->data['Zefile']['name'] = date("YMDhi")."_".$this->data['Zefile']['File']['name']; //add current date + hour/time to the uploaded filename
            $this->data['Zefile']['type'] = $this->data['Zefile']['File']['type'];
            $this->data['Zefile']['size'] = $this->data['Zefile']['File']['size'];
            $this->Zefile->save($this->data);
//            echo $_SESSION["task_id"]; exit;
			$this->redirect($this->Session->read('Temp.referer'));
        }
		// On enregistre l'url de la page qui a mené ici
		$this->Session->write('Temp.referer', $this->referer());
    }

    function download($id) {
    Configure::write('debug', 0);
    $file = $this->Zefile->findById($id);

    header('Content-type: ' . $file['Zefile']['type']);
    header('Content-length: ' . $file['Zefile']['size']); // some people reported problems with this line (see the comments), commenting out this line helped in those cases
    header('Content-Disposition: attachment; filename="'.$file['Zefile']['name'].'"');
    echo $file['Zefile']['data'];

    exit();
}


	function edit($id = null) {
		App::import('Lib', 'functions'); //imports app/libs/functions

		if (!$id && empty($this->data)) {
			$this->set(__('Invalid zefile', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Zefile->save($this->data)) {
				$this->set(__('The zefile has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->set(__('The zefile could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Zefile->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->set(__('Invalid id for zefile', true));
            $this->redirect('index');
		}
		if ($this->Zefile->delete($id)) {
			$this->set(__('Zefile deleted', true));
            $this->redirect('index');
		}
		$this->set(__('Zefile was not deleted', true));
            $this->redirect('index');
	}

	/*
	 * check if the document exists, suggest to remove task if not
	 */
	function check() {

	}
} //end of cake main class


?>
