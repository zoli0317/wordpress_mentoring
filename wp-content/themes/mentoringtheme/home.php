<?php get_header(); ?>

<div class="pageContent">
    <?php 
	while (have_posts()) : the_post(); ?>
        <div class="post-content"><?php the_content(); ?></div>
		<div class="author-content">Author: <span class="author"><?php the_author(); ?></span></div>
		<div class="date-content">Created date: <span class="date"><?php the_date(); ?></span></div>
    <?php
    endwhile;
    wp_reset_query();
    ?>
</div>

<pre>This is the home.php</pre>

<?php get_footer(); ?>