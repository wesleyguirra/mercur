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
    <div class="col-md-6">
      <h1 class="entry-title">Nossa Equipe</h1>
    </div>
  </div>
</div><!-- .container -->
<div class="section-nossa-equipe">
  <!-- Member -->
  <div class="nossa-equipe-member milton">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="nossa-equipe-member-info">
            <h2 class="nossa-equipe-member-name"><?php the_field('first_member_name'); ?></h2>
            <a href=""><i class="fa fa-linkedin"></i><span>conecte-se</span></a>
            <p class="nossa-equipe-member-about"><?php the_field('first_member_about'); ?></p>
          </div><!-- .nossa-equipe-member-info -->
          <div class="nossa-equipe-nav-arrows">
            <i class="flaticon-left-arrow"></i>
            <i class="flaticon-right-arrow"></i>
          </div><!-- .nossa-equipe-nav-arrows -->
        </div>
        <div class="col-md-6">
          <img src="http://argento.edu.s3.amazonaws.com/img/milton.png" alt="<?php the_field('first_member_name'); ?>">
        </div>
      </div>
    </div>
  </div><!-- .nossa-equipe-member -->
  <!-- Member -->
  <div class="nossa-equipe-member rosana">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="nossa-equipe-member-info">
            <h2 class="nossa-equipe-member-name"><?php the_field('second_member_name'); ?></h2>
            <a class="nossa-equipe-member-linkedin" href=""><i class="fa fa-linkedin"></i><span>conecte-se</span></a>
            <p class="nossa-equipe-member-about"><?php the_field('second_member_about'); ?></p>
          </div><!-- .nossa-equipe-member-info -->
          <div class="nossa-equipe-nav-arrows">
            <i class="flaticon-left-arrow"></i>
            <i class="flaticon-right-arrow"></i>
          </div><!-- .nossa-equipe-nav-arrows -->
        </div>
        <div class="col-md-6">
          <img src="http://argento.edu.s3.amazonaws.com/img/rosana.png" alt="<?php the_field('second_member_name'); ?>">
        </div>
      </div>
    </div>
  </div><!-- .nossa-equipe-member -->
</div><!-- .section-nossa-equipe -->
