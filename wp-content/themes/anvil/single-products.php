<?php
/**
 * The Template for displaying all single products.
 *
 * @package Forge Saas
 */

get_header(); ?>

	<div class="row content-area">		

		<div id="content" class="large-8 columns site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			
			<section class="product-tabs">

				<h1 class="solution-title"><span><?php _e( "Solutions", 'forge_saas' );?>:</span> <?php the_title(); ?></h1>

				<div class="row">
					
					<div class="large-4 columns tab-titles">
						<ul>
							<?php while(has_sub_field('sections')): ?>
								<li><h4><?php the_sub_field('title'); ?></h4></li>
							<?php endwhile; ?>
						</ul>
					</div>

					<div class="large-8 columns tab-content">
						<ul class="slides">
							<?php while(has_sub_field('sections')): ?>
								<li>
									<?php the_sub_field('content'); ?>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>

				</div>
				

			</section>


		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
		<?php get_sidebar('solutions'); ?>
	
	</div>
		
<?php get_footer(); ?>
