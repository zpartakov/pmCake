<?php
/**
* @version        $Id: cms_controller.php v1.0 27.04.2010 10:09:02 CEST $
* www.unige.ch
* webmaster@unige.ch
-- Base de données: `admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(12) NOT NULL auto_increment,
  `type_id` varchar(255) collate utf8_unicode_ci NOT NULL,
  `server` varchar(255) collate utf8_unicode_ci NOT NULL,
  `url` varchar(255) collate utf8_unicode_ci NOT NULL,
  `path` varchar(255) collate utf8_unicode_ci NOT NULL,
  `login` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `expires` date default NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `version` varchar(255) collate utf8_unicode_ci NOT NULL,
  `rem` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=62 ;

*/
?>    

<?php
class CmsController extends AppController {

	var $name = 'Cms';
	var $helpers = array('Html', 'Form');
	#criteres de tri
	var $paginate = array(
        'limit' => 100,
        'order' => array(
            'Cm.email' => 'asc'
        )
    );
	function index() {
		$this->Cm->recursive = 0;
		$this->set('cms', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Cm.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('cm', $this->Cm->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {

			$server=($this->data['Cm']['server']);
			
			if($server=="6") {
				$server="asinara.unige.ch";
			} elseif($server=="1") {
				$server="cms.unige.ch";
			} elseif($server=="4") {
				$server="geneva2003.unige.ch";
			}elseif($server=="7") {
				$server="lnxweb.unige.ch";
			}elseif($server=="5") {
				$server="silene3.unige.ch";
			}elseif($server=="8") {
				$server="silene5.unige.ch";
			}elseif($server=="3") {
				$server="www.unige.ch";
			}
			$this->data['Cm']['server']=$server;
			$this->Cm->create();
			if ($this->Cm->save($this->data)) {
				$this->Session->setFlash(__('The Cm has been saved', true));
				#$this->redirect(array('action'=>'index'));
				#$this->redirect(array('action'=>'add'));
				echo '<meta http-equiv="refresh" content="0;URL=/intranet/pmcake/cms">';
			} else {
				$this->Session->setFlash(__('The Cm could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Cm', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Cm->save($this->data)) {
				$this->Session->setFlash(__('The Cm has been saved', true));
				$this->redirect($this->Session->read('Temp.referer'));			
				
			} else {
				$this->Session->setFlash(__('The Cm could not be saved. Please, try again.', true));
			}
		}
				// On enregistre l'url de la page qui a mené ici
		$this->Session->write('Temp.referer', $this->referer());	
		if (empty($this->data)) {
			$this->data = $this->Cm->read(null, $id);
		}

	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Cm', true));
			$this->redirect(array('action'=>'index'));
		}

		if ($this->Cm->delete($id))
		{
			$this->Session->setFlash(___('Cm deleted', true), 'flash_message');
			#$this->redirect(array('action'=>'index'));
							echo '<meta http-equiv="refresh" content="0;URL=/migrations/cms/">';

		}
			
		$this->Session->setFlash(___('Cm was not deleted', true), 'flash_error');
		$this->redirect(array('action' => 'index'));
		
		
	}


function search() {
	$cherche=$this->data['Cm']['q'];
	$cherche=trim($cherche);
		//tri begin
			if(!$_GET['ordre']) { //if type is passed in url
			//$ordre="id";
			$ordre="path";
			}else{
			$ordre=$_GET['ordre'];
		}
		//sens du tri
			if(!$_GET['sens']) { //if type is passed in url
			$sens=" ASC";
		}else{
			$sens=$_GET['sens'];
		}
		//tri end

	
	if(!$_GET['letype']) { //if type is passed in url
	$letype=$this->data['Cm']['letype'];
	}else{
	$letype=$_GET['letype'];
	}
	#echo "<pre class=cake-debug>Type: " .$type ."</div>";
	$requetesql="
	SELECT * FROM cms WHERE ";
	
	if(is_numeric($letype)) {
	$requetesql.="(";
	}
	
	$requetesql.="
	`url` LIKE '%" .$cherche."%'  
	OR `server` LIKE '%" .$cherche."%'  
	OR `path` LIKE '%" .$cherche."%'  
	OR `login` LIKE '%" .$cherche."%'  
	OR `email` LIKE '%" .$cherche."%'  
	OR `version` LIKE '%" .$cherche."%'  
	OR `rem` LIKE '%" .$cherche."%'";
	#echo "<pre class=cake-debug>SQL: " .$requetesql ."</div>";
	
	
	/*special for Joomla15 and Joomla16*/
	if($letype=="1") {
	if(is_numeric($letype)) {
	$requetesql.=") AND (`type_id` = '1' OR `type_id` = '19')";
	}	
	} else {
	if(is_numeric($letype)) {
	$requetesql.=") AND `type_id` = " .$letype." ";
	}
	}
	$requetesql.=" ORDER BY " .$ordre ." " .$sens;
	
	
	$requetesql.=";";
	
	if($_GET['https']) { //if https searched
	$requetesql="
	SELECT * FROM cms WHERE `rem` LIKE '%httpsok%' ORDER BY type_id, path";
	#echo "bla"; exit;
	}
	
	
	$this->set('results',$this->Cm->query($requetesql));
   }
   function saygoodbye() {
   	$this->layout = '';
   	
   		$ordre="type_id";
   		$sens=" ASC";
   
   	#echo "<pre class=cake-debug>Type: " .$type ."</div>";
   	$requetesql="
   	SELECT * FROM cms WHERE ";
    			$requetesql.="(`type_id` = '6' OR `type_id` = '4' OR `type_id` = '30' OR `type_id` = '8' OR `type_id` = '16' OR `type_id` = '18') AND id <> 240";
   	$requetesql.=" ORDER BY " .$ordre ." " .$sens;
   	$requetesql.=";";  
  // 	print_r($requetesql); exit;
   	$this->set('results',$this->Cm->query($requetesql));
   }
    
function patchjoomla() { //patching joomla's 1.5
   }

function mailjoomla() { //mail automatic joomla's users
   }

function versionjoomla() { //check versions
   }

function export() { //a function to export later on dokuwiki or so all info
//do not display layout
$this->layout = '';

}

function csv() { //a function to export in csv
	//do not display layout
		  $this->layout = 'csv';

}	   

function upgrade() {//a function to upgrade a software
  $this->layout = '';
}

function upgradelm() {//a function to create the bash script for upgrading limesurveys
	$this->layout = '';
}

function wpupgradecheck() {//a function to create the bash script for upgrading wordpress
	$this->layout = '';
}


function newc5website () { //create a new concrete5 cms
}

function patchlime() {//automatically upgrade limesurvey
}

function copier($id = null) {
	//$this->copy($id);
	$this->Cm->copy($id);
	$last_id=mysql_query("SELECT id FROM cms ORDER BY id DESC LIMIT 0,1");
	$last_id=mysql_result($last_id, 0,'id');
	//echo "lastid: " .$last_id; exit;
	$this->redirect(array('action'=>'edit', $last_id ."&copy=yes"));

}
}
?>

