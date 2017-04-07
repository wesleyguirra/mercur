<?php
/*
Template Name: Mapa do Site
*/

get_header();
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'mapa-site' );

	endwhile; // End of the loop.

get_footer();
