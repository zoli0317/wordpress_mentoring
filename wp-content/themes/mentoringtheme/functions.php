<?php

/*******************************************
		Register the Featured Images
*******************************************/
add_theme_support( 'post-thumbnails' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * My menus.
 */
require get_template_directory() . '/my-functions/my-menus/my-menus.php';

/**
 * My sidebars.
 */
require get_template_directory() . '/my-functions/my-sidebars/my-sidebars.php';

/**
 * Add background color selector.
 */
require get_template_directory() . '/my-functions/background-color-selector/background-color-selector.php';

/**
 * Add admin menu.
 */
require get_template_directory() . '/my-functions/admin-menu/admin-menu.php';

/**
 * Add social share buttons (Under the content).
 */
require get_template_directory() . '/my-functions/social-share-buttons/social-share-buttons.php';

/**
 * Add 'my_lorem_text' and 'my_random_picture' shortcodes.
 */
require get_template_directory() . '/my-functions/my-shortcodes/my-shortcodes.php';

/**
 * Add '+My Basic Widget+' widget.
 */
require get_template_directory() . '/my-functions/my-widget/my_basic_widget.php';