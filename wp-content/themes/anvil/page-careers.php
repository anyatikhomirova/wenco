<?php
/**
 * Template Name: Careers
 *
 * @package Forge Saas
 */

get_header(); ?>
		
	<div class="row content-area">		
	
		<div id="content" class="large-8 columns site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php 
				$args = array(
					'post_type' => 'jobs', 
					'posts_per_page' => -1
				); 
				$jobs = new WP_Query($args); 
			?>
			
			<?php while ( $jobs->have_posts() ) : $jobs->the_post(); ?>

				<?php get_template_part( 'content', 'careers' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

		<?php get_sidebar(); ?>

	</div>
		
<?php get_footer(); ?>
