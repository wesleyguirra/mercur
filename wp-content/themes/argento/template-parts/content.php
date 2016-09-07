<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Argento
 */

?>
			<div class="col-md-4">
				<?php the_title( '<h1 class="entry-title post color"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php argento_posted_on(); ?>
				</div><!-- .entry-meta -->
				<div class="entry-content">
					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( '<span class="read-more">Leia Mais</span>', 'argento' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'argento' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->
				<?php
				endif; ?>
			</div>
