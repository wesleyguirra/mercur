<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Argento
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container">
<div class="row">
  <div class="col-md-10">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </div>
  <div class="col-md-2">
    <select>
      <option>Ensino Fundamental</option>
      <option>Ensino Fundamental</option>
    </select>
  </div>
</div>
  <div class="row">
    <div class="section-cursos col-md-6">
      <div class="section-cursos-header">
        <h2 class="section-cursos-title">Ensino fundamental<span class="section-cursos-subtitle">[ ciclo i ]</span></h2>
      </div>
      <ul class="section-cursos-lista">
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper">Leitura com autonomia</span>
          </a>
        </li>
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper">Contexto de produção de texto</span>
          </a>
        </li>
        <li class="section-cursos-item">
          <a href="/cursos/alfabetizacao" class="section-cursos-link">
            <span class="section-cursos-link-wrapper">Alfabetização</span>
          </a>
        </li>
    </div><!-- section-cursos -->

    <div class="section-cursos col-md-6">
      <div class="section-cursos-header">
        <h2 class="section-cursos-title">Ensino fundamental<span class="section-cursos-subtitle">[ ciclo ii e ensino médio ]</span></h2>
      </div>
      <ul class="section-cursos-lista">
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper">Desenvolvimento profissional, planejamento, gestão de sala de aula e avaliação</span>
          </a>
        </li>
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper">Desenvolvimento de habilidades das competências leitora e escritora</span>
          </a>
        </li>
      </ul>
    </div><!-- section-cursos -->
    <div class="clearfix"></div>
    <div class="section-cursos col-md-6">
      <div class="section-cursos-header">
        <h2 class="section-cursos-title">Gestão escolar</h2>
      </div>
      <ul class="section-cursos-lista">
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper">Construção do projeto político pedagógico</span>
          </a>
        </li>
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper">Implantação do projeto político pedagógico</span>
          </a>
        </li>
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper">Gestão de pessoas</span>
          </a>
        </li>
      </ul>
    </div><!-- section-cursos -->

    <div class="section-cursos col-md-6">
      <div class="section-cursos-header">
        <h2 class="section-cursos-title">Ensino integral</h2>
      </div>
      <ul class="section-cursos-lista">
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper">Nívelamento língua portuguesa e matemática</span>
          </a>
        </li>
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper">Disciplinas eletivas</span>
          </a>
        </li>
      </ul>
    </div><!-- section-cursos -->
    <div class="clearfix"></div>
    <div class="section-cursos col-md-6">
      <div class="section-cursos-header">
        <h2 class="section-cursos-title">Educação básica</span></h2>
      </div>
      <ul class="section-cursos-lista">
        <li class="section-cursos-item">
          <a href="" class="section-cursos-link">
            <span class="section-cursos-link-wrapper">Para que avaliar?</span>
          </a>
        </li>
      </ul>
    </div><!-- section-cursos -->
  </div><!-- .row -->
</div><!-- .container -->
</article><!-- #post-## -->
