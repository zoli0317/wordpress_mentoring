<?php
function social_share_buttons($content) {
	global $post;
	if(is_singular() || is_home()){

		$my_settings = get_option("my_options", $my_settings);

		$crunchifyURL = urlencode(get_permalink());						// Get current page URL 
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());	// Get current page title
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );	// Get Post Thumbnail for pinterest
 
		// Construct sharing URL without using any script
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 
		// Add sharing button at the end of page/page content
		$content .= '<!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
		$content .= '<div class="crunchify-social">';
		$content .= '<h5>SHARE ON</h5>';
		if($my_settings['social_share_facebook'] == 'facebook'){
			$content .= '<a class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		}
		if($my_settings['social_share_twitter'] == 'twitter'){
			$content .= '<a class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		}
		if($my_settings['social_share_google'] == 'google'){
			$content .= '<a class="crunchify-link crunchify-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		}
		if($my_settings['social_share_linkedIn'] == 'linkedIn'){
			$content .= '<a class="crunchify-link crunchify-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
		}
		if($my_settings['social_share_pinIt'] == 'pinIt'){
			$content .= '<a class="crunchify-link crunchify-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank">Pin It</a>';
		}
		$content .= '</div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
