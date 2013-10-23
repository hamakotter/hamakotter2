<?php $this->layout = null; ?>
<!DOCTYPE html>
<html>
<head>
	<?php
		echo $this->Html->css('pc');
		echo $this->Html->script('prototype');
		echo $this->Html->script('jquery.min');
 		echo $this->Html->script('lib');
  		echo $this->Html->script('data');
	?>
	<!-- Ajax -->
	<script type="text/javascript">
		jQuery.noConflict();
		/*
		new Ajax.PeriodicalUpdater(
			"timeline","http://festival.hamako-ths.ed.jp/cakephp/posts/timeline",{
				"method": "get",
				"parameters": "p=hoge",
				frequency: 60, // 60秒ごとに実行
			}
		);
		*/
	</script>
</head>
<body>

	<div id="content">
		 <?php echo $this->Session->flash(); ?>
 		<?php echo $this->Html->image("hamakotter2013.png", array(
			"alt" => "HAMAKOTTER2013",
			'url' => 'index',
			'width'=>'400'
		)); ?>
		<!--	<?php debug($posts); ?> -->
		<?php
			if(isset($userSession)){
				echo $this->Form->create('Post',array('action' => 'add'));
				echo $this->Form->input('tweet',array('rows'=> 3, 'label' => "いまどうしてる？"));
				echo $this->Form->input('user_name', array('value' => $userSession , 'disabled' => 'disabled'));
				echo $this->Form->hidden('user_name',array('value' => $userSession));
				echo $this->Form->hidden('address',array('value' =>  $_SERVER["REMOTE_ADDR"]));
				echo $this->Form->end('ツイート');
			}else{
				echo $this->Form->create('Post',array('action' => 'add'));
				echo $this->Form->input('tweet',array('rows'=> 3, 'label' => "いまどうしてる？"));
				echo $this->Form->input('user_name', array('default' => $name , 'label' => "名前:"));
				echo $this->Form->hidden('address',array('value' =>  $_SERVER["REMOTE_ADDR"]));
				echo $this->Form->end('ツイート');
			}
		?>

		<div id="timeline"></div>
	</div>
	<div id="footer">浜松工業高校情報技術科2013<?php echo $this->Html->link('管理者', '../admin', array('class' => 'button')); ?></div>
</body>
</html>
