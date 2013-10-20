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
      'limit' => 10,
      'order' => array('Post.id DESC'),
    );
    $this->set('posts', $this->Post->find('all',$params));
    $this->set('_serialize', array('posts'));
  }
  
	public function index(){
    //*
    $params = array(
      'limit' => 10,
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
      $this->request->data['Post']['address'] = $this->request->clientIp(false);
			if($this->Post->save($this->request->data)){
        $this->set('posts',array('res'=>'0',$this->request->data));
			} else {
        $this->set('posts',array('res'=>'1'));
      }
      $this->set('_serialize', array('posts'));
		}
	}

}

?>