<?php

function register_my_custom_menu() {
  register_nav_menu('header-menu',__('Header Menu'));
}

add_action('init', 'register_my_custom_menu');


function bazz_widget_sidebar(){
	register_sidebar(
		array(						
			'name' =>  'OwnSidebar',
			'id' =>  'sidebar-001',
			'class' =>  'custom',
			'description' =>  'Standard Sidebar',
			'before_widget' =>  '<aside id="%1$s" class="widget %2$s">',	
			'after_widget' =>  '</aside>',
			'before_title' =>  '<h1 class="widget-title">',
			'before_title' =>  '</h1>',
		)
	);
}
add_action('widget_init', 'bazz_widget_sidebar');

?>