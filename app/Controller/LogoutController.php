<?php

	class LogoutController extends AppController{
		public $uses = array('Post','User');
		public $components = array('Session','Auth' => array(
                'logoutRedirect' => Array('controller' => 'posts', 'action' => 'index'),
            ));

		public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('useradd', 'login','index');
		}

		public function index(){
			$this->redirect($this->Auth->logout());
		}


	}

?>
