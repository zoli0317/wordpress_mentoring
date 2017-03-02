<?php get_header(); ?>

<div id="content" class="pageContent">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php
    while (have_posts()) : the_post(); ?> 
        <div class="entry-content-page">
            <?php the_content(); ?> 
        </div>
    <?php
    endwhile;
    wp_reset_query(); 
    ?>
</div>

<pre>This is the page.php</pre>

<?php get_footer(); ?>