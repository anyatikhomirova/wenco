<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Forge Saas
 */

get_header(); ?>

	<div class="row content-area">		

		<div id="content" class="large-8 columns site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single-jobs' ); ?>


		<?php endwhile; // end of the loop. ?>
		
		<?php gravity_form(2, false, false, false, '', false); ?>

		</div><!-- #content -->
		
		<?php get_sidebar(); ?>
	
	</div>
		
<?php get_footer(); ?>
