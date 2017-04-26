<?php get_header(); ?>

<div>
	<div id="content" class="page-content <?php echo get_background_color_details(); ?>">
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
</div>	

<pre>This is the page.php</pre>

<?php get_footer(); ?>