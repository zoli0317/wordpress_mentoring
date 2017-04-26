<?php
add_action( 'add_meta_boxes', 'add_background_color_box' );

function add_background_color_box( $post_type ){
    add_meta_box(
        'popup_id',
        'Background color selector',
        'add_background_color_details',
        'page',
        'side',
        'default'
    );
}

function add_background_color_details($post){
	$post_id = $post->ID;
	$background_color = get_post_meta( $post_id, 'background_color', true);
	?>
  <div>
    <label class="background_color_labels" for="background_color">Background color:</label>
    <select name="background_color">
      <option value="default" <?php if($background_color == 'red'){ echo 'selected'; } ?> >Default</option>
      <option value="red" <?php if($background_color == 'red'){ echo 'selected'; } ?> >Red</option>
      <option value="green" <?php if($background_color == 'green'){ echo 'selected'; } ?> >Green</option>
      <option value="blue" <?php if($background_color == 'blue'){ echo 'selected'; } ?> >Blue</option>
      <option value="yellow" <?php if($background_color == 'yellow'){ echo 'selected'; } ?> >Yellow</option>
    </select>
  </div>
	<?php
}

add_action( 'save_post', 'save_background_color_details' );

function save_background_color_details($post_id){
    $background_color = $_POST["background_color"];

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($background_color) ) {
	    update_post_meta($post_id, 'background_color', $background_color);
    }
}

function get_background_color_details(){
	return get_post_meta(get_the_ID(), 'background_color', true);
}
