<?php get_header(); ?>

<div class="posts">
	<?php get_sidebar('post'); ?>	
    <?php 
	while (have_posts()) : the_post(); ?>
		<h2 class="title-content"><?php the_title(); ?></h2>
		<img class="large-image" src="<?php the_post_thumbnail_url('large'); ?>"/>
        <div class="post-content"><?php the_content(); ?></div>
		<div class="author-content">Author: <span class="author"><?php the_author(); ?></span></div>
		<div class="date-content">Created date: <span class="date"><?php the_date(); ?></span></div>
    <?php
    endwhile;
    wp_reset_query();
    ?>
</div>

<pre>This is the single-11.php</pre>

<?php get_footer(); ?>