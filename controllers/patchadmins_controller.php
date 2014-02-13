<?php
class PatchadminsController extends AppController {


	var $name = 'Patchadmins';
	var $helpers = array('Html', 'Form');
	// Options de pagination par défaut :
	var $paginate = array(
		'order' => 'server,id ASC',
		'limit' => 20
	);
	function index() {
		$this->Patchadmin->recursive = 0;
		$this->set('patchadmins', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Patchadmin.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('patchadmin', $this->Patchadmin->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Patchadmin->create();
			if ($this->Patchadmin->save($this->data)) {
				$this->Session->setFlash(__('The Patchadmin has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Patchadmin could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Patchadmin', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Patchadmin->save($this->data)) {
				$this->Session->setFlash(__('The Patchadmin has been saved', true));
				$this->redirect($this->Session->read('Temp.referer'));					
			} else {
				$this->Session->setFlash(__('The Patchadmin could not be saved. Please, try again.', true));
			}
		}
						// On enregistre l'url de la page qui a mené ici
		$this->Session->write('Temp.referer', $this->referer());
		if (empty($this->data)) {
			$this->data = $this->Patchadmin->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Patchadmin', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Patchadmin->delete($id)) {
			$this->Session->setFlash(__('Patchadmin deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	

 function search() {
	$cherche=$this->data['Patchadmin']['q'];
	if($cherche==''){
		$cherche=$_GET['chercher'];
	}
#$this->set('results',$this->Patchadmin->find('all',array('conditions'=>array('Patchadmin.* LIKE'=>"%" .$cherche."%"))));
$this->set('results',$this->Patchadmin->query("
SELECT * FROM patchadmins WHERE 
`server` LIKE '%" .$cherche."%'
OR `type` LIKE '%" .$cherche."%'  
OR `db` LIKE '%" .$cherche."%'  
OR `sqlserver` LIKE '%" .$cherche."%'  
OR `contenu` LIKE '%" .$cherche."%'  
OR `url` LIKE '%" .$cherche."%'  
OR `login` LIKE '%" .$cherche."%'  
OR `mdp` LIKE '%" .$cherche."%'  
OR `loginmysql` LIKE '%" .$cherche."%'  
OR `passwdmysql` LIKE '%" .$cherche."%'  
OR `urladmin` LIKE '%" .$cherche."%'  
OR `loginadmin` LIKE '%" .$cherche."%'  
OR `passwdadmin` LIKE '%" .$cherche."%'  
OR `version` LIKE '%" .$cherche."%'  
OR `todos` LIKE '%" .$cherche."%'  
OR `rem` LIKE '%" .$cherche."%'  
OR `miseajour` LIKE '%" .$cherche."%'  
OR `scriptpatch` LIKE '%" .$cherche."%'  
OR `typetrans` LIKE '%" .$cherche."%'  
OR `priv` LIKE '%" .$cherche."%'  
OR `meladmin` LIKE '%" .$cherche."%'  
;"));
 
    }
	function joomlapatch() {
}

function upgrade() {//a function to upgrade a software
  $this->layout = '';
}

}
/*
 * -- Structure de la table `patchadmins`
--

CREATE TABLE IF NOT EXISTS `patchadmins` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `server` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `db` varchar(255) NOT NULL,
  `sqlserver` varchar(255) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `loginmysql` varchar(255) NOT NULL,
  `passwdmysql` varchar(255) NOT NULL,
  `urladmin` varchar(255) NOT NULL,
  `loginadmin` varchar(255) NOT NULL,
  `passwdadmin` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `todos` text NOT NULL,
  `rem` text NOT NULL,
  `miseajour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scriptpatch` tinyint(4) NOT NULL DEFAULT '0',
  `typetrans` varchar(255) NOT NULL DEFAULT 'ftp',
  `priv` tinyint(4) NOT NULL DEFAULT '1',
  `meladmin` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;
 */
?>
