<?php
add_action( 'add_meta_boxes', 'add_popup_box' );

function add_popup_box( $post_type ){
    add_meta_box(
        'popup_id',
        'Page type selector',
        'add_popup_details',
        'page',
        'side',
        'default'
    );
}

function add_popup_details($post){
	$post_id = $post->ID;
	$page_type = get_post_meta( $post_id, 'page_type', true);
	?>
	<div>
		<label class="page_type_labels" for="page_type">Page type:</label>
		<select name="page_type">
		  <option value="with_sidebar">With Sidebar</option>
		  <option value="without_sidebar">Without Sidebar</option>
		</select>
	</div>
	<?php
}

add_action( 'save_post', 'save_popup_details' );

function save_popup_details($post_id){
    $page_type = $_POST["page_type"];

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($page_type) ) {
	    update_post_meta($post_id, 'page_type', $page_type);
    }
}

// function get_popup_details(){

$page_type = get_post_meta(get_the_ID(), 'page_type', true);
echo $page_type;
echo "maki";
// }