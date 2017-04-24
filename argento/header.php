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
<link rel="apple-touch-icon" sizes="57x57" href="wp-content/themes/argento/img/favicons/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="wp-content/themes/argento/img/favicons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="wp-content/themes/argento/img/favicons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="wp-content/themes/argento/img/favicons/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="wp-content/themes/argento/img/favicons/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="wp-content/themes/argento/img/favicons/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="wp-content/themes/argento/img/favicons/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="wp-content/themes/argento/img/favicons/apple-touch-icon-152x152.png">
<link rel="icon" type="image/png" href="wp-content/themes/argento/img/favicons/favicon-196x196.png" sizes="196x196">
<link rel="icon" type="image/png" href="wp-content/themes/argento/img/favicons/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="wp-content/themes/argento/img/favicons/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="wp-content/themes/argento/img/favicons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="wp-content/themes/argento/img/favicons/favicon-16x16.png" sizes="16x16">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="/wp-content/themes/argento/css/style.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'argento' ); ?></a>
	<?php get_template_part( 'template-parts/mobile', 'nav' ); ?>
	<div class="section-search">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<button class="search-close" type="button" name="button">fechar</button>
					<div class="clearfix"></div>
					<?php echo do_shortcode('[ezas name="Global" /]'); ?>
				</div>
			</div>
		</div>
	</div>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
				<?php if ( is_page_template('curso.php')) :
					the_post_thumbnail($class='course-background');
				endif; ?>
		    <div class="container <?php if (is_page_template('curso.php') ) : print "fixed" ?><?php endif; ?>">
		        <div class="row">
	            <div class="site-logo col-xs-8 col-sm-4 col-md-3">
								<?php get_template_part( 'template-parts/logo', 'none' ); ?>
							</div>
							<div class="button-collapse-mobile col-xs-4 visible-xs visible-sm no-padding">
								<a href="#">
									<i class="flaticon-interface"></i>
								</a>
								<!--<a href="#">
									<i class="flaticon-busca"></i>
								</a>-->
							</div>
              <div class="site-nav col-md-6 col-md-offset-3 visible-md visible-lg">
								<?php get_template_part( 'template-parts/site', 'nav' ); ?>
              </div>
          </div><!-- .row -->
			</div><!-- .container -->

			<!-- exibe as tres linhas. -->
			<?php get_template_part( 'template-parts/stripes', 'none' ); ?>

		</div><!-- .site-branding -->
	</header><!-- #masthead -->
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php argento_get_breadcrumbs(); ?>
			</div>
		</div>
	</div><!-- .container -->
	<div id="content" class="site-content">
