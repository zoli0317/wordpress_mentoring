<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'My Header Menu' ),
      'footer-menu' => __( 'My Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function my_widget_sidebar() {
    register_sidebar( array(
        'name' => __( 'Own Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
		'class' =>  'custom',
        'description' => __( 'Standard Sidebar', 'theme-slug' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'my_widget_sidebar' );


add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150);
add_image_size( 'thumbnails-size', 150, 150, true ); 



function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

?>