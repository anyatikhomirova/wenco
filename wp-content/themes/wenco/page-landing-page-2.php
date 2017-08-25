<?php
/**
 * Template Name: Landing Page 2
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
      <div class="columns large-6 headline-container">
        <?php the_field('hero_headline_text'); ?>
      </div>
    </div>

    <div class="scroll-arrow"></div>

  </div>


  <div class="benefit-container" style="background-image: url('<?php the_field('benefits_background_image'); ?>');">
    
    <div class="row intro">
      <div class="columns large-8 large-offset-2">
        <div class="divider"></div>
        <p><?php the_field('benefits_text'); ?></p>
      </div>
    </div>
 

  </div>


  <div class="how-it-works-container" style="background-image: url('<?php the_field('how_it_works_background_image'); ?>');">

    <div class="row">
      <div class="image columns large-7 push-5">
        <img src="<?php the_field('how_it_works_side_image'); ?>" />
      </div>
      <div class="text columns large-5 pull-7">
        <h2><?php the_field('how_it_works_headline'); ?></h2>
        <p><?php the_field('how_it_works_text'); ?></p>
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

  <div class="about-container" style="background-image: url('<?php the_field('about_background_image'); ?>');">

    <div class="row">
      <div class="text columns large-5">
        <h2>About Us</h2>
        <p>The biggest companies on Earth already use systems like Avoca to maintain data integrity, analyze figures, and forecast changes in production. Now, Wenco draws on its 30 years of experience raising mine performance to bring this power to the mining industry. With its advanced data processing and storage capabilities, Avoca stands as the latest solution from Wenco that’s set to change the future of mining.</p>
      </div>
    </div>

  </div>


  <div class="logos-container">

    <div class="row intro">
      <div class="columns large-12">
        <p>Mines from these operators run <strong>simpler</strong>, <strong>smarter</strong>, and <strong>safer</strong> thanks to Wenco.</p>
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


  <div class="fancybox-hidden" id="fancy-callout-<?php echo get_the_ID(); ?>">

    <?php
    // Show a different form based on language.
    if (ICL_LANGUAGE_CODE == 'es') {
      gravity_form( get_field('gravity_form_id_es'), true, true, false, null, true );
    }elseif(ICL_LANGUAGE_CODE == 'ru'){
      gravity_form( get_field('gravity_form_id_ru'), true, true, false, null, true );
    }elseif(ICL_LANGUAGE_CODE == 'fr'){
      gravity_form( get_field('gravity_form_id_fr'), true, true, false, null, true );
    }else{
      gravity_form( get_field('gravity_form_id_en'), true, true, false, null, true );
    }
    ?>

  </div>

<style>
  <?php the_field('extra_css') ?>
  
  <?php if( get_field('hero_background_image_mobile') ): ?>
    @media screen and (max-width: 500px) {
      .page-template-page-landing-page-2 .hero-container {
        background-image: url('<?php the_field('hero_background_image_mobile'); ?>') !important;
      }
    }
  <?php endif; ?>
</style>

<?php endwhile; // end of the loop. ?>

<?php get_footer( 'landing-page' ); ?>

