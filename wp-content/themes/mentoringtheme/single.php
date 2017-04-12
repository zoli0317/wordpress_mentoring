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

		<div class="categories-content"><?php wp_list_categories(); ?></div>

	<?php 
		//CREATE TAGS
		$tags = get_tags();
		$html = '<div>
					<p>Tags</p>
					<ul class="post_tags">';
		foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );
			$html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>{$tag->name}</a></li>";
		}
		$html .= '</ul></div>';
		echo $html;

		//CREATE NAVIGATION
		if ( is_singular( 'attachment' ) ) {
			// Parent post navigation.
			the_post_navigation( array(
				'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'mentoringtheme' ),
			) );
		} elseif ( is_singular( 'post' ) ) {
			// Previous/next post navigation.
			the_post_navigation( array(
				'prev_text' => 
					'<span class="post-title">&lt;&lt;%title</span>',
				'next_text' => 
					'<span class="post-title">%title&gt;&gt;</span>',
			) );
		}
    endwhile;
    wp_reset_query();
    ?>
</div>

<pre>This is the single.php</pre>

<?php get_footer(); ?>