<?php

function styles_and_scripts() {
    $desktop_stylesheet_uri = get_template_directory_uri() . "/desktop.css";
    wp_enqueue_style( 'mentoring-desktop-style', $desktop_stylesheet_uri, '', hash_file( 'md5', $desktop_stylesheet_uri ) );

    $script_uri = get_template_directory_uri() . '/script' . (WP_DEBUG ? '' : '') . '.js';
    wp_enqueue_script( 'mentoring-script', $script_uri, array( 'jquery' ), hash_file( 'md5', $script_uri ), true );
}

add_action( 'wp_enqueue_scripts', 'styles_and_scripts' );

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