<?php
/**
 * Template Name: Landing Page
 *
 * @package Forge Saas
 */

get_header( 'landing-page' ); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <div class="hero-container" style="background-image: url('<?php the_field('hero_background_image'); ?>');">

    <header>
			<div class="row">
			
				<div class="site-branding large-4 small-6 columns">
						<!--[if gte IE 9]><!-->
							<img height="100" src="<?php echo get_stylesheet_directory_uri();?>/images/logo-white-notag.svg" />
						<!--<![endif]-->
    					<!--[if lt IE 9]><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo-white-notag.png" /><![endif]-->						
				</div>
		
				<div class="page-title large-4 columns">
						<h1><?php the_title(); ?></h1>
				</div>

        <div class="header-cta large-4 small-6 columns">
            <a class="download fancybox button " href="#fancy-callout-<?php echo get_the_ID(); ?>"><?php the_field('cta_button_text'); ?></a>
            <?php do_action('icl_language_selector'); ?>
				</div>

			</div>
		</header>

    <div class="row">
      <div class="columns large-12 headline-container">
        <?php the_field('hero_headline_text'); ?>
      </div>
    </div>

    <div class="scroll-arrow"></div>

  </div>


  <div class="benefit-container">
    
    <div class="row intro">
      <div class="columns large-8 large-offset-2">
        <h2><?php the_field('benefits_headline'); ?></h2>
        <p><?php the_field('benefits_text'); ?></p>
      </div>
    </div>

    <div class="divider"></div>

    <div class="row benefits">
      <?php while ( have_rows('benefits') ) : the_row(); ?>
        <div class="benefit columns large-4">
          <img src="<?php the_sub_field('benefit_icon'); ?>" />
          <h3><?php the_sub_field('benefit_title'); ?></h3>
          <p><?php the_sub_field('benefit_text'); ?></p>
        </div>
      <?php endwhile; ?>
    </div>

  </div>


  <div class="how-it-works-container" style="background-image: url('<?php the_field('how_it_works_background_image'); ?>');">
    
    <div class="row">
      <div class="text columns large-5">
        <h2><?php the_field('how_it_works_headline'); ?></h2>
        <p><?php the_field('how_it_works_text'); ?></p>
      </div>
      <div class="image columns large-7">
        <img src="<?php the_field('how_it_works_side_image'); ?>" />
      </div>
    </div>

  </div>


  <?php if ( get_field('watch_the_video_embed_iframe') ) : ?>
    <div class="watch-video-container" style="background-image: url('<?php the_field('watch_the_video_background_image'); ?>');">

      <div class="row">
        <div class="columns large-8 large-offset-2">
          <h2><?php the_field('watch_the_video_headline'); ?></h2>
          <p><?php the_field('watch_the_video_text'); ?></p>
          <div>
            <?php the_field('watch_the_video_embed_iframe'); ?>
          </div>
        </div>
      </div>

    </div>
  <?php endif; ?>


  <div class="cta-container" style="background-image: url('<?php the_field('cta_background_image'); ?>');">
    
    <div class="row">
      <div class="columns large-8 large-offset-2">
        <h2><?php the_field('cta_headline'); ?></h2>
        <p><?php the_field('cta_text'); ?></p>
        <p>
          <a class="download fancybox button " href="#fancy-callout-<?php echo get_the_ID(); ?>"><?php the_field('cta_button_text'); ?></a>
        </p>
      </div>
    </div>

  </div>

  <div class="about-container" style="background-image: url('<?php the_field('about_background_image'); ?>');">
    
    <div class="row">
      <div class="text columns large-5">
        <h2><?php the_field('about_headline'); ?></h2>
        <p><?php the_field('about_text'); ?></p>
      </div>
    </div>

  </div>


  <div class="logos-container">

    <div class="row intro">
      <div class="columns large-12">
        <p><?php the_field('logos_text'); ?></p>
      </div>
    </div>

    <div class="row logos">
      <?php while ( have_rows('logos') ) : the_row(); ?>
        <div class="logo columns large-2">
          <img src="<?php the_sub_field('logo') ?>" />
        </div>
      <?php endwhile; ?>
    </div>

  </div>

  <div class="fancybox-hidden" id="fancy-callout-<?php echo get_the_ID(); ?>">
    <?php gravity_form( get_field('gravity_form_id'), true, true, false, null, true ); ?>
  </div>

<style>
  <?php the_field('extra_css') ?>
  
  <?php if( get_field('hero_background_image_mobile') ): ?>
    @media screen and (max-width: 500px) {
      .page-template-page-landing-page .hero-container {
        background-image: url('<?php the_field('hero_background_image_mobile'); ?>') !important;
      }
    }
  <?php endif; ?>
</style>

<?php endwhile; // end of the loop. ?>

<?php get_footer( 'landing-page' ); ?>

