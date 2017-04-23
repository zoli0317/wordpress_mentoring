<?php
get_header(); ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			</header>
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'search' );
			endwhile;

			the_posts_pagination( array(
				'prev_text' => '<span class="post-title">&lt;&lt;</span>',
				'next_text' => '<span class="post-title">&gt;&gt;</span>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
		?>
		</main>
	</section>
<pre>This is the search.php</pre>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
