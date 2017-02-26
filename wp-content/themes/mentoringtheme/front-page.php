<?php get_header(); ?>

<pre>page file: front-page.php</pre>
<div class="author"><?php the_author(); ?></div>
<div class="date"><?php the_date(); ?></div>

<div id="content" class="pageContent">
    <h1 class="title"><?php the_title(); ?></h1>
    <?php
    while (have_posts()) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
            <?php the_content(); ?> <!-- Page Content -->
        </div>

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>
</div>

<?php get_footer(); ?>