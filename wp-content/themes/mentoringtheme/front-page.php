<?php get_header(); ?>

<div class="pageContent">
    <?php 
	while (have_posts()) : the_post(); ?>
		<div class="author"> Author: <?php the_author(); ?></div>
		<div class="date">Created date: <?php the_date(); ?></div>
        <div class="post-content"><?php the_content(); ?></div>
    <?php
    endwhile;
    wp_reset_query();
    ?>
</div>
<pre>This is the front-page.php</pre>

<?php get_footer(); ?>