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
<link rel="stylesheet" href="/wp-content/themes/argento/css/style.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'argento' ); ?></a>

	<header id="masthead" class="site-header <?php if (is_page_template('home-argento.php') ) : print "fixed" ?><?php endif; ?>" role="banner">
		<div class="site-branding">
				<?php if ( is_page_template('curso.php')) :
					the_post_thumbnail($class='course-background');
				endif; ?>
		    <div class="container <?php if (is_page_template('home-argento.php') ) : print "fixed" ?><?php endif; ?>">
		        <div class="row">
	            <div class="site-logo col-xs-8 col-sm-4 col-md-3">
								<?php get_template_part( 'template-parts/logo', 'none' ); ?>
							</div>
							<div class="button-collapse-mobile col-xs-4 visible-xs visible-sm no-padding">
								<a href="#">
									<i class="flaticon-interface"></i>
								</a>
								<a href="#">
									<i class="flaticon-busca"></i>
								</a>
							</div>
              <div class="site-nav col-md-6 col-md-offset-3 visible-md visible-lg">
								<?php get_template_part( 'template-parts/site', 'nav' ); ?>
              </div>
          </div><!-- .row -->
			</div><!-- .container -->

			<!-- se não for home page nem página de cursos então exibe as tres linhas. -->
			<?php if ( ! is_page_template('home-argento.php') ) :
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
