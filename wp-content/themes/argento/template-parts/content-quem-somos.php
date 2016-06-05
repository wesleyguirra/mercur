<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Argento
 */

?>
<div class="section-quem-somos">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="quem-somos-title">"Juntos fazemos educação de qualidade social"</h1>
      </div>
    </div>
  </div><!-- .container -->
</div><!-- .section-quem-somos -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="entry-title">Nossa Equipe</h1>
    </div>
  </div>
</div><!-- .container -->
<div class="section-nossa-equipe">
  <div class="nossa-equipe-member milton" style="background: url(<?php the_field('first_member_photo'); ?>);">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="nossa-equipe-member-info">
            <h2 class="nossa-equipe-member-name"><?php the_field('first_member_name'); ?></h2>
            <a href=""><i class="fa fa-linkedin"></i><span>conecte-se</span></a>
            <p class="nossa-equipe-member-about"><?php the_field('first_member_about'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>