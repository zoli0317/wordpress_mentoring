<?php get_header(); ?>

<div class="posts">
	<?php get_sidebar('post'); ?>	
    <?php 
	while (have_posts()) : the_post(); ?>
		<h2 class="title-content"><?php the_title(); ?></h2>
		<img class="large-image" src="<?php the_post_thumbnail_url('large'); ?>"/>
        <div class="post-content"><?php the_content(); ?></div>
		<?php twentysixteen_entry_meta(); ?>
		
		<?php 
		//CREATE NAVIGATION
		if ( is_singular( 'post' ) ) {
			the_post_navigation( array(
				'prev_text' => '<span class="post-title">&lt;&lt; %title</span>',
				'next_text' => '<span class="post-title">%title &gt;&gt;</span>',
			) );
		}
    endwhile;
    wp_reset_query();
    ?>
</div>

<pre>This is the single.php</pre>

<?php get_footer(); ?>