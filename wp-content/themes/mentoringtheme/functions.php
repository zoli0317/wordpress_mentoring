<?php

function register_my_custom_menu() {
  register_nav_menu('header-menu',__('Header Menu'));
}

add_action('init', 'register_my_custom_menu');

?>