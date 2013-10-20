<html>
<head></head>

<body>
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User', Array('url' => '/admin/login')); ?>

	<?php echo $this->Form->input('username'); ?>
	<?php echo $this->Form->input('password'); ?>

	<?php echo $this->Html->link('新しいユーザーの追加','/admin/useradd',array('class'=>'button')) ?>

	<?php echo $this->Form->end('ログイン'); ?>
</body>

</html>