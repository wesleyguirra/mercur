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
<link rel="stylesheet" href="wp-content/themes/argento/css/bootstrap.min.css">
<link rel="stylesheet" href="wp-content/themes/argento/css/argento.custom.css">
<link rel="stylesheet" href="wp-content/themes/argento/css/flaticon.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'argento' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
		    <div class="container">
		        <div class="row">
                        <div class="site-logo col-md-2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="wp-content/themes/argento/img/logo.svg" alt="Argento Desenvolvimento Profissional"></a></div>
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
			<?php
                    if ( is_home() ) : ?>
                    <div class="home-background"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="home-call-to-action">
                                    <span>juntos fazemos educação de</span>
                                    <h6>Qualidade Social</h6>
                                    <div class="call-to-action pull-right">
                                        <i class="flaticon-cursos-link"></i><a href="/cursos">Conheça nossos cursos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div></div>
			<?php else : ?>
			<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 header-stripes">
                        <div class="stripe-one"></div>
                        <div class="stripe-two"></div>
                        <div class="stripe-three"></div>
                    </div>
			    </div>
			</div>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
