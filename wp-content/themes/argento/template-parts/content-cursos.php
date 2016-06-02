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
							<a class="box-curso">
								<span>Leitura com autonomia</span>
							</a>
						</div>
						<div class="col-md-6">
							<a class="box-curso">
								<span>Contexto de produção de texto</span>
							</a>
						</div>
						<div class="col-md-6">
							<a class="box-curso">
								<span>Alfabetização</span>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h3>Ensino fundamental</h3> <span>[ ciclo ii e ensino médio ]</span>
					<div class="row">
						<div class="col-md-6">
							<a class="box-curso">
								<span>Desenvolvimento Profissional planejamento, gestão de sala de aula e avaliação</span>
							</a>
						</div>
						<div class="col-md-6">
							<a class="box-curso">
								<span>Desenvolvimento de habilidades das competências leitora e escritora</span>
							</a>
						</div>
					</div>
				</div>
			</div>
</div><!-- .container -->
</article><!-- #post-## -->
