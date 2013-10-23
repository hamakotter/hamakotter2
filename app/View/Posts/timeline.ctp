<html>
<head>

</head>
</body>
<?php $this->layout = null; ?>
<?php $posts = array_reverse($posts); ?>
<?php foreach ($posts as $value): ?>
	<?php if($value['Post']['user_name']=="Admin"){ ?>
	<div id="post_admin">
		<div class="icon"><?php
			echo $this->Html->image('admin.png', array('width' => '100%'));
		?>
	<?php }else{ ?>
	<div id="post">
		<div class="icon"><?php
			$n = 0;
			$h = sha1($value['Post']['address']);
			for($i = 0; $i < strlen($h); $i++){
				$n += $h[$i];
			}
			$icon = "icon".((string)($n % 5)).".png";
			echo $this->Html->image($icon, array('width' => '100%'));
		?>
	<?php } ?>

	</div>
		<div class="user"><?php echo $value['Post']['user_name']; ?></div>
		<div class="date"><?php echo $value['Post']['created']; ?></div>
		<div class="tweet"><?php echo Sanitize::html($value['Post']['tweet'],array('remove' => true)) ?></div>
	</div>
<?php endforeach; ?>
 <div id="timeline">
 </div>
<?php unset($post); ?>
<?php
  echo $this->Html->script('jquery.min');
  echo $this->Html->script('lib');
  echo $this->Html->script('data');
?>
</body>
</html>
