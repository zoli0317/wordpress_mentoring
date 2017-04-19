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
		<?php get_my_category(); ?>
		<?php get_my_tag(); ?>
		
	    <div class="sharebuttons">
	    	<a href="http://facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Facebook share" class="facebookshare" target="_blank" rel="nofollow"></a>
	    	<a href="http://twitter.com/home?status=Interesting article at <?php the_permalink(); ?>" title="Twitter share" class="twittershare" target="_blank" rel="nofollow"></a>
	    </div>

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