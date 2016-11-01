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
								<?php the_field('publico_alvo'); ?>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h2>Objetivos do curso</h2>
							<?php the_field('objetivos_do_curso'); ?>
						</div>
						<div class="col-md-6">
							<?php echo do_shortcode('[contact-form-7 id="22" title="Cronograma"]'); ?>
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
								</tr>
								<tr>
									<!-- Inserir funcionalidade que verifica se existem turmas, onde se não existirem turmas será exibido um form -->
									<td><?php $turmas = get_field('turmas'); if ($turmas == 0) {echo "<i class=\"flaticon-cancelar\"></i>";} else {echo "<i class=\"flaticon-aceitar\"></i>";} ?></td>
									<td><?php the_field('inicio'); ?></td>
									<td><?php the_field('aulas'); ?></td>
									<td><?php the_field('carga_horaria'); ?> Horas</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
</div><!-- .container -->
</article><!-- #post-## -->
