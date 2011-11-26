<?php /* Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de> */ ?>
<!doctype html>
	<head>
		<meta name="viewport" content="initial-scale=1.0, width=device-width">
		<?php echo $this->Html->charset(); ?>
		<?php echo $this->Html->css('default'); ?>

		<title><?php echo $title_for_layout; ?></title>
	</head>
	<body>

		<div id="page">
			<?php echo $this->Session->flash(); ?>
			
			<div id="header">
			<?php echo $this->Html->image('cakemarks.png'); ?>
			<?php echo $this->element('navigation'); ?>
			</div>
			<?php echo $this->element('quote'); ?>
			<?php echo $content_for_layout; ?>

			<div id="keyword_tree">
				<h2><?php __('Keywords'); ?></h2>
				<?php echo $this->element('keyword_tree',
					array('show_edit' => false)); ?>
			</div>


			<?php echo $this->element('sticky_keywords'); ?>
			<?php if ($this->params['controller'] != 'bookmarks'
				|| ($this->params['action'] != 'add'
				&& $this->params['action'] != 'edit')) {
				echo $this->element('quickadd');
			}
			?>

			<?php echo $this->element('stats'); ?>
		</div>
	</body>
</html>
