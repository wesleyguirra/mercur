<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Argento
 */

?>

<?php $cursos = array(
	'child_of' => 7,
  'parent' => 7,
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 0,
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
    <div class="section-cursos col-md-12">
      <div class="section-cursos-header">
        <h2 class="section-cursos-title">Cursos<span class="section-cursos-subtitle">[ ciclo i ]</span></h2>
      </div>
      <ul class="section-cursos-lista">
        <?php $pages = get_pages($cursos); ?>
        <?php foreach ($pages as $page): ?>
        <li class="section-cursos-item">
          <a href="<?php echo get_permalink($page->ID); ?>" class="section-cursos-link">
            <span class="section-cursos-link-wrapper"><?php echo $page->post_title; ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div><!-- section-cursos -->
  </div><!-- .row -->
</div><!-- .container -->
</article><!-- #post-## -->
