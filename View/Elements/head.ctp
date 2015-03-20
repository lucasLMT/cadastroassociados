<head>	
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css(
			array(
				'template/metisMenu.min.css',
				'template/timeline.css',
				'template/sb-admin-2.css',
				'template/font-awesome.min.css'
				)
			);
		echo $this->fetch('css');

		echo $this->Html->script('jquery');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script(
			array(
				'template/metisMenu.min.js',
				'template/sb-admin-2.js',
				'template/holder.js'
				)
			); 
	?>
</head>	