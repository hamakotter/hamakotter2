<?php
App::uses('Sanitize', 'Utility');

class PostsController extends AppController{
	public $helpers = array('Html','Form');
	public $components = array('Session','Cookie','Auth','RequestHandler');
	public $uses = array('Post','NgWord','User');
 	// public $autoLayout = false;


 	public function beforeFilter(){

 		parent::beforeFilter();
    	$this->Cookie->name = 'osushi';
    	$this->Cookie->time = '12 hour';  // または '1 hour'
    	$this->Cookie->path = '/';
    	$this->Cookie->domain = '.festival.hamako-ths.ed.jp';
    	$this->Cookie->secure = false; // セキュアな HTTPS で接続している時のみ発行されます
    	$this->Cookie->key = ':P_TBaZ$Ckc?[|Q{(IE4o|(Z3#*q*t^D-ZS(6&J-#a!)#^G1(>BrxlOW=-VQXU9P';
    	$this->Cookie->httpOnly = true;
    	$this->Auth->allow('index','timeline','add','mobileadd','mobile');
 	}

	public function index(){
		$this->set('ng',$this->NgWord->find('all'));
		// $this->set('debug_post',$this->Post->find('all'));
		$params = array(
      		'limit' => 10,
     	 'order' => array('Post.id DESC'),
   		 );
    //*/
    	$this->set('posts', $this->Post->find('all',$params));
    	$this->set('_serialize', array('posts'));
		
		if($this->Auth->user()!=null){
			$userSesion = $this->set('userSession',$this->Auth->user('username'));
		}else if($this->Cookie->check('name')){
			$this->set('name',$this->Cookie->read('name'));
		}else{
			$this->set('name','');
		}
	}

	public function add(){
		if($this->request->is('post')){
			$this->Post->create();
			$array = $this->NgWord->find('all');
			foreach ($array as $value) {
				if(strpos($this->request->data['Post']['tweet'],$value['NgWord']['word']) ){
					$this->Session->setFlash(__($value['NgWord']['word'].' is NGword'),'default',array('class'=> 'flash_failed'));
                    return $this->redirect(array('action'=>'index'));
                } 
			}
			
			if(!isset($userSession))$this->Cookie->write('name', $this->request->data['Post']['user_name'].false);
			
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash('ツイートしました。', 'default', array('class'=> 'flash_success'));
				return $this->redirect(array('action'=>'index'));
			}
			
			$this->Session->setFlash('Failed', 'default', array('class' => 'flash_failed'));
			return $this->redirect(array('action'=>'index'));
		}
	}
	        
	public function timeline(){
		$params = array(
     		'limit' => 10,
        	'order' => array('Post.id DESC'),
    	);
		$this->set('posts', $this->Post->find('all',$params));
		$this->set('_serialize', array('posts'));

	}

	public function mobileadd(){
		if($this->request->is('post')){
			$this->Post->create();
			$array = $this->NgWord->find('all');
			foreach ($array as $value) {
				if(strpos($this->request->data['Post']['tweet'],$value['NgWord']['word']) ){
					$this->Session->setFlash(__($value['NgWord']['word'].' is NGword'),'default',array('class'=> 'flash_failed'));
                    return $this->redirect(array('action'=>'index'));
                } 
			}

			if(!isset($userSession))$this->Cookie->write('name', $this->request->data['Post']['user_name'].false);

		if($this->Post->save($this->request->data)){
				$this->Session->setFlash('ツイートしました。', 'default', array('class'=> 'flash_success'));
				return $this->redirect(array('action'=>'mobile'));
		}
			$this->Session->setFlash('Failed', 'default', array('class' => 'flash_failed'));
			return $this->redirect(array('action'=>'mobileadd'));
		}
	}

	public function mobile(){
		$this->set('posts', $this->Post->find('all'));
	}

}



