<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Forge Saas
 */

get_header(); ?>

	<div class="row content-area">		

		<div id="content" class="large-8 columns site-content" role="main">
		<h1><?php _ex ( 'Industry News', 'headline_title_industry_news', 'forge_saas' ); ?></h1>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php forge_saas_content_nav( 'nav-below' ); ?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
		<?php get_sidebar('blog'); ?>
	
	</div>
		
<?php get_footer(); ?>
