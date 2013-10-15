<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('tweet',array('rows'=>3));
	echo $this->Form->end('save Post');
?>