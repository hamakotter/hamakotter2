<?php

class PostsController extends AppController{
	public $helpers = array('Html','Form');
	public $components = array('Session');

	public function index(){
		$this->set('posts', $this->Post->find('all'));
	}

	public function add(){
		if($this->request->is('post')){
			$this->Post->create();
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash(__('Success!'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Failed'));
		}
	}

}

?>