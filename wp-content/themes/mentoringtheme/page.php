<?php get_header(); ?>

<div>
	<?php get_sidebar('page'); ?>	
	<div id="content" class="page-content">
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