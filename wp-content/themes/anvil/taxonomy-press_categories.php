<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Forge Saas
 */

get_header(); ?>
		
	<div class="row content-area">
			
		<div id="content" class="large-8 columns site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php single_cat_title(); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'press' );
				?>

			<?php endwhile; ?>

			<?php if (function_exists('forge_page_navi')) { // if expirimental feature is active ?>
				
				<?php forge_page_navi(); // use the page navi function ?>
				
			<?php } else { // if it is disabled, display regular wp prev & next links ?>

				<?php forge_saas_content_nav( 'nav-below' ); ?>

			<?php } ?>
				
		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</div><!-- #content -->

		<?php get_sidebar('press'); ?>
	
	</div>
		
<?php get_footer(); ?>