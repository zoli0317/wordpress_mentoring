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