<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Forge Saas
 */

get_header(); ?>

		
	<div class="row content-area">
		
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'forge_saas' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

				<?php if (function_exists('forge_page_navi')) { // if expirimental feature is active ?>
					
					<?php forge_page_navi(); // use the page navi function ?>
					
				<?php } else { // if it is disabled, display regular wp prev & next links ?>

					<?php forge_saas_content_nav( 'nav-below' ); ?>

				<?php } ?>
				
		<?php else : ?>

			<?php get_template_part( 'no-results', 'search' ); ?>

		<?php endif; ?>

		</div><!-- #content -->

		<?php get_sidebar(); ?>

	</div>
		
<?php get_footer(); ?>
