<?php
/**
 * Template Name: Core System
 *
 * @package Forge Saas
 */

get_header(); ?>
		
	<div class="row content-area">		
	
		<div class="large-12 columns introduction">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
			
		</div>
		
	
		<div id="content" class="large-8 columns site-content" role="main">

			<h2 class="core-title"><?php the_field('featured_title'); ?></h2>
			<?php 
				$args = array(
					'post_type' => 'features', 
					'orderby' => 'menu_order',
					'order'=> 'ASC',
					'posts_per_page' => -1
				); 
				$features = new WP_Query($args); 
			?>
			
			<?php while ( $features->have_posts() ) : $features->the_post(); ?>

				<?php get_template_part( 'content', 'features' ); ?>

			<?php endwhile; // end of the loop. 
					wp_reset_query();
			?>

		</div><!-- #content -->

		<?php get_sidebar('features'); ?>

	</div>
		
<?php get_footer(); ?>
