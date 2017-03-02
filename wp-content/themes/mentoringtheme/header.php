<!DOCTYPE html>
<html>
    <head>
        <title><?php the_title(); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main.css" type="text/css" />
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="main-wrapper">
            <header>
				<div class="banner-container">
					<a href="http://mentoring.angryportfolio.com/" class="banner"></a>
				</div>
				<div class="menus">
					<?php wp_nav_menu(array('theme_location' => 'header-menu', 'container_class' => 'header-menu')); ?>
				</div>
            </header>
