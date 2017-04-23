<?php
/**
 * The Template for displaying all single technical tips.
 *
 * @package Forge Saas
 */

get_header(); ?>

	<div class="row content-area">		

		<div id="content" class="large-8 columns site-content" role="main">
		<h1><?php _ex ( 'Technical Tips', 'headline_title_technical_tips', 'forge_saas' ); ?></h1>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single-technical-tips' ); ?>


		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
		<?php get_sidebar('technical'); ?>
	
	</div>
		
<?php get_footer(); ?>
