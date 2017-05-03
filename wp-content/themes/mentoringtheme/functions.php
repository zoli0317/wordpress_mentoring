<?php

/*******************************************
			Register the menus
*******************************************/
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'My Header Menu' ),
      'footer-menu' => __( 'My Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


/*******************************************
		Register the PAGE sidebar
*******************************************/
function my_page_sidebar() {
    register_sidebar( array(
        'name' => __( 'Own Page Sidebar', 'theme-slug' ),
        'id' => 'page-sidebar-1',
		'class' =>  'custom',
        'description' => __( 'Standard Page Sidebar', 'theme-slug' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'my_page_sidebar' );


/*******************************************
		Register the POST sidebar
*******************************************/
function my_post_sidebar() {
    register_sidebar( array(
        'name' => __( 'Own Post Sidebar', 'theme-slug' ),
        'id' => 'post-sidebar-1',
		'class' =>  'custom',
        'description' => __( 'Standard Post Sidebar', 'theme-slug' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'my_post_sidebar' );


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
 * Add page type selector.
 */
require get_template_directory() . '/post-meta/page_type_selector.php';

/**
 * Add custom admin menu.
 */
require get_template_directory() . '/custom-admin-menu/custom-admin-menu.php';
add_action( 'admin_menu', 'register_my_custom_menu' );

/**
 * Add Social Share buttons (Under the content).
 */
require get_template_directory() . '/social-share-buttons/social-share-buttons.php';
add_filter( 'the_content', 'social_share_buttons');
