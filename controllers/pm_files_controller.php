<?php
class PmFilesController extends AppController {

	var $name = 'PmFiles';

	function index() {
		$this->PmFile->recursive = 0;
		$this->set('pmFiles', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pm file', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pmFile', $this->PmFile->read(null, $id));
	}

	/*function add() {
		if (!empty($this->data)) {
			$this->PmFile->create();
			if ($this->PmFile->save($this->data)) {
				$this->Session->setFlash(__('The pm file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm file could not be saved. Please, try again.', true));
			}
		}
	}*/
	
	    function add() {
             if (!empty($this->data) &&
             is_uploaded_file($this->data['PmFile']['File']['tmp_name'])) {

            /*new method file-based*/
            #createDir("zzz"); //create dir with the id of the task - to uncomment if necessary
            $this->data['PmFile']['task_id'] = $this->data['PmFile']['task_id'];
			$path='../webroot/files/' .$this->data['PmFile']['task_id'];
			$dest=$this->data['PmFile']['File']['name'];
			$source=$this->data['PmFile']['File']['tmp_name'];
            #$this->data['PmFile']['task_id'] = $task_id;
createDir($this->data['PmFile']['task_id']); //create dir with the id of the task - to uncomment if necessary
uploadFile($path, $source, $dest);



				 /*original method mySQL based */
#            $this->data['PmFile']['task_id'] = $this->data['PmFile']['File']['task_id'];
            $this->data['PmFile']['name'] = $this->data['PmFile']['File']['name'];
            $this->data['PmFile']['type'] = $this->data['PmFile']['File']['type'];
            $this->data['PmFile']['size'] = $this->data['PmFile']['File']['size'];

            $this->PmFile->save($this->data);

           # $this->redirect('PmFiles/someaction');
            $this->redirect('index');
            

            
            
            
            
            
            
            
            
            
            
            
        }
    }
    
    function download($id) {
    Configure::write('debug', 0);
    $file = $this->PmFile->findById($id);

    header('Content-type: ' . $file['PmFile']['type']);
    header('Content-length: ' . $file['PmFile']['size']); // some people reported problems with this line (see the comments), commenting out this line helped in those cases
    header('Content-Disposition: attachment; filename="'.$file['PmFile']['name'].'"');
    echo $file['PmFile']['data'];

    exit();
}


	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pm file', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PmFile->save($this->data)) {
				$this->Session->setFlash(__('The pm file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pm file could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PmFile->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pm file', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PmFile->delete($id)) {
			$this->Session->setFlash(__('Pm file deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pm file was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
//end of cake main class
###################################################################################	
	/*a test function*/
	function hello() {
		echo "hello world";
	}
		/**
 * Upload a file to a specified destination
 * 
 * @param string $path Path of original file
 * @param string $source Temp file
 * @param string $dest Destination path
 * @access public 
 */
function uploadFile($path, $source, $dest)
{
        #$source = str_replace('\\', '/', $source);;
       /* if (!is_dir($path)) {
            createDir($path);
        }*/
        $destination = $path . '/' . $dest;
        move_uploaded_file($source, $destination)||die("unable to mv tmp file and create");
    
}

/**
 * Folder creation
 * 
 * @param string $path Path to the new directory
 * @access public 
 */
function createDir($path)
{
#            @mkdir('../webroot/files/' . $path, 0777)||die("unable to create dir");
            @mkdir('../webroot/files/' . $path, 0777);
}
?>
