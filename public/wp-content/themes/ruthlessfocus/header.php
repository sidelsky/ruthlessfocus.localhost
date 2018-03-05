<!doctype html>
<html <?php language_attributes(); ?>>

	<head>
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>

		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />

		<link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" rel="shortcut icon" />

		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		<?php
			//Include SVG Sprite
			include('assets/build/svg-sprite.svg');
		?>

		<div class="page-wrap">

			<header class="page-header">

				<?php if (is_front_page()): ?>

					<h1 class="page-header__logo">
						<a href="<?php echo home_url(); ?>">
							<?php bloginfo('name'); ?>
						</a>
					</h1>

				<?php else: ?>

					<div class="page-header__logo">
						<a href="<?php echo home_url(); ?>">
							<?php bloginfo('name'); ?>
						</a>
					</div>

				<?php endif; ?>

			</header>

			<nav class="site-nav">

				<?php
					//Nav Menu
					$args = array(
						'container'       =>	'',
						'echo'            =>	true,
						'items_wrap'			=>	'<ul class="site-nav__menu">%3$s</ul>'
					);
					wp_nav_menu($args);
				?>

			</nav>
