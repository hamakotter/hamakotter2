<?php

	class LoginController extends AppController{
		public $uses = array('Post','User');
		public $components = array('Session','Auth' => array(
                'loginRedirect' => Array('controller'  => 'posts', 'action' => 'index'),
                'logoutRedirect' => Array('controller' => 'posts', 'action' => 'index'),
            ));

		public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('useradd', 'login','index');
		}

		public function index(){
			if($this->request->is('post')){
				if($this->Auth->login()){
            		return $this->redirect($this->Auth->redirectUrl());
					//return $this->redirect($this->Auth->redirect());
				}else{
					$this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
				}
			}
		}		

		public function logout($id = null){
			$this->redirect($this->Auth->logout());
		}

		public function useradd(){
			if($this->request->is('post')){
				$this->User->create();
				if($this->User->save($this->request->data)){
					$this->Session->setFlash(__('The user has been saved'));
					$this->redirect(array('action' => 'login'));
				}else{
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			}
		}
	}

?>
