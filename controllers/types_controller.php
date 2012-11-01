<?php
class TypesController extends AppController {

	var $name = 'Types';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');
	#criteres de tri
	var $paginate = array(
        'limit' => 100,
        'order' => array(
            'Type.lib' => 'asc'
        )
    );
	function index()
	{
		$this->Type->recursive = 0;
		$this->set('types', $this->paginate($this->Type, $this->AlaxosFilter->get_filter()));
		
	}

	function view($id = null)
	{
		$this->_set_type($id);
	}

	function add()
	{
		if (!empty($this->data))
		{
			$this->Type->create();
			if ($this->Type->save($this->data))
			{
				$this->Session->setFlash(___('the type has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the type could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		
	}

	function edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid type', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->Type->save($this->data))
			{
				$this->Session->setFlash(___('the type has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the type could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		
		$this->_set_type($id);
		
	}

	function delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for type', true), 'flash_error');
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Type->delete($id))
		{
			$this->Session->setFlash(___('type deleted', true), 'flash_message');
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('type was not deleted', true), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
	
	function actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
            if(isset($this->Acl) && $this->Acl->check($this->Auth->user(), 'Types/' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Type/id[id > 0]', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Type->deleteAll(array('Type.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(__('Types deleted', true), 'flash_message');
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(__('Types were not deleted', true), 'flash_error');
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(__('No type to delete was found', true), 'flash_error');
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
	
	function _set_type($id)
	{
		if(empty($this->data))
	    {
    	    $this->data = $this->Type->read(null, $id);
            if($this->data === false)
            {
                $this->Session->setFlash(___('invalid id for Type', true), 'flash_error');
                $this->redirect(array('action' => 'index'));
            }
	    }
	    
	    $this->set('type', $this->data);
	}
	
	
}
?>
