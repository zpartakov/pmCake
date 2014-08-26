<?php
class TagsController extends AppController {

	var $name = 'Tags';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function index()
	{
		$this->Tag->recursive = 0;
		$this->set('tags', $this->paginate($this->Tag, $this->AlaxosFilter->get_filter()));
		
		$pmTasks = $this->Tag->PmTask->find('list');
		$this->set(compact('pmTasks'));
	}

	function view($id = null)
	{
		$this->_set_tag($id);
		$pmTasks = $this->Tag->PmTask->find('list');
		$this->set(compact('pmTasks'));
	}

	function add()
	{
		if (!empty($this->data))
		{
			$this->Tag->create();
			if ($this->Tag->save($this->data))
			{
				$this->Session->setFlash(___('the tag has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the tag could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$pmTasks = $this->Tag->PmTask->find('list');
		$this->set(compact('pmTasks'));
	}

	function edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for tag', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->Tag->save($this->data))
			{
				$this->Session->setFlash(___('the tag has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the tag could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_tag($id);
		
		$pmTasks = $this->Tag->PmTask->find('list');
		$this->set(compact('pmTasks'));
	}

	function copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for tag', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->Tag->id = false;
			
			if ($this->Tag->save($this->data))
			{
				$this->Session->setFlash(___('the tag has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['Tag'][$this->Tag->primaryKey] = $id;
				$this->Session->setFlash(___('the tag could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_tag($id);
		
		$pmTasks = $this->Tag->PmTask->find('list');
		$this->set(compact('pmTasks'));
	}
	
	function delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for tag', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Tag->delete($id))
		{
			$this->Session->setFlash(___('tag deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('tag was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
            if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Tags/' . $this->data['_Tech']['action']))
	            {
	                $this->setAction($this->data['_Tech']['action']);
	            }
	            else
	            {
	                $this->Session->setFlash(___d('alaxos', 'not authorized', true), 'flash_error', array('plugin' => 'alaxos'));
	                $this->redirect($this->referer());
	            }
	        }
	        elseif(isset($this->Auth) && $this->Auth->user() == null)
	        {
	            /*
	             * Manually check permission, as the setAction() method does not check for permission rights
	             */
                if(in_array(strtolower($this->data['_Tech']['action']), $this->Auth->allowedActions))
                {
                    $this->setAction($this->data['_Tech']['action']);
                }
                else
	            {
	                $this->Session->setFlash(___d('alaxos', 'not authorized', true), 'flash_error', array('plugin' => 'alaxos'));
					$this->redirect($this->referer());
	            }
	        }
	        else
	        {
	        	/*
	             * neither Auth nor Acl, or Auth + logged user
	             * -> grant access
	             */
	        	$this->setAction($this->data['_Tech']['action']);
	        }
	    }
	    else
	    {
	        $this->Session->setFlash(___d('alaxos', 'the action to perform is not defined', true), 'flash_error', array('plugin' => 'alaxos'));
	        $this->redirect($this->referer());
	    }
	}
	
	function deleteAll()
	{
	    $ids = Set :: extract('/Tag/id[id > 0]', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Tag->deleteAll(array('Tag.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('tags deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('tags were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no tag to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
	
	function _set_tag($id)
	{
		if(empty($this->data))
	    {
    	    $this->data = $this->Tag->read(null, $id);
            if($this->data === false)
            {
                $this->Session->setFlash(___('invalid id for tag', true), 'flash_error', array('plugin' => 'alaxos'));
                $this->redirect(array('action' => 'index'));
            }
	    }
	    
	    $this->set('tag', $this->data);
	}
	
	
}
?>