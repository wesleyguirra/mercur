<?php
/*
Template Name: Contato
*/

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="col-md-6">
					<?php echo do_shortcode('[contact-form-7 id="42" title="Contato"]'); ?>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();
