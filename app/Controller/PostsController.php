<?php

class PostsController extends AppController{

        public $helpers = array('Html','Form');
        public $components = array('Session');
        public $uses = array('Post','NgWord');

        public function index(){
                $this->set('posts', $this->Post->find('all'));
                $this->set('ng',$this->NgWord->find('all'));
        }

        public function add(){
                if($this->request->is('post')){
                        $this->Post->create();
                        $array = $this->NgWord->find('all');
                        foreach ($array as $value) {
                                if( !strpos($this->request->data['Post']['tweet'],$value['NgWord']['word']) ){
                                        $this->Session->setFlash(__($value['NgWord']['word'].' is NGword'));
                                        return $this->redirect(array('action'=>'index'));
                                }
                        }
                        if($this->Post->save($this->request->data)){
                                $this->Session->setFlash('ツイートしました。', 'default', array('class'=> 'message success'));
                                return $this->redirect(array('action'=>'index'));
                        }
                        $this->Session->setFlash(__('Failed'));
                        return $this->redirect(array('action'=>'index'));
                }
        }

}

?>
