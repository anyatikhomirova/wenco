<?php
/**
 * Template Name: Solutions Products
 *
 * @package Forge Saas
 */

get_header(); ?>
		
	<div class="row content-area">		
	
		<div id="content" class="large-8 columns site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">

						<h1 class="entry-title"><?php the_title(); ?></h1>

						<h4 class="entry-subtitle"><?php the_field('subtitle');?></h4>

					</header><!-- .entry-header -->

					<div class="entry-content">

						<?php the_content(); ?>

						<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'forge_saas' ),
							'after'  => '</div>',
						) );
						?>
					</div><!-- .entry-content -->

					<?php edit_post_link( __( 'Edit', 'forge_saas' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

				</article><!-- #post-## -->


			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

		<div class="columns large-4 sidebar">

			<?php $image = wp_get_attachment_image_src(get_field('sidebar_image'), 'medium'); ?>
			<img src="<?php echo $image[0];?>" width="<?php echo $image[1];?>" height="<?php echo $image[2];?>"/>

			<?php
			// Check for special block
			if ( get_field('callout_block_title') ) :
			?>
				<?php $bgimage = wp_get_attachment_image_src(get_field('callout_block_background'), 'medium'); ?>
				<div class="callout-block" style="background-image:url(<?php echo $bgimage[0]?>); background-position: center; background-size:cover;">
					<h3><?php the_field('callout_block_title');?></h3>
					<?php the_field('callout_block_content');?>
					<a class="download fancybox button " href="#fancy-callout-<?php echo get_the_ID(); ?>"><?php the_field('callout_button_label');?></a>
				</div>

				<div class="fancybox-hidden" id="fancy-callout-<?php echo get_the_ID(); ?>">


					<?php
					$file_object = get_field('callout_file');
					$file_url = $file_object['url'];
					// Show a different form based on language
					if (ICL_LANGUAGE_CODE == 'es') {
						gravity_form( 14, false, true, false, array( 'solution-product-title' => get_the_title(), 'resource-url' => $file_url ) ,  false, 68 );
					}elseif(ICL_LANGUAGE_CODE == 'ru'){
						gravity_form( 13, false, true, false, array( 'solution-product-title' => get_the_title(), 'resource-url' => $file_url ) ,  false, 68 );
					}elseif(ICL_LANGUAGE_CODE == 'fr'){
						gravity_form( 12, false, true, false, array( 'solution-product-title' => get_the_title(), 'resource-url' => $file_url ) ,  false, 68 );
					}else{
						gravity_form( 11, false, true, false, array( 'solution-product-title' => get_the_title(), 'resource-url' => $file_url ) ,  false, 68 );
					}
					?>

				</div>
			<?php
			endif;
			?>

			<?php the_field('sidebar_additional_content');?>

		</div>

	</div>
		
<?php get_footer(); ?>
