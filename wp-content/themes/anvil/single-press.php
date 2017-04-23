<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Forge Saas
 */

get_header(); ?>

	<div class="row content-area">		

		<div id="content" class="large-8 columns site-content" role="main">
		<h1><?php _ex ( 'Press Releases', 'headline_title_press_releases', 'forge_saas' ); ?></h1>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single-press' ); ?>


		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
		<?php get_sidebar('press'); ?>
	
	</div>
		
<?php get_footer(); ?>
