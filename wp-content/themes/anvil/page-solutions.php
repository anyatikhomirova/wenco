<?php
/**
 * Template Name: Solutions
 *
 * @package Forge Saas
 */

get_header(); ?>
		
	<div class="row content-area">		
	
		<div id="content" class="large-12 columns site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php 
				$args = array(
					'post_type' => 'products', 
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'posts_per_page' => -1
				); 
				$products = new WP_Query($args); 
			?>
			<ul class="large-block-grid-3 features-list">
				<?php 
				while ( $products->have_posts() ) : $products->the_post(); ?>

					<li>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( ); ?>
							<h3><?php the_title(); ?></h3>
							<p><?php the_field('introduction'); ?></p>
						</a>
					</li>

				<?php endwhile;
				wp_reset_query();
				// end of the loop. ?>
			</ul>

		</div><!-- #content -->

	</div>
		
<?php get_footer(); ?>
