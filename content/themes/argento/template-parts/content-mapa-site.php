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
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'child_of' => 7,
	'post_type' => 'page',
	'post_status' => 'publish'
);
$all = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'child_of' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
);
$pages = get_pages($cursos);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </div>
    <div class="col-md-4">
      <?php echo do_shortcode(['sitemap']); ?>
    </div>
  </div><!-- .row -->
</div><!-- .container -->
</article><!-- #post-## -->
