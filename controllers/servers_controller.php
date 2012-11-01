<?php
class ServersController extends AppController {

	var $name = 'Servers';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function index()
	{
		$this->Server->recursive = 0;
		$this->set('servers', $this->paginate($this->Server, $this->AlaxosFilter->get_filter()));
		
	}

	function view($id = null)
	{
		$this->_set_server($id);
	}

	function add()
	{
		if (!empty($this->data))
		{
			$this->Server->create();
			if ($this->Server->save($this->data))
			{
				$this->Session->setFlash(___('the server has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the server could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		
	}

	function edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid server', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->Server->save($this->data))
			{
				$this->Session->setFlash(___('the server has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the server could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		
		$this->_set_server($id);
		
	}

	function delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for server', true), 'flash_error');
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Server->delete($id))
		{
			$this->Session->setFlash(___('server deleted', true), 'flash_message');
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('server was not deleted', true), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
	
	function actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
            if(isset($this->Acl) && $this->Acl->check($this->Auth->user(), 'Servers/' . $this->data['_Tech']['action']))
	        {
	            $this->setAction($this->data['_Tech']['action']);
	        }
	        elseif(!isset($this->Acl))
	        {
                $this->setAction($this->data['_Tech']['action']);
	        }
	        else
	        {
	        	if(isset($this->Auth))
	        	{
	            	$this->Session->setFlash($this->Auth->authError, $this->Auth->flashElement, array(), 'auth');
	            }
	            else
	            {
	            	$this->Session->setFlash(___d('alaxos', 'not authorized', true), 'flash_error');
	            }
	            
	            $this->redirect($this->referer());
	        }
	    }
	    else
	    {
	        $this->Session->setFlash(___d('alaxos', 'the action to perform is not defined', true), 'flash_error');
	        $this->redirect($this->referer());
	    }
	}
	
	function deleteAll()
	{
	    $ids = Set :: extract('/Server/id[id > 0]', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Server->deleteAll(array('Server.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(__('Servers deleted', true), 'flash_message');
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(__('Servers were not deleted', true), 'flash_error');
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(__('No server to delete was found', true), 'flash_error');
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
	
	function _set_server($id)
	{
		if(empty($this->data))
	    {
    	    $this->data = $this->Server->read(null, $id);
            if($this->data === false)
            {
                $this->Session->setFlash(___('invalid id for Server', true), 'flash_error');
                $this->redirect(array('action' => 'index'));
            }
	    }
	    
	    $this->set('server', $this->data);
	}
	
	
}
?>