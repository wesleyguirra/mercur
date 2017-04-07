<?php
/*
Template Name: Categoria Cursos
*/

get_header();
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'categoria-cursos' );

	endwhile; // End of the loop.

get_footer();
