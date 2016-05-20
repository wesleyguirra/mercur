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
					<?php the_title( '<h1 class="entry-title color">', '</h1>' ); ?>
					<h2>Sobre o Curso</h2>
					<div class="row">
						<div class="col-md-6">
							<h3>Metodologia</h3>
							<p>
								<?php the_field('metodologia'); ?>
							</p>
						</div>
						<div class="col-md-6">
							<h3>Público Alvo</h3>
							<p>
								<?php the_field('publico-alvo'); ?>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h2>Objetivos do curso</h2>
							<?php the_field('objetivos-do-curso'); ?>
						</div>
						<div class="col-md-6">
							<form class="" action="" method="post">
								<input class="pull-right" type="text" name="nome" placeholder="Nome" required>
								<input class="pull-right" type="email" name="email" placeholder="E-mail" required>
								<input class="pull-right" type="submit" name="" value="Receba o cronograma">
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h2>Informações do curso</h2>
							<table class="table">
								<tr>
									<td>Turmas</td>
									<td>Início</td>
									<td>Aulas</td>
									<td>Carga Horária</td>
									<td>Modalidade</td>
									<td>Investimento</td>
								</tr>
								<tr>
									<td><?php $turmas = get_field('turmas'); if ($turmas == 0) {echo "<i class=\"flaticon-cancelar\"></i>";} else {echo "<i class=\"flaticon-aceitar\"></i>";} ?></td>
									<td><?php the_field('inicio'); ?></td>
									<td><?php the_field('aulas'); ?></td>
									<td><?php the_field('carga-horaria'); ?> Horas</td>
									<td><?php the_field('modalidade'); ?></td>
									<td><?php the_field('investimento'); ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
</div><!-- .container -->
</article><!-- #post-## -->
