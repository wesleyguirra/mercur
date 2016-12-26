<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Argento
 */

?>

<?php $anos_iniciais = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'child_of' => 7,
	'post_type' => 'page',
	'post_status' => 'publish'
);

$anos_finais = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'child_of' => 7,
	'post_type' => 'page',
	'post_status' => 'publish'
);
$gestao_escolar = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'child_of' => 7,
	'post_type' => 'page',
	'post_status' => 'publish'
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container">
<div class="row">
  <div class="col-md-10">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </div>
</div>
  <div class="row">
    <div class="section-cursos col-md-6">
      <div class="section-cursos-header">
        <h2 class="section-cursos-title">Anos Iniciais<span class="section-cursos-subtitle">[ ciclo i ]</span></h2>
      </div>
      <ul class="section-cursos-lista">
        <?php $pages = get_pages($anos_iniciais); ?>
        <?php foreach ($pages as $page): ?>
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper"><?php echo $page->post_title; ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div><!-- section-cursos -->

    <div class="section-cursos col-md-6">
      <div class="section-cursos-header">
        <h2 class="section-cursos-title">Ensino fundamental<span class="section-cursos-subtitle">[ ciclo ii e ensino médio ]</span></h2>
      </div>
      <ul class="section-cursos-lista">
        <?php $pages = get_pages($anos_finais); ?>
        <?php foreach ($pages as $page): ?>
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper"><?php echo $page->post_title; ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div><!-- section-cursos -->
    <div class="clearfix"></div>
    <div class="section-cursos col-md-6">
      <div class="section-cursos-header">
        <h2 class="section-cursos-title">Gestão escolar</h2>
      </div>
      <ul class="section-cursos-lista">
        <?php $pages = get_pages($gestao_escolar); ?>
        <?php foreach ($pages as $page): ?>
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper"><?php echo $page->post_title; ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div><!-- section-cursos -->
  </div><!-- .row -->
</div><!-- .container -->
</article><!-- #post-## -->
