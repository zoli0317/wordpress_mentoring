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


/*******************************************
		Register the Social Share Buttons
*******************************************/
function crunchify_social_sharing_buttons($content) {
	global $post;
	if(is_singular() || is_home()){
	
		// Get current page URL 
		$crunchifyURL = urlencode(get_permalink());
 
		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 
		// Add sharing button at the end of page/page content
		$content .= '<!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
		$content .= '<div class="crunchify-social">';
		$content .= '<h5>SHARE ON</h5>';
		$content .= '<a class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		$content .= '<a class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$content .= '<a class="crunchify-link crunchify-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		$content .= '<a class="crunchify-link crunchify-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
		$content .= '<a class="crunchify-link crunchify-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank">Pin It</a>';
		$content .= '</div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'crunchify_social_sharing_buttons');