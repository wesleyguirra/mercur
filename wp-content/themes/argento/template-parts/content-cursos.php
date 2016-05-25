<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Argento
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h3>Ensino fundamental</h3> <span>[ ciclo i ]</span>
					<div class="row">
						<div class="col-md-6">
							<div class="box-curso">
								Leitura com autonomia
							</div>
						</div>
						<div class="col-md-6">
							<div class="box-curso">
								Contexto de produção de texto
							</div>
						</div>
						<div class="col-md-6">
							<div class="box-curso">
								Alfabetização
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h3>Ensino fundamental</h3> <span>[ ciclo i]</span>
					<div class="row">
						<div class="col-md-6">
							<div class="box-curso">
								Leitura com autonomia
							</div>
						</div>
						<div class="col-md-6">
							<div class="box-curso">
								Contexto de produção de texto
							</div>
						</div>
					</div>
				</div>
			</div>
</div><!-- .container -->
</article><!-- #post-## -->
