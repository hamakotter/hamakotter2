<html>
<head></head>
<body>
	<h1>tweets</h1>
	<?php
	echo $this->Form->create('Post',array('action' => 'add'));
	echo $this->Form->hidden('user_name', array('value'=>'Admin'));
	echo $this->Form->input('tweet',array('rows'=>3));
	echo $this->Form->hidden('address',array('value' => '192.168.11.1'));
	echo $this->Form->end('Post');
?>
	<?php debug($ng); ?>
	<table>
		<?php $posts = array_reverse($posts); ?>
		<?php foreach ($posts as $value): ?>
		<tr>
			<td>
				<?php echo $value['Post']['tweet'];?>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php unset($post); ?></table>
</body>
</html>