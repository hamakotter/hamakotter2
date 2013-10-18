<html>
<head></head>

<body>
	<div class = "admin form">
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('User', Array('url' => '/admin/useradd')); ?>

		<?php echo $this->Form->input('username'); ?>
		<?php echo $this->Form->input('password'); ?>

		<?php echo $this->Form->end('アカウントを作成'); ?>
	</div>
</body>

</html>