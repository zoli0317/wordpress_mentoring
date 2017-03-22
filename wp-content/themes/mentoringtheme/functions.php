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
		Register the POSTs path
*******************************************/
function my_single_template() {
	global $post;

	if(file_exists(SINGLE_PATH . '/single-' . $post->ID . '.php'))
		return SINGLE_PATH . '/single-' . $post->ID . '.php';
}
define(SINGLE_PATH, TEMPLATEPATH . '/single');
add_filter('single_template', 'my_single_template');


/*******************************************
		Register the Featured Images
*******************************************/
add_theme_support( 'post-thumbnails' );

?>