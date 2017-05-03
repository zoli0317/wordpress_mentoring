<?php

function register_my_custom_menu(){
    add_menu_page( 
        __( 'Custom Menu Title', 'textdomain' ),
        'Custom Theme Options',
        'manage_options',
        'custompage',
        'my_custom_menu',								//ez a metodus neve, amit meghiv
        plugins_url( '../themes/mentoringtheme/images/icon.png' ),
        66
    ); 
}

function my_custom_menu(){
	wp_enqueue_media();

	$my_settings = array(
		'banner_image' => '', 
		'social_share_facebook' => 'false', 
		'social_share_twitter' => 'false', 
		'social_share_google' => 'false', 
		'social_share_linkedIn' => 'false', 
		'social_share_pinIt' => 'false', 
		'social_link_checkbox_facebook' => 'false', 
		'social_link_text_facebook' => '', 
		'social_link_checkbox_twitter' => 'false', 
		'social_link_text_twitter' => '',
	);

	$my_settings = get_option("my_options", $my_settings);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    $my_settings['banner_image'] = $_POST["banner_image"];

	    $my_settings['social_share_facebook'] = $_POST["social_share_facebook"];
	    $my_settings['social_share_twitter'] = $_POST["social_share_twitter"];
	    $my_settings['social_share_google'] = $_POST["social_share_google"];
	    $my_settings['social_share_linkedIn'] = $_POST["social_share_linkedIn"];
	    $my_settings['social_share_pinIt'] = $_POST["social_share_pinIt"];

	    $my_settings['social_link_checkbox_facebook'] = $_POST["social_link_checkbox_facebook"];
	    $my_settings['social_link_text_facebook'] = $_POST["social_link_text_facebook"];
	    $my_settings['social_link_checkbox_twitter'] = $_POST["social_link_checkbox_twitter"];
	    $my_settings['social_link_text_twitter'] = $_POST["social_link_text_twitter"];

	    update_option("my_options", $my_settings);
	}

    $banner_image = $my_settings["banner_image"];

    $social_share_facebook = $my_settings["social_share_facebook"];
    $social_share_twitter = $my_settings["social_share_twitter"];
    $social_share_google = $my_settings["social_share_google"];
    $social_share_linkedIn = $my_settings["social_share_linkedIn"];
    $social_share_pinIt = $my_settings["social_share_pinIt"];

    $social_link_checkbox_facebook = $my_settings["social_link_checkbox_facebook"];
    $social_link_text_facebook = $my_settings["social_link_text_facebook"];
    $social_link_checkbox_twitter = $my_settings["social_link_checkbox_twitter"];
    $social_link_text_twitter = $my_settings["social_link_text_twitter"];
?>

	<h2>Custom Theme Options:</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?page=custompage');?>">  

	  <!-- ***IMAGE SELECTOR***  -->
	  <h3>Banner Selector:</h3>
		<?php

		wp_enqueue_script( 'select_image', get_template_directory_uri() . '/js/select_image.js', array(), '', true );	//USE JS FOR THE IMAGE SELECTOR

		global $post;
		$upload_link = esc_url( get_upload_iframe_src( 'image', $post->ID ) );	// Get WordPress' media upload URL
		$your_img_id = get_post_meta( $post->ID, '_your_img_id', true );		// See if there's a media id already saved as post meta
		$your_img_src = wp_get_attachment_image_src( $your_img_id, 'full' );	// Get the image src
		$you_have_img = is_array( $your_img_src );								// For convenience, see if the array is valid
		?>

		<div class="custom-img-container">										<!-- Your image container, which can be manipulated with js -->
	        <img src="<?php echo $banner_image; ?>" alt="" style="max-width:200px;" />
	        <input type="text" name="banner_image" value="<?php echo $banner_image; ?>" style="display:none;"/>
		</div>

		<p class="hide-if-no-js">												<!-- Your add & remove image links -->
		    <a class="upload-custom-img <?php if ( $you_have_img  ) { echo 'hidden'; } ?>" 
		       href="<?php echo $upload_link ?>">
		        <?php _e('Set custom image') ?>
		    </a>
		    <a class="delete-custom-img <?php if ( ! $you_have_img  ) { echo 'hidden'; } ?>" 
		      href="#">
		        <?php _e('Remove this image') ?>
		    </a>
		</p>

		<input class="custom-img-id" name="custom-img-id" type="hidden" value="<?php echo esc_attr( $your_img_id ); ?>" />		<!-- A hidden input to set and post the chosen image id -->
		
		<!-- ***IMAGE SELECTOR END***  -->

	  <h3>Social Share Buttons:</h3>
		<input type="checkbox" name="social_share_facebook" <?php if (isset($social_share_facebook) && $social_share_facebook=="facebook") echo "checked";?> value="facebook">Facebook<br>
		<input type="checkbox" name="social_share_twitter" <?php if (isset($social_share_twitter) && $social_share_twitter=="twitter") echo "checked";?> value="twitter">Twitter<br>
		<input type="checkbox" name="social_share_google" <?php if (isset($social_share_google) && $social_share_google=="google") echo "checked";?> value="google">Google+<br>
		<input type="checkbox" name="social_share_linkedIn" <?php if (isset($social_share_linkedIn) && $social_share_linkedIn=="linkedIn") echo "checked";?> value="linkedIn">LinkedIn<br>
		<input type="checkbox" name="social_share_pinIt" <?php if (isset($social_share_pinIt) && $social_share_pinIt=="pinIt") echo "checked";?> value="pinIt">Pin It<br>
	  
	  <h3>Social Link Buttons:</h3>
		<div>
			<label>Facebook:</label>
			<input type="checkbox" 
					class="social_link_checkbox_facebook"
					name="social_link_checkbox_facebook"
					<?php if (isset($social_link_checkbox_facebook) && $social_link_checkbox_facebook=="facebook_link") echo "checked";?> 
					value="facebook_link">
			</input>
			<input type="text" name="social_link_text_facebook" placeholder="Give me an url" value="<?php echo $social_link_text_facebook;?>" ></input>
		</div>
		<div>
			<label>Twitter:</label>
			<input type="checkbox" 
				   name="social_link_checkbox_twitter" 
				   <?php if (isset($social_link_checkbox_twitter) && $social_link_checkbox_twitter=="twitter_link") echo "checked";?> 
				   value="twitter_link">		
			</input>
			<input type="text" name="social_link_text_twitter" placeholder="Give me an url" value="<?php echo $social_link_text_twitter;?>" ></input>
		</div>
	  <br>
	  <input type="submit" name="submit" value="Submit">  
	</form>

<?php
}