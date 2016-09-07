

<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Argento
 */

get_header(); ?>


  <div class="container">
    <div class="row">
  			<div class="col-md-6">
  				<div class="breadcrumbs">
            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://argento.citr.co/" itemprop="url"><span itemprop="title">Ínicio</span></a></span> <span class="sep">›</span> <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://argento.citr.co/category/sem-categoria/" itemprop="url"><span itemprop="title">Artigos</span></a></span>
          </div><!-- .breadcrumbs -->
        </div>
  	</div>
    <div class="row">
      <div class="col-md-12">
        <h1 class="entry-title">Artigos</h1>
      </div>
    </div>
  </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      <div class="container">
		      <div class="row">
            <?php
        		if ( have_posts() ) :



        			/* Start the Loop */
        			while ( have_posts() ) : the_post();

        				/*
        				 * Include the Post-Format-specific template for the content.
        				 * If you want to override this in a child theme, then include a file
        				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        				 */
        				get_template_part( 'template-parts/content', get_post_format() );

        			endwhile;

        			the_posts_navigation();

        		else :

        			get_template_part( 'template-parts/content', 'none' );

        		endif; ?>
		      </div>
      </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
