<?php get_header(); ?>

<div class="posts">
    <?php 
	while (have_posts()) : the_post(); ?>
        <div class="post-contents">
        	<a class="title-contents" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<img class="thumbnail-image" src="<?php the_post_thumbnail_url('thumbnail'); ?>"/>
			</a>
			<?php the_excerpt(); ?>
			<a href="<?php echo get_permalink(); ?>"> Read More...</a>
			<div class="author-contents">Author: <span class="author"><?php the_author(); ?></span></div>
			<div class="date-contents">Created: <span class="date"><?php the_date(); ?></span></div>
        </div>
    <?php
    endwhile;
		the_posts_pagination( array(
		    'prev_text' => __( 'Previous', 'textdomain' ),
		    'next_text' => __( 'Next', 'textdomain' ),
		) ); 
    wp_reset_query();
    ?>
</div>
<pre>This is the home.php</pre>

<?php get_footer(); ?>
