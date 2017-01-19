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
	'child_of' => get_the_ID(),
  'parent' => get_the_ID(),
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 0,
	'post_type' => 'page',
	'post_status' => 'publish',
  'meta_key' => 'disciplina',
);
?>
<?php $pages = get_pages($cursos); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container">
<div class="row">
  <div class="col-md-10">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </div>
</div>
  <?php $disciplinas = array_unique(array_column($pages, 'meta_value')); ?>
  <div class="row">
    <?php foreach ($disciplinas as $disciplina): ?>
    <?php $cursos = array(
      'child_of' => get_the_ID(),
      'parent' => get_the_ID(),
      'sort_order' => 'asc',
      'sort_column' => 'post_title',
      'hierarchical' => 0,
      'post_type' => 'page',
      'post_status' => 'publish',
      'meta_key' => 'disciplina',
      'meta_value' => $disciplina,
    );
    ?>
    <?php $pages = get_pages($cursos); ?>
    <div class="section-cursos col-md-6">
      <div class="section-cursos-header">
        <h2 class="section-cursos-title"><?php echo $cursos['meta_value']; ?><span class="section-cursos-subtitle"><?php the_title( '[',']' ); ?></span></h2>
      </div>
      <ul class="section-cursos-lista">
        <?php foreach ($pages as $page): ?>
        <li class="section-cursos-item">
          <a href="<?php echo get_permalink($page->ID); ?>" class="section-cursos-link">
            <span class="section-cursos-link-wrapper"><?php echo $page->post_title; ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div><!-- section-cursos -->
    <?php endforeach; ?>
    <!--<div class="clearfix"></div>-->
  </div><!-- .row -->
</div><!-- .container -->
</article><!-- #post-## -->
