<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Argento
 */

get_header(); ?>
    
    <?php
        if ( is_home() ) : ?>
        <?php putRevSlider('Qualidade Social'); ?>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">            
                <div class="trail">
                    <div class="trail-header">
                        <h2 class="trail-header-title">Cursos em destaque</h2>
                        <p class="trail-header-desc">9 Cursos</p>
                        <div class="trail-header-menu">
                            <button class="trail-header-btn trail-header-btn-open js-trail-open"></button><button class="trail-header-btn trail-header-btn-close js-trail-close"></button>
                        </div>
                    </div>
                    <div class="trail-courses">
                        <div class="trail-course">
                            <div class="trail-course-box">
                                <div class="trail-course-media">
                                    <img src="wp-content/themes/argento/img/alfabetizacao.jpg" alt="" title="" class="trail-course-img">
                                    <div class="trail-course-hover">
                                        <p class="trail-course-hover-info">
                                            Paulista • 13/mai<br>
                                            12 horas • 6x R$ 131,67
                                        </p>
                                        <p>
                                            <a href="#" class="trail-course-hover-more">Ver cronograma</a>
                                            <a href="#" class="trail-course-hover-btn">Conheça</a>
                                        </p>
                                    </div>
                                </div>
                                <p class="trail-course-info">
                                    <span class="trail-course-title">Alfabetização</span>
                                </p>
                            </div>
                        </div>
                        <div class="trail-course">
                            <div class="trail-course-box">
                                <div class="trail-course-media">
                                    <img src="wp-content/themes/argento/img/alfabetizacao.jpg" alt="" title="" class="trail-course-img">
                                    <div class="trail-course-hover">
                                        <p class="trail-course-hover-info">
                                            Paulista • 13/mai<br>
                                            12 horas • 6x R$ 131,67
                                        </p>
                                        <p>
                                            <a href="" class="trail-course-hover-more">Ver cronograma</a>
                                            <a href="" class="trail-course-hover-btn">Conheça</a>
                                        </p>
                                    </div>
                                </div>
                                <p class="trail-course-info">
                                    <span class="trail-course-title">Alfabetização</span>
                                </p>
                            </div>
                            <div class="resume"></div>
                        </div>
                        <div class="trail-course">
                            <div class="trail-course-box">
                                <div class="trail-course-media">
                                    <img src="wp-content/themes/argento/img/alfabetizacao.jpg" alt="" title="" class="trail-course-img">
                                    <div class="trail-course-hover">
                                        <p class="trail-course-hover-info">
                                            Paulista • 13/mai<br>
                                            12 horas • 6x R$ 131,67
                                        </p>
                                        <p>
                                            <a href="" class="trail-course-hover-more">Ver cronograma</a>
                                            <a href="" class="trail-course-hover-btn">Conheça</a>
                                        </p>
                                    </div>
                                </div>
                                <p class="trail-course-info">
                                    <span class="trail-course-title">Alfabetização</span>
                                </p>
                            </div>
                            <div class="resume"></div>
                        </div>
                        <div class="trail-course">
                            <div class="trail-course-box">
                                <div class="trail-course-media">
                                    <img src="wp-content/themes/argento/img/alfabetizacao.jpg" alt="" title="" class="trail-course-img">
                                    <div class="trail-course-hover">
                                        <p class="trail-course-hover-info">
                                            Paulista • 13/mai<br>
                                            12 horas • 6x R$ 131,67
                                        </p>
                                        <p>
                                            <a href="" class="trail-course-hover-more">Ver cronograma</a>
                                            <a href="" class="trail-course-hover-btn">Conheça</a>
                                        </p>
                                    </div>
                                </div>
                                <p class="trail-course-info">
                                    <span class="trail-course-title">Alfabetização</span>
                                </p>
                            </div>
                            <div class="resume"></div>
                        </div>
                        <div class="trail-course">
                            <div class="trail-course-box">
                                <div class="trail-course-media">
                                    <img src="wp-content/themes/argento/img/alfabetizacao.jpg" alt="" title="" class="trail-course-img">
                                    <div class="trail-course-hover">
                                        <p class="trail-course-hover-info">
                                            Paulista • 13/mai<br>
                                            12 horas • 6x R$ 131,67
                                        </p>
                                        <p>
                                            <a href="" class="trail-course-hover-more">Ver cronograma</a>
                                            <a href="" class="trail-course-hover-btn">Conheça</a>
                                        </p>
                                    </div>
                                </div>
                                <p class="trail-course-info">
                                    <span class="trail-course-title">Alfabetização</span>
                                </p>
                            </div>
                            <div class="resume"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_sidebar();
get_footer();
