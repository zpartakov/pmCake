<?php
class LesmigrationsController extends AppController {

	var $name = 'Lesmigrations';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');
#criteres de tri
	var $paginate = array(
        'limit' => 100,
        'order' => array(
            'Lesmigration.user_id' => 'asc'
        )
    );
    
    
	function index()
	{
		$this->Lesmigration->recursive = 0;


$options=array(
				'order'=>'User.email ASC'
			);
			

		$users = $this->Lesmigration->User->find('list',$options);

		$statuts = $this->Lesmigration->Statut->find('list');



			$types = $this->Lesmigration->Type->find('list');
		$this->set(compact('types', 'users', 'statuts'));
			$this->set('lesmigrations', $this->paginate($this->Lesmigration, $this->AlaxosFilter->get_filter()));

				/*if($_GET['vhost']==1) {
			#echo "testbla"; exit;
			$options=array('conditions' => array('Lesmigration.user_id = ' => '47'));
		}
					$lesmigrations = $this->Lesmigration->find('list',$options);

			#$lesmigrations=$this->Lesmigration;
			$this->set('lesmigrations', $this->paginate($lesmigrations, $this->AlaxosFilter->get_filter()));
			* */
		
	}
	
	
	function indexdetail()
	{
		$this->Lesmigration->recursive = 0;
		$this->set('lesmigrations', $this->paginate($this->Lesmigration, $this->AlaxosFilter->get_filter()));
/*		array(

	'conditions' => array('Model.field' => $thisValue), //array of conditions
	'order' => array('Model.created', 'Model.field3 DESC'), //string or array defining order
)
*/		
		$types = $this->Lesmigration->Type->find('list');
		$users = $this->Lesmigration->User->find('list');
		$statuts = $this->Lesmigration->Statut->find('list');
		$servers = $this->Lesmigration->Server->find('list');
		$this->set(compact('types', 'users', 'statuts', 'servers'));
	}
	
	
	function view($id = null)
	{
		$types = $this->Lesmigration->Type->find('list');
		$statuts = $this->Lesmigration->Statut->find('list');
		$users = $this->Lesmigration->User->find('list');
		$servers = $this->Lesmigration->Server->find('list');
		$this->set(compact('types', 'users', 'statuts', 'servers'));

				
		$this->_set_lesmigration($id);

	}

	function add()
	{
		if (!empty($this->data))
		{
			$this->Lesmigration->create();
			if ($this->Lesmigration->save($this->data))
			{
				$this->Session->setFlash(___('the lesmigration has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the lesmigration could not be saved. Please, try again.', true), 'flash_error');
			}
		}
			$types = $this->Lesmigration->Type->find('list');
		$users = $this->Lesmigration->User->find('list');
		$statuts = $this->Lesmigration->Statut->find('list');
						$this->set(compact('types', 'users', 'statuts'));

		
	}

	function edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid lesmigration', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->Lesmigration->save($this->data))
			{
				$this->Session->setFlash(___('the lesmigration has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the lesmigration could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		
		$this->_set_lesmigration($id);
		$types = $this->Lesmigration->Type->find('list');
			$options=array(
				'order'=>'User.email ASC'
			);
		$users = $this->Lesmigration->User->find('list',$options);
		#$users = $this->Lesmigration->User->find('list');
		$statuts = $this->Lesmigration->Statut->find('list');
						$this->set(compact('types', 'users', 'statuts'));

		
	}

	function delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for lesmigration', true), 'flash_error');
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Lesmigration->delete($id))
		{
			$this->Session->setFlash(___('lesmigration deleted', true), 'flash_message');
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('lesmigration was not deleted', true), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
	
	function actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
            if(isset($this->Acl) && $this->Acl->check($this->Auth->user(), 'Lesmigrations/' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Lesmigration/id[id > 0]', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Lesmigration->deleteAll(array('Lesmigration.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(__('Lesmigrations deleted', true), 'flash_message');
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(__('Lesmigrations were not deleted', true), 'flash_error');
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(__('No lesmigration to delete was found', true), 'flash_error');
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
	
	function _set_lesmigration($id)
	{
		if(empty($this->data))
	    {
    	    $this->data = $this->Lesmigration->read(null, $id);
            if($this->data === false)
            {
                $this->Session->setFlash(___('invalid id for Lesmigration', true), 'flash_error');
                $this->redirect(array('action' => 'index'));
            }
	    }
	    
	    $this->set('lesmigration', $this->data);
	}
	
		/* fonction de résumé pour avoir un tableau de bord
	 * 
	 * affiche la page
	 * */
	
	function leresume() {
	}

	function ajusteimportcsv() {
	}
	/* creer script de migration*/
	function createscript($id = null) 	{
		 //do not display layout
                $this->layout = '';

	}
		
	function graphique() {
		                $this->layout='jpgraph';

	}
	
}
/* #################################################### 
 * FONCTIONS SEPAREES DE CAKE
 * */


 function graphiquedo() {

			 			$sql="
							SELECT COUNT(*) FROM lesmigrations
				";
		$sql=mysql_query($sql);
		$sql=mysql_fetch_row($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$tous=$sql[0];
			
			/*pas commencés*/
				$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`<2
				";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$vide=mysql_num_rows($sql);
			
			/*commencés*/
			
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=2
				";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$ouvert=mysql_num_rows($sql);
			
			/*en cours*/
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=3
				";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$onfield=mysql_num_rows($sql);

			/*en attente*/
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=4
				";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$wait=mysql_num_rows($sql);

			
			/*finis
			 * */
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=5
				";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$finis=mysql_num_rows($sql);

		/*supprimés*/
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=6				";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$supprimes=mysql_num_rows($sql);


		/*archivés*/
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=7
				";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$archive=mysql_num_rows($sql);
			
			/*logins nix*/
		$sql="
							SELECT COUNT(DISTINCT(`user_id`)) FROM `lesmigrations`
				";
		$sql=mysql_query($sql);
		$sql=mysql_fetch_row($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$nixall=$sql[0];
			
		$sql="
							SELECT COUNT(DISTINCT(`user_id`)) FROM `lesmigrations` WHERE `statut_id`>4
				";
		$sql=mysql_query($sql);
		$sql=mysql_fetch_row($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$nixok=$sql[0];
			$nix2do=$nixall-$nixok;
			

		/*print the results*/
				/* BEGIN MOD lesmigrations_controller.php Frederic.Radeff@unige.ch  23.02.2011 15:16:14 CET */
	 global $no;
			$no=$vide+$ouvert+$onfield+$wait;
					 global $yes;
				$yes=$finis+$supprimes+$archive;


}
function writefunctionvars() {

    global $foo;
    $foo = "something";

}

		function pourcentages($variable,$total) {
			if($variable==0) {
				return " <em>(0 %)</em>";
				} else {
					return " <em>(".intval(100*($variable)/$total) ."  %)</em>";
				}
			}

/* resume on the page resume.ctp the status of all current migrations */
function resumer($serveurcible) {
	
			/*tous*/
				$sql="
							SELECT COUNT(*) FROM lesmigrations
				";
				$sql.=" WHERE serveurcible=".$serveurcible;
		$sql=mysql_query($sql);
		$sql=mysql_fetch_row($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$tous=$sql[0];
			
			/*pas commencés*/
				$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`<2
				";
								$sql.=" AND serveurcible=".$serveurcible;

		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$vide=mysql_num_rows($sql);
			
			/*commencés*/
			
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=2
				";
												$sql.=" AND serveurcible=".$serveurcible;

		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$ouvert=mysql_num_rows($sql);
			
			/*en cours*/
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=3
				";
												$sql.=" AND serveurcible=".$serveurcible;

		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$onfield=mysql_num_rows($sql);

			/*en attente*/
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=4
				";
												$sql.=" AND serveurcible=".$serveurcible;

		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$wait=mysql_num_rows($sql);

			
			/*finis
			 * */
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=5
				";
												$sql.=" AND serveurcible=".$serveurcible;

		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$finis=mysql_num_rows($sql);

		/*supprimés*/
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=6				";
															$sql.=" AND serveurcible=".$serveurcible;

		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$supprimes=mysql_num_rows($sql);


		/*archivés*/
			$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`=7
				";
												$sql.=" AND serveurcible=".$serveurcible;

		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$archive=mysql_num_rows($sql);
			
			/*logins nix*/
		$sql="
							SELECT COUNT(DISTINCT(`user_id`)) FROM `lesmigrations`
				";
												$sql.=" WHERE serveurcible=".$serveurcible;

		$sql=mysql_query($sql);
		$sql=mysql_fetch_row($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$nixall=$sql[0];
			
		$sql="
							SELECT COUNT(DISTINCT(`user_id`)) FROM `lesmigrations` WHERE `statut_id`>4
				";
																$sql.=" AND serveurcible=".$serveurcible;

		$sql=mysql_query($sql);
		$sql=mysql_fetch_row($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$nixok=$sql[0];
			$nix2do=$nixall-$nixok;
			$pourcentonfield=intval(100*($vide+$ouvert+$onfield+$wait)/($finis+$supprimes+$archive+$vide+$ouvert+$onfield+$wait));

		/*print the results*/
/*
 * 						  <td>" .$vide ." (" .intval(100*($vide+1)/$tous)."%) </td>
*/
			echo "<div style=\"background-color: #FFAFAF;\">
			<h2 style=\"background-color: #FFAFAF;\">Nombre total de migrations de sites: " .$tous ."</h2><table>
			<tr><th>vide</th><th>ouvert</th><th>en cours</th><th>en attente</th><th>fini</th><th>supprimé</th><th>archivé</th></tr>
					  <tr>
						  <td>" .$vide ." </td>
						  <td>" .$ouvert ." </td>
						  <td>" .$onfield ." </td>
						  <td>" .$wait ." </td>
						  <td>" .$finis ." </td>
						  <td>" .$supprimes ." </td>
						  <td>" .$archive ." </td>
					  </tr>
					  <tr background=\"yellow\">
					  	  <td>" .pourcentages($vide,$tous) ." </td>
						  <td>" .pourcentages($ouvert,$tous) ." </td>
						  <td>" .pourcentages($onfield,$tous)  ." </td>
						  <td>" .pourcentages($wait,$tous)  ." </td>
						  <td>" .pourcentages($finis,$tous)  ." </td>
						  <td>" .pourcentages($supprimes,$tous)  ." </td>
						  <td>" .pourcentages($archive,$tous)  ." </td>
					  </tr>
					  <tr style=\"background-color: #FFAFAF;\"><td>Total</td><td colspan=\"6\"><span style=\"background-color: #FFE8BF;\">"
					  
					  .($vide+$ouvert+$onfield+$wait) ." <em>(" .$pourcentonfield ." %)</em>" 
					  ."</span> / <span style=\"background-color: #CDF9CD;\">"
					  .($finis+$supprimes+$archive) ." <em>(" .(100-$pourcentonfield) ." %)</em>"
					  
					   ."</span></td></tr>
				  </table></div>";

			echo "<div style=\"background-color: #D0EED0;\">
			<h2 style=\"background-color: #D0EED0;\">Nombre total de logins unix: " .$nixall ."</h2><table>
			<tr><th>todo</th><th>ok</th></tr>
					  <tr>
						  <td>" .$nix2do ." </td>
						  <td>" .$nixok ." </td>

					  </tr>
					  <tr background=\"yellow\">
					  	  <td>" .pourcentages($nix2do,$nixall) ." </td>
						  <td>" .pourcentages($nixok,$nixall) ." </td>
						 
					  </tr>
				  </table></div>";

	}



	/* calcul des vhosts
	 * */
	function vhosts() {
		$sql="SELECT * FROM lesmigrations WHERE vhost NOT LIKE '' AND vhost LIKE '%.%' AND serveursource=1";
		#echo $sql ."<br>";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$totvh=mysql_num_rows($sql);
			#echo $totvh; exit;
		$sql="SELECT * FROM `lesmigrations` WHERE vhost NOT LIKE '' AND `statut_id`>4  AND serveursource=1";
		#echo $sql ."<br>";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$vhok=mysql_num_rows($sql);
			$vhok=$vhok-2;
			$todovh=$totvh-$vhok;
					echo "<div style=\"background-color: #BFEFFF;\">
			<h2 style=\"background-color: #BFEFFF;\">Total Virtual Hosts: " .$totvh ."</h2><table>
			<tr><th>todo</th><th>ok</th></tr>
					  <tr>
						  <td>" .$todovh ." </td>
						  <td>" .$vhok ." </td>

					  </tr>
					  <tr background=\"yellow\">
					  	  <td>" .pourcentages(($totvh-$vhok),$totvh) ." </td>
						  <td>" .pourcentages($vhok,$totvh) ." </td>
						 
					  </tr>
				  </table></div>";
	}


/* calcule le nombre d'heures passées et à venir
 * */

function calcul_heures() {
$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`<5
				";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$todo=mysql_num_rows($sql);
	
	$sql="
							SELECT * FROM lesmigrations WHERE `statut_id`>4
				";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$finis=mysql_num_rows($sql);
			
			$sql="
							SELECT SUM(temps_reel) AS tr FROM lesmigrations WHERE `statut_id`>4
				";
		$sql=mysql_query($sql);
			if(!$sql) {
				echo "sql error: " .$sql ."<br>" .mysql_error(); exit;
			}	
			$heures=mysql_result($sql,0,'tr');
			echo "<h2>Estimation du temps</h2><h3>Temps total: " .$heures ."</h3>";
			echo "<h3>Temps moyen: " .intval($heures/$finis) ."</h3>";
			echo "<h3>Temps restant: " .intval($todo*($heures/$finis))."h = " .intval(($todo*($heures/$finis)/8)) ." jours</h3>";
			$aujourdhui=date("U", mktime());

			$semaines=intval((intval(($todo*($heures/$finis)/8))*4)*7);
			#echo "Jours : " .$semaines;

$delai  = mktime(0, 0, 0, date("m")  , date("d")+$semaines, date("Y"));

echo "A raison de 4h / semaines, la migration sera finie le " .date("D, d-M-Y", $delai);
}
	

	
?>
