<?php get_header(); ?>

<div class="posts">
    <?php 
	while (have_posts()) : the_post(); ?>
		<div class="author-content">Author: <span class="author"><?php the_author(); ?></span></div>
		<div class="date-content">Created date: <span class="date"><?php the_date(); ?></span></div>
        <div class="post-content"><?php the_content(); ?></div>
    <?php
    endwhile;
    wp_reset_query();
    ?>
</div>
<pre>This is the front-page.php</pre>

<?php get_footer(); ?>
