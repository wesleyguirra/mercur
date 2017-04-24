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
			<div class="col-md-6">
				<?php echo do_shortcode('[contact-form-7 id="42" title="Contato"]'); ?>
			</div>
			<div class="col-md-6">
				<h3>Localização</h3>
				<div><p>Rua Borges de Figueiredo, 303, Sala 712</p></div>
				<h3>Fale conosco</h3>
				<div><a href="#"><span>+55</span> 11 4329-7417</a></div>
				<div><a href="#"><span>+55</span>11 4329-7447</a></div>
				<div><a href="#">contato@argento.pro.br</a></div>
				<h3>Siga a Argento</h3>
				<span><a href="#">linkedin.com/argento</a></span>
			</div>
		</div>
	</div>

<?php
get_footer();
