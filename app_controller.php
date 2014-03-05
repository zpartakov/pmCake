<?php
/**
 * main cakephp and site fonctions
 * */
 
class AppController extends Controller {
	
 public function beforeFilter() {

/*
 * credit to Simple DB based configuration for CakePHP apps http://lecterror.com/articles/view/simple-db-based-configuration-for-cakephp-apps
 * a useful function to call global variables from a local db instead of having them harcoded in core.php variables
 */
        if (isset($this->Configuration) && !empty($this->Configuration->table))  
        {  
            $this->Configuration->load();  
        }  
    }  
}

?>
