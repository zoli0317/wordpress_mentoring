<?php get_header(); ?>

<div class="posts">
    <?php 
	while (have_posts()) : the_post();
    	twentysixteen_blog_details();
    endwhile;
		the_posts_pagination( array(
		    'prev_text' => '<<',
		    'next_text' => '>>',
		) ); 
    wp_reset_query();
    ?>
</div>
<pre>This is the home.php</pre>

<?php get_footer(); ?>
