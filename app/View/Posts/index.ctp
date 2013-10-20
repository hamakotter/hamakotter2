<html>
<head>
</head>
<body>
	<h1>tweets</h1>
  <div id="tweet-form">
    <?php
//	echo $this->Form->create('Post',array('action' => 'add'));
    echo $this->Form->input('user_name', array('value'=>'!!NANASHI!!'));
    echo $this->Form->input('tweet',array('rows'=>3));
//	echo $this->Form->hidden('address',array('value' => '192.168.11.1'));
//	echo $this->Form->end('Post');
?>
    <button id="tweet-btn">つぶやく</button>
  </div>
	<table id="tweets">
  </table>
  <button id="old-tweets-btn">過去の</button>
<?php
  echo $this->Html->script('jquery.min');
  echo $this->Html->script('lib');
  echo $this->Html->script('data');
?>
</body>
</html>