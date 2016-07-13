<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Argento
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<?php the_title( '<h1 class="entry-title post color"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php argento_posted_on(); ?>
						</div><!-- .entry-meta -->
						<?php
						endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="entry-content">
							<?php
								the_content( sprintf(
									/* translators: %s: Name of current post. */
									wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'argento' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								) );

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'argento' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</div>
				</div>
			</div><!-- .col-md-8 -->
			<div class="col-md-4">
				<h2>Sobre o autor</h2>
				<div class="author-image"><?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '100' ); }?></div>
				<div class="author-info">
					<h3 class="author-name"><?php the_author_posts_link(); ?></h3>
					<h6 class="author-home"><a href="<?php the_author_url(); ?>" target="_blank">conecte-se</a></h6>
				</div>
				<div>
					<p><?php the_author_description(); ?></p>
				</div>
			</div>
		</div><!-- .row -->
	</div><!-- .container -->
	

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
