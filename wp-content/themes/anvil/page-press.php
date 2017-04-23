<?php
/**
 * Template Name: Press Releases
 *
 * @package Forge Saas
 */

get_header(); ?>
		
	<div class="row content-area">		
	
		<div id="content" class="large-8 columns site-content" role="main">

			<header class="entry-header">
				
				<h1 class="entry-title"><?php the_title(); ?></h1>
				
			</header><!-- .entry-header -->

			<?php 
				$args = array(
					'post_type' => 'press', 
					'posts_per_page' => -1
				); 
				$press = new WP_Query($args); 
			?>
			
			<?php while ( $press->have_posts() ) : $press->the_post(); ?>

				<?php get_template_part( 'content', 'press' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

		<?php get_sidebar('press'); ?>

	</div>
		
<?php get_footer(); ?>
