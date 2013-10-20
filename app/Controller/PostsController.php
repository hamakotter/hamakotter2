<?php

class PostsController extends AppController{
	public $helpers = array('Html','Form');
	public $components = array('Session','RequestHandler');
  
  public function newer() {
    $sql = "SELECT * FROM Post ";
    $params = array(
      'conditions' => array('Post.id >'=>$this->params['url']['o']),
      'order' => array('Post.id DESC'),
    );
    $this->set('posts', $this->Post->find('all',$params));
    $this->set('_serialize', array('posts'));
  }

  public function older() {
    $params = array(
      'conditions' => array('Post.id <'=>$this->params['url']['o']),
      'limit' => 3,
      'order' => array('Post.id DESC'),
    );
    $this->set('posts', $this->Post->find('all',$params));
    $this->set('_serialize', array('posts'));
  }
  
	public function index(){
    //*
    $params = array(
      'limit' => 3,
      'order' => array('Post.id DESC'),
    );
    //*/
    $this->set('posts', $this->Post->find('all',$params));
    $this->set('_serialize', array('posts'));
    //		$this->set('posts', $this->Post->find('all'));
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