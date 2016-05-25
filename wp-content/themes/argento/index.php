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
        <?php putRevSlider('Home'); ?>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="trail">
                    <div class="trail-header">
                        <h2 class="trail-header-title">Cursos em destaque</h2>
                        <p class="trail-header-desc">9 Cursos</p>
                        <div class="trail-header-menu">
                            <button class="trail-header-btn trail-header-btn-open js-trail-open is-active">Ver todos</button><button class="trail-header-btn trail-header-btn-close js-trail-close">Fechar</button>
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
                                    <span class="trail-course-title">Gestão de pessoas</span>
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
                        </div>
                        <div class="trail-course">
                            <div class="trail-course-box">
                                <div class="trail-course-media">
                                    <img src="wp-content/themes/argento/img/leitura-com-autonomia.jpg" alt="" title="" class="trail-course-img">
                                    <div class="trail-course-hover">
                                        <p class="trail-course-hover-info">
                                            Presencial • Março<br>
                                            40 horas
                                        </p>
                                        <p>
                                            <a href="" class="trail-course-hover-more">Ver cronograma</a>
                                            <a href="" class="trail-course-hover-btn">Conheça</a>
                                        </p>
                                    </div>
                                </div>
                                <p class="trail-course-info">
                                    <span class="trail-course-title">Leitura com autonomia</span>
                                </p>
                            </div>
                        </div>
                        <div class="trail-course">
                            <div class="trail-course-box">
                                <div class="trail-course-media">
                                    <img src="wp-content/themes/argento/img/implantacao-do-projeto-politico-pedagogico.jpg" alt="" title="" class="trail-course-img">
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
                                    <span class="trail-course-title">Implantação do projeto político pedagógico</span>
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
                        </div>
                        <div class="trail-course">
                            <div class="trail-course-box">
                                <div class="trail-course-media">
                                    <img src="wp-content/themes/argento/img/desenvolvimento-das-habilidades-construtora-e-leitora.jpg" alt="" title="" class="trail-course-img">
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
                                    <span class="trail-course-title">Desenvolvimento de Habilidades das competências leitora e escritora</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="testimonials">
        <div class="container">
            <div class="row">
                <div class="testimonials">
                  <div class="testimonial">
                      <span class="school-name">E.E. PROFª MARIA EUNICE M.FERREIRA</span>
                      <p>A Equipe Gestora, logo no início do curso, percebeu que a construção de um Projeto Político Pedagógico bem elaborado, construção com a participaçãoo coletiva, envolvendo toda a comunidade escolar seria a solução para muitos problemas de gestão existentes na Escola.</p>
                  </div>
                  <div class="testimonial">
                      <span class="school-name">Teste</span>
                      <p>Mussum Ipsum, cacilds vidis litro abertis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. Praesent malesuada urna nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus. Quem num gosti di mum que vai caçá sua turmis! Mé faiz elementum girarzis, nisi eros vermeio. </p>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <section id="paths">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2">
                            <a href="#">
                              <i class="flaticon-cursos"></i>
                              <h2>Cursos</h2>
                              <p>
                                Saiba mais sobre os cursos oferecidos pela Argento.
                              </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2">
                            <a href="#">
                              <i class="flaticon-artigos"></i>
                              <h2>Artigos</h2>
                              <p>
                                A visão dos formadores da Argento sobre temas vivenciados na escola.
                              </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2">
                            <a href="#">
                              <i class="flaticon-ponto-de-partida"></i>
                              <h2>Ponto de partida</h2>
                              <p>
                                Principais características das escolas eficazes.
                              </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_sidebar();
get_footer();
