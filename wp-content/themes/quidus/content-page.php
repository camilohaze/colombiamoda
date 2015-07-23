<?php
/**
 * The template used for displaying page content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			
			if ( is_page() ) :
			
			the_content( sprintf(
				__( 'Read more %s', 'quidus' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
			else :
			the_excerpt();
			endif;
			
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'quidus' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'quidus' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			
					// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
		
		if ( is_single() ) :
			the_post_navigation( array(
				'next_text' => '<span class="post-title">%title</span>',
				'prev_text' => '<span class="post-title">%title</span>'
			) );
		endif;
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
