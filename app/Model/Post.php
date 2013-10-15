<?php

	class Post extends AppModel{
		public $validate = array(
			'tweet' => array(
				'rule' => 'notEmpty'
			)
		);
	}

?>