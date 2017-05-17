<?php

add_action( 'widgets_init', 'register_and_load_widget' );

function register_and_load_widget() {
    register_widget( 'my_basic_widget' );
}

class my_basic_widget extends WP_Widget {

    public function __construct() {
        parent::__construct( false, '+My Basic Widget+', array( 'description' => __( 'This is my basic widget', 'wpb_widget_domain' ), ) );
    }

    // Creating widget front-end
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        $page_params = array(
            'title' => $instance['title'],
            'text' => $instance['text']
        );
        my_widget_appearance_on_the_site( $page_params );
        echo $args['after_widget'];
    }
        
    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }

        if ( isset( $instance[ 'text' ] ) ) {
            $text = $instance[ 'text' ];
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'My widget title:' ); ?></label> 
            <input type="text" 
                   class="widefat" 
                   id="<?php echo $this->get_field_id( 'title' ); ?>" 
                   name="<?php echo $this->get_field_name( 'title' ); ?>" 
                   value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'My widget text:' ); ?></label> 
            <textarea rows="16" 
                      cols="20"
                      class="widefat"
                      id="<?php echo $this->get_field_id( 'text' ); ?>"
                      name="<?php echo $this->get_field_name( 'text' ); ?>" ><?php echo esc_textarea($text); ?></textarea>
        </p>
        <?php 
    }
    
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
        return $instance;
    }
}

function my_widget_appearance_on_the_site( $parameters ) {
    $params = ( is_array( $parameters ) ? $parameters : array() );
    $title = ( isset( $params['title'] ) ? ' ' . trim( $params['title'] ) : '' );
    $text = ( isset( $params['text'] ) ? ' ' . trim( $params['text'] ) : '' );
    ?>
        <div class="my-widget-section">
            <div class="my-widget-title">
                <?php echo $title; ?>
            </div>
            <div class="my-widget-text">
                <?php echo $text; ?>
            </div>
        </div>
    <?php
}
