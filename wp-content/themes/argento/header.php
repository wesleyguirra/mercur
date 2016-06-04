<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Argento
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="css/style.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'argento' ); ?></a>

	<header id="masthead" class="site-header <?php if (is_home() ) : print "fixed" ?><?php endif; ?>" role="banner">
		<div class="site-branding">
				<?php if ( is_page_template('curso.php')) :
					the_post_thumbnail($class='course-background');
				endif; ?>
		    <div class="container <?php if (is_home() ) : print "fixed" ?><?php endif; ?>">
		        <div class="row">
	            <div class="site-logo col-md-2">
								<?php get_template_part( 'template-parts/logo', 'none' ); ?>
							</div>
              <div class="site-nav col-md-7 col-md-offset-3">
                  <div class="col-md-8 col-md-offset-4">
                      <ul class="pull-right">
                          <li><i class="flaticon-busca"></i></li>
                          <li><span><b>+55 11</b> 4329-7417</span></li>
                          <li><span><b>+55 11</b> 4329-7447</span></li>
                      </ul>
                  </div>
                  <div class="col-md-12">
                      <nav class="pull-right">
                          <ul>
                              <li><a href=""><b>Nossos</b>Cursos</a></li>
                              <li><a href=""><b>Quem</b>Somos</a></li>
                              <li><a href=""><b>Fale</b>Conosco</a></li>
                          </ul>
                      </nav>
                  </div>
              </div>
          </div><!-- .row -->
			</div><!-- .container -->
			<!-- se não for home page nem página de cursos então exibe as tres linhas. -->
			<?php if ( ! is_home() ) :
					if ( ! is_page_template('curso.php')) :
						get_template_part( 'template-parts/stripes', 'none' );
					endif;
				endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php get_breadcrumbs(); ?>
			</div>
		</div>
	</div><!-- .container -->
	<div id="content" class="site-content">
