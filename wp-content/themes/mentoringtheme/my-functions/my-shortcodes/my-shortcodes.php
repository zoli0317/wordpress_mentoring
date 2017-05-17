<?php

add_shortcode('my_lorem_text', 'lorem_function');

function lorem_function() {
  return 'THIS IS MY SHORTCODE TEXT: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec nulla vitae lacus mattis volutpat eu at sapien. Nunc interdum congue libero, quis laoreet elit sagittis ut. Pellentesque lacus erat, dictum condimentum pharetra vel, malesuada volutpat risus. Nunc sit amet risus dolor. Etiam posuere tellus nisl. Integer lorem ligula, tempor laoreet.';
}


add_shortcode('my_random_picture', 'random_picture');

function random_picture($atts) {
   	extract(shortcode_atts(array(
    	'width' => 400,
    	'height' => 200,
   	), $atts));
	return '<div class="shortcode_container">
          		<img src="https://lorempixel.com/'. $width . '/'. $height . '" />
          	</div>
          	<p class="shortcode_label">Width = ' . $width . 'px and Height = ' . $height . ' px</p>';
}